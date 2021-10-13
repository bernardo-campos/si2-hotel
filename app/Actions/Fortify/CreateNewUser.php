<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Person;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'numeric', 'digits_between:7,8', 'unique:people'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return Person::create([
            'name' => $input['name'],
            'dni' => $input['dni'],
        ])->user()->save(
            new User([
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ])
        )->assignRole('Cliente');
    }
}

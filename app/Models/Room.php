<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Attributes

    public function getHasTvAttribute()
    {
        return $this->attributes['has_tv'] ? 'Si' : 'No';
    }

    public function getHasMinibarAttribute()
    {
        return $this->attributes['has_minibar'] ? 'Si' : 'No';
    }

    public function getHasAcAttribute()
    {
        return $this->attributes['has_ac'] ? 'Si' : 'No';
    }
}

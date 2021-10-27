<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'concept',
        'reservation_id',
        'user_id',
        'ammount',
        'method',
    ];


    /* ---- Relationships ---- */

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

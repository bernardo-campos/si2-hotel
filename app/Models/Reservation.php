<?php

namespace App\Models;

use App\Enums\ReservationStatus;
use App\Models\ReservationRoom;
use App\Models\ReservationRoomPeople;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'checkin' => 'date',
        'checkout' => 'date',
        'status' => ReservationStatus::class
    ];

    protected $appends = [
        'total_days',
        'price',
        'advance_price',
        'payed',
        'to_pay',
        'to_pay_float',
    ];

    /* ---- Attributes ---- */

    public function getTotalDaysAttribute()
    {
        return $this->checkout->diffInDays($this->checkin);
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    public function getPriceFloatAttribute()
    {
        return $this->attributes['price'];
    }

    public function getAdvancePriceAttribute()
    {
        return number_format($this->attributes['price'] * 0.1, 2, ',', '.');
    }

    public function getPayedFloatAttribute()
    {
        return $this->payments->reduce( fn ($carry, $payment) => $carry + $payment->ammount, 0.0);
    }

    public function getPayedAttribute($value='')
    {
        return number_format($this->payed_float, 2, ',', '.');
    }

    public function getToPayFloatAttribute()
    {
        $price = $this->price_float;
        return $price - $this->payed_float;
    }

    public function getToPayAttribute()
    {
        return number_format($this->to_pay_float, 2, ',', '.');
    }


    /* ---- Relationships ---- */

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rooms() {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function reservation_rooms() {
        return $this->hasMany(ReservationRoom::class);
    }

    public function people() {
        return $this->hasManyThrough(ReservationRoomPeople::class, ReservationRoom::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

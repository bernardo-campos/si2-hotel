<?php

namespace App\Models;

use App\Models\Reservation;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function renderSingleBeds()
    {
        return $this->double_beds
                ? ( $this->double_beds > 1
                    ? $this->double_beds . " camas dobles"
                    : $this->double_beds . " cama doble" )
                : "";
    }

    public function renderDoubleBeds()
    {
        return $this->single_beds
                ? ( $this->single_beds > 1
                    ? $this->single_beds . " camas simples"
                    : $this->single_beds . " cama simple" )
                : "";
    }

    public function renderBeds()
    {
        $txtDoubleBeds = $this->renderDoubleBeds();
        $txtSingleBeds = $this->renderSingleBeds();

        return $txtDoubleBeds && $txtSingleBeds
            ? $txtDoubleBeds . " y " . $txtSingleBeds
            : $txtDoubleBeds . $txtSingleBeds;
    }

    public function renderServices()
    {
        $services = [
            !$this->has_tv ? "TV" : null,
            !$this->has_minibar ? "Frigobar" : null,
            !$this->has_ac ? "A.Ac" : null,
        ];

        return implode(", ", array_filter($services));
    }

    public function isAvailableBetween($from, $to) {
        $currentPeriod = CarbonPeriod::create($from, $to);
        return
            !$this->reservations->count()
            ? true
            : $this->reservations->every(
                function ($reservation, $key) use ($currentPeriod) {
                    $period = CarbonPeriod::create(
                        $reservation->checkin->addDays(1),
                        $reservation->checkout->addDays(-1)
                    );
                    return !array_intersect($currentPeriod->toArray(), $period->toArray());
                }
        );
    }


    /* ---- Attributes ---- */

    public function getPeopleAttribute($value='')
    {
        return $this->max_capacity;
    }

    public function getMaxCapacityAttribute()
    {
        return $this->attributes['single_beds'] + 2 * $this->attributes['double_beds'];
    }

    public function getMinCapacityAttribute()
    {
        return $this->attributes['single_beds'] + 1 * $this->attributes['double_beds'];
    }

    /* ---- Relationships ---- */
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_rooms');
    }
}

<?php

namespace App\Models;

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

    // TODO: implement
    public function hasReservationBetween($from, $to) {
        return false;
    }

    // Attributes
    //...


    public function getPeopleAttribute()
    {
        return $this->attributes['single_beds'] + 2 * $this->attributes['double_beds'];
    }
}

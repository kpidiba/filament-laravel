<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [ 'firstname', 'lastname', 'adress', 'zipcode', 'birthdate', 'Datehired','country_id', 'state_id', 'city_id', 'departement_id'];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
}

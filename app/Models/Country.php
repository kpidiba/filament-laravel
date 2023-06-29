<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['country_code', "name"];



    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'country_id');
    }

}

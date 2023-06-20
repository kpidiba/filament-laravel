<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];
    public function countries(){
            return $this->belongsTo(Country::class,'country_id');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'city_id');
    }
}

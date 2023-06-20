<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];
    public function countries(){
            return $this->belongsTo(Country::class,'country_id');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'state_id');
    }
}

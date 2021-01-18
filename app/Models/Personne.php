<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','sexe','email','contact','pays','region','ville','adresse'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

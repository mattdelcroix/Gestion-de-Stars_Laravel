<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    //Nom de la table utilisée
    protected $table = "stars";    

    //Liste des champs pouvant être assignables.
    protected $fillable = [
        'nom', 'prenom', 'description', 'photo',
    ];
}

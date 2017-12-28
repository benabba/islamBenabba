<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{


    protected $fillable = ['name', 'prenom', 'email', 'Age', 'telephone', 'nombre', 'verifie','Type_etage', 'date_deb', 'date_fin','date_d','heure_d','date_f','heure_f'];
    protected $table = 'reservation';


}

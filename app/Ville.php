<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'ville';
    public $timestamps = false;
    protected $fillable = [
        'id_ville', 'libelle_ville',
    ];
    public function posts()
    {
        return $this->hasMany(Hotels::class , 'id_ville');
    }
}

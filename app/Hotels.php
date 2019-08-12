<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $table = 'hotels';
    public $timestamps = false;
    protected $fillable = [
         'libelle_hot', 'desc_hot', 'etole_hot'  ,'ville_hot' ,
    ];
    public function ville()
    {
        return $this->hasOne(Ville::class );
    }
    public function scrping()
    {
        return $this->hasMany(Scarping::class );
    }
    public function price()
    {
        return $this->hasMany(Price::class );
    }
}

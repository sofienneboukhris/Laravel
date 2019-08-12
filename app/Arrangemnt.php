<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrangemnt extends Model
{
    protected $table = 'arrangemnt';
    public $timestamps = false;
    protected $fillable = [
        'libelle_arr', 'desc_arr',
    ];
    public function prices()
    {
        return $this->hasOne(Price::class );
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scarping extends Model
{
    protected $table = 'scarping';
    public $timestamps = false;
    protected $fillable = [
        'url_page', 'data_scrap' ,
    ];
    public function hotels()
    {
        return $this->hasMany(Hotels::class );
    }
}

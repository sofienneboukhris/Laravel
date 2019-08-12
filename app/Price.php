<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';
    public $timestamps = false;
    protected $fillable = [
       'date_dep', 'date_arr', 'prices','nbr_nuit',
    ];
    public function hotels()
    {
        return $this->hasOne(Hotels::class );
    }
    public function arrangement()
    {
        return $this->hasMany(Arrangemnt::class );
    }
}

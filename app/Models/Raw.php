<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function values(){
        return $this->hasMany(RawValues::class) ;
    }
    public function lenses(){
        return $this->hasMany(Lens::class) ;
    }
}

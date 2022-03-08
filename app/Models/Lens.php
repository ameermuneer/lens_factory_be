<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bases(){
        return $this->hasMany(Base::class) ;
    }
    public function invoices(){
        return $this->hasMany(Invoice::class) ;
    }
    public function raw(){
        return $this->belongsTo(Raw::class,'raw_id') ;
    }
}

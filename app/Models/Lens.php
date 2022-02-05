<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lens extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function bases(){
        $this->hasMany(Base::class) ;
    }
    public function invoices(){
        $this->hasMany(Invoice::class) ;
    }
}

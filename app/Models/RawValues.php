<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawValues extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function raw(){
        $this->belongsTo(Raw::class) ;
    }
}

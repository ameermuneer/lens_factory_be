<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawValues extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function raw(){
        return  $this->belongsTo(Raw::class) ;
    }
}

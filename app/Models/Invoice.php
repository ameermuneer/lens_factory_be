<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function lens(){
        return $this->belongsTo(Lens::class) ;
    }
    public function lens_name() {
        return $this->belongsTo(Lens::class)->select(['name']);
    }
}

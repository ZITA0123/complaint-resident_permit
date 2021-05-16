<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function plainteActive($query){
        return $query->where('status',1);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

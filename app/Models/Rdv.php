<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * Get the user that owns the rdv.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'date',
        'time',

    ];

}

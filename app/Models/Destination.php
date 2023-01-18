<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';
    protected $fillable = ['travel_id', 'title', 'date', 'time', 'memo'];

    public function travel()
    {
        return $this->belongsTo('App\Models\Travel');
    }
}

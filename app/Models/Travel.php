<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $fillable = ['user_id', 'title', 'start_date', 'end_date'];

    public function destinations()
    {
        return $this->hasMany('App\Models\Destination');
    }
}

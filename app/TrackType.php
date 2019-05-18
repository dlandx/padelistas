<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
}

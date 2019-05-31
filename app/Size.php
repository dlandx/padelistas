<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * Relationships One to Many
     * Get the size of the chosen track (Individual, double)...
     */
    public function club_tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }
}

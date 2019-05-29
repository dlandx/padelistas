<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'duration', 'price', 'club_track_id'
    ];

    /**
     * Relationships Many To Many 
     * Get all the club tracks that have the same price.
     */
    public function club_tracks()
    {
        return $this->belongsToMany('App\ClubTrack', 'club_track_rate');
    }
}

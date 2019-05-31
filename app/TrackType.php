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

    /**
     * Relationships One to Many
     * Get the type of track to which the chosen track belongs (Tenis, Padel...)
     */
    public function club_tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }
}

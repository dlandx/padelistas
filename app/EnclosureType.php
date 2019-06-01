<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnclosureType extends Model
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
     * Relationships One to Many (1 Tipo cerramiento - n Pistas)
     * Get all the type of enclosure that has the track.
     */
    public function club_tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }
}

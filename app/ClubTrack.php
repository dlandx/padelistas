<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubTrack extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'businessHours', 'track_type_id', 'type_surface_id', 'enclosure_type_id', 'wall_id', 'size_id', 'description', 'club_id', 'type_surface_id'
    ];

    /**
     * Relationships One to Many
     * Get all the prices that the chosen track of each club has.
     */
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    /**
     * Relationships Many to One
     * Get the club to which the chosen track belongs.
     */
    public function club()
    {
        return $this->belongsTo('App\Club');
    }

    /**
     * Relationships Many to One [TrackType - ClubTrack]
     * Get the club to which the chosen track belongs.
     */
    public function track_type()
    {
        return $this->belongsTo('App\TrackType');
    }

    /**
     * Relationships Many to One [TrackType - ClubTrack]
     * Get the club to which the chosen track belongs.
     */
    public function size()
    {
        return $this->belongsTo('App\Size');
    }

    /**
     * Relationships Many to One (n Pistas - 1 tipo cerramiento)
     * Get the type of enclosure that has the chosen track.
     */
    public function enclosure_type()
    {
        return $this->belongsTo('App\EnclosureType');
    }

    /**
     * Relationships Many to One (n Pistas - 1 tipo superficie)
     * Get the type of surface that the chosen track will have.
     */
    public function type_surface()
    {
        return $this->belongsTo('App\TypeSurface');
    }

    /**
     * Relationships Many to One (n Pistas - 1 tipo pared)
     * Get the type of wall that the chosen track will have.
     */
    public function wall()
    {
        return $this->belongsTo('App\Wall');
    }
}

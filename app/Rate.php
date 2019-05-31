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
     * Relationships Many to One
     * Get the track of the club that owns the price.
     */
    public function club_track()
    {
        return $this->belongsTo('App\ClubTrack');
    }
}

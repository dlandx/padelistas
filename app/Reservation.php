<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start', 'end', 'color', 'duration', 'price', 'players', 'full', 'search_players', 'club_track_id'
    ];

    /**
     * Relationships Many To Many 
     * The users who make the reservation
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('id', 'status', 'cancelled', 'pay', 'waiting_list');
    }
}

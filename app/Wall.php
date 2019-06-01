<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
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
     * Relationships One to Many (1 Tipo pared - n Pistas)
     * Get the wall that will have the chosen track.
     */
    public function club_tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }
}

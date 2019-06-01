<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeSurface extends Model
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
     * Relationships One to Many (1 Tipo superficie - n Pistas)
     * Get the type of surface that the chosen track will have.
     */
    public function club_tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }
}

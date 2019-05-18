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
        'name', 'track_type_id', 'type_surface_id', 'enclosure_type_id', 'wall_id', 'size_id', 'description', 'club_id', 'type_surface_id'
    ];
}

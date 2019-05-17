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
        'name', 'type', 'enclosure', 'walls', 'size', 'description', 'club_id', 'type_surface_id'
    ];
}

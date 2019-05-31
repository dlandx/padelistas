<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'days', 'start_time', 'end_time', 'address', 'description'
    ];
    
    /**
     * Relationships Many To Many 
     * The users that follow the club.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('following', 'id');
    }

    /**
     * Relationships One to Many
     * Get all the clubes that the chosen club has.
     */
    public function tracks()
    {
        return $this->hasMany('App\ClubTrack');
    }

    /**
     * Relationships One to Many (1 Club - n Admins)
     * Get all the administrators that the club has.
     */
    public function admins()
    {
        return $this->hasMany('App\Admin');
    }
}

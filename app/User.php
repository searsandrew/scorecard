<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Friends that User has initiated
     */
    public function friendsOfMine()
    {
        return $this->belongsToMany('User', 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted_at', '!=', null)
            ->withPivot('accepted_at');
    }

    /**
     * Friendships that user was invited to
     */
    public function friendOf()
    {
        return $this->belongsToMany('User', 'friends', 'friend_id', 'user_id')
            ->wherePivot('accepted_at', '!=', null)
            ->withPivot('accepted_at');
    }

    /**
     * Accessor to allow calling $user->friends
     */
    public function getFriendsAttribute()
    {
        if(!array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }
    
    /**
     * Utilized by the accessor to load friends
     */
    protected function loadFriends()
    {
        if(!array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    /**
     * Utilized by loadFriends to to merge content
     */
    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    /**
     * A user may create many boardgames
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boardgames() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Boardgame');
    }
}

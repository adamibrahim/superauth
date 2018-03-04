<?php

namespace App;

use Adam\Superauth\Notifications\ConfirmEmail;
use Adam\Superauth\Notifications\ForgotPasswordEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Adam\Superauth\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm_token', 'confirmed', 'active',
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
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('Adam\Superauth\Models\Role');
    }

    /*
     * Check if user email is confirmed
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /*
     * Check if user Active
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * validate Email
     *
     * @param  $email
     * @return object
     */
    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    /*
     * Send Email confirmation
     * @param $route
     */
    public function sendConfirmationEmail($route)
    {
        $job = new ConfirmEmail($this);
        $job->setRoute($route);
        $this->notify($job);
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $job = new ForgotPasswordEmail($this);
        $job->setRoute(route('password.reset', $token));
        $this->notify($job);
    }

    /**
     * Check if user has a moderator role
     *
     * @return array
     */
    public function isModerator()
    {
        return $this->roles()->pluck('role_id')
            ->intersect(Role::ROLE_MODERATORS)->toArray();
    }

    /**
     * Check if user has a role
     *
     * @param  integer  $role
     * @return array
     */
    public function hasRole($role)
    {
        return in_array($role, $this->roles()->pluck('role_id')->toArray());
    }


}
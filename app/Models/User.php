<?php

namespace App\Models;

use App\Http\Middleware\Stakeholder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profile_image',
        'phone',
        'verification_code',
        'isEmailVerified',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRoles()
    {
        return $this->hasOne(userRole::class,'users_id');
    }

    public function startup()
    {
        return $this->hasMany(StartupProduct::class,'users_id');
    }

    public function stakeHolder()
    {
        return $this->hasOne(stakeHoldersDetail::class,'users_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRole extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'roles_id',
        'action',
    ];

    public function role()
    {
        return $this->hasMany(Role::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stakeHoldersDetail extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'org_name',
        'parent_name',
        'est_year',
        'isRegistered',
        'number_of_staffs',
        'address',
        'postal_code',
        'max_startup',
        'pref_startup_stage',
        'source_funds',
        'focus_sectors_id',
        'service_provided',
        'program_duration',
        'business_model',
        'business_model_desc',
        'isApproved',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stakeHolder()
    {
        return $this->hasMany(StartupProduct::class,'stake_holders_details_id');
    }
}

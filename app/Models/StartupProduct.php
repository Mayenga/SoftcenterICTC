<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupProduct extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'product_name',
        'description',
        'focus_sectors_id',
        'address',
        'postal_code',
        'web_url',
        'business_model',
        'business_model_desc',
        'finacial_stage',
        'product_stage',
        'product_cat',
        'hasStakeholder',
        'stakeholder_name',
        'stake_holders_details_id',
        'ownership',
        'est_year',
        'isRegistered',
        'number_of_staffs',
        'file_name',
        'isApproved',
        'status',
        'isStakeHolderApproved',
    ];
    public function focusSector()
    {
        return $this->hasOne(FocusSector::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function stakeHolder()
    {
        return $this->hasOne(stakeHoldersDetail::class);
    }
}

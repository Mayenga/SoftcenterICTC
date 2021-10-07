<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foundersDetail extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'stake_holders_details_id',
        'startup_products_id',
    ];

    public function startup()
    {
        return $this->hasOne(StartupProduct::class);
    }
    public function stakeHolder()
    {
        return $this->hasOne(stakeHoldersDetail::class);
    }
}

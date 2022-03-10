<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FocusSector extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sector',
        'isShared',
    ];

    public function startup()
    {
        return $this->hasMany(StartupProduct::class,'focus_sectors_id');
    }
   

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anouncement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','attachment','content','isActive','expr_date','target_to','amount','isPaid','image_file'
    ];
}

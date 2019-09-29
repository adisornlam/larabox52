<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoSlide extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description','photo','active','created_user_id'];
}

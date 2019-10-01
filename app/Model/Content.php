<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','short_desc','long_desc','image', 'attachment','link','active'];
    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}

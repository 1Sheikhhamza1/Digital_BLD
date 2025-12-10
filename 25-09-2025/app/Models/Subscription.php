<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [];
    
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

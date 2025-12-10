<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Subscriber extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class, 'user_id');
    }


    /* public function decisionInFolders()
    {
        return $this->belongsToMany(OCRExtraction::class, 'user_folder_decisions')
            ->withPivot('folder_id')
            ->withTimestamps()
            ->withTrashed();
    } */


    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
            ->select(['id', 'subscriber_id', 'package_id', 'status', 'expire_date', 'subscription_date'])
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->where('expire_date', '>=', now()->toDateString())
            ->latest('subscription_date')
            ->with('package:id,name');
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'subscriber_id');
    }
}

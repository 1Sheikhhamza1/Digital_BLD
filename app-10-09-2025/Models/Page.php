<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [];

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function getUrlAttribute()
    {
        if ($this->page_structure === 'URL' && $this->external_url) {
            return $this->external_url;
        } elseif ($this->page_structure === 'Page' && $this->connected_page) {
            return url(ucfirst($this->connected_page));
        } else {
            return url('content/' . $this->slug);
        }
    }
}

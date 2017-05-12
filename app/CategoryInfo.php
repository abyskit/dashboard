<?php

namespace AbysKit;

use Illuminate\Database\Eloquent\Model;

class CategoryInfo extends Model
{
    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}

<?php

namespace AbysKit;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function info()
    {
        return $this->hasOne(CategoryInfo::class);
    }

    public function title()
    {
        return $this->info()->where('locale_id', session('locale.id'))->value('title');
    }
}

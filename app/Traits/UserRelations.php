<?php

namespace AbysKit\Traits;

use AbysKit\Role;

trait UserRelations {

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
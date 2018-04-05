<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Scopes\OnlineScope;

abstract class Model extends Eloquent
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new NonDraftScope());
        // static::addGlobalScope(new SortableScope());

        if (request()->isBack()) {
            static::addGlobalScope(new OnlineScope());
        }
    }
}
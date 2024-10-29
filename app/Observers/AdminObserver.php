<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AdminObserver
{
    /**
     * Handle the Admin "created" event.
     */

    public function created(Admin $admin): void
    {   
        $cache_key = 'book_cache' . md5(request()->fullUrl());
        Cache::forget($cache_key);
    }

    /**
     * Handle the Admin "updated" event.
     */
    public function updated(Admin $admin): void
    {   
        $cache_key = 'book_cache' . md5(request()->fullUrl());
        Cache::forget($cache_key);
    }

    /**
     * Handle the Admin "deleted" event.
     */
    public function deleted(Admin $admin): void
    {
        $cache_key = 'book_cache' . md5(request()->fullUrl());
        Cache::forget($cache_key);
    }

    /**
     * Handle the Admin "restored" event.
     */
    public function restored(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "force deleted" event.
     */
    public function forceDeleted(Admin $admin): void
    {
        //
    }
}

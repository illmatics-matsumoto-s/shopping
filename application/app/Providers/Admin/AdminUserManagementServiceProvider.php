<?php

namespace App\Providers\Admin;

use Illuminate\Support\ServiceProvider;

class AdminUserManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 管理者管理サービスを生成する
        $this->app->bind('AdminUserManagement', function()
        {
            return new \App\Services\Admin\AdminUserManagementService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

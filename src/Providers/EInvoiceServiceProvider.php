<?php

namespace Gkvdt\UyumsoftEinvoice\Providers;

use Illuminate\Support\ServiceProvider;

class EInvoiceServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerConfig();
        $this->registerMigration();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $configPath = __DIR__ . '/../config/config.php';
        $this->mergeConfigFrom($configPath, 'uyumsoft_einvoice');
        $this->publishes([$configPath => config_path('uyumsoft_einvoice.php')], 'uyumsoft_einvoice');
    }

    protected function registerMigration()
    {

        $migrationPath = __DIR__ . '/../Database/Migrations';
        $this->publishes([
            $migrationPath => base_path('database/migrations'),
        ], 'uyumsoft_einvoice');
    }
}

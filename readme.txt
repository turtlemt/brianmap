Install Laravel
    composer global require "laravel/installer=~1.1"

vi ~/.bashrc
    alias laravel='~/.composer/vendor/bin/laravel'
    
source ~/.bashrc

New project
    laravel new brianmap


產生新table schema
php artisan make:migration create_map_locations_table --create=map_locations
php artisan make:migration create_map_location_sites_table --create=map_location_sites
    
寫完以後執行migrate
php artisan migrate


Add middleware
    php artisan make:middleware ApiAuth
    
    app\Http\Kernel.php
        'ApiAuth' => \App\Http\Middleware\ApiAuth::class,
        
        
php artisan make:model Http/Models/MapLocations


設定自己的config
    App\Providers\AppServiceProvider.php
    mergeConfigFrom 加入新增的config檔案
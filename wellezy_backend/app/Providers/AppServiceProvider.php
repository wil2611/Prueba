<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class AppServiceProvider extends ServiceProvider
{
   protected $namespace = 'App\\Http\\Controllers';
   public const HOME = '/home';

   public function map()
   {
       $this->mapApiRoutes();
       $this->mapWebRoutes();
   }
   protected function mapWebRoutes()
   {
       Route::middleware('web')
           ->namespace($this->namespace)
           ->group(base_path('/routes/web.php'));
   }

   protected function mapApiRoutes()
   {
       Route::prefix('api')
           ->middleware('api')
           ->namespace($this->namespace)
           ->group(base_path('/routes/api.php'));
   }
}

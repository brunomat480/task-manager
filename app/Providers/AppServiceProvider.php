<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    $categories = Categorie::all();
    view()->share('categoriesTask', $categories);
  }
}

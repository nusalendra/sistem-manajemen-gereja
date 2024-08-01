<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    View::composer('*', function ($view) {
      $menuData = [];
      if (Auth::check()) {
        $role = Auth::user()->role;

        $menuFile = '';

        if ($role == 'Admin') {
          $menuFile = 'resources/menu/verticalMenuAdmin.json';
        } elseif ($role == 'Jemaat') {
          $menuFile = 'resources/menu/verticalMenuJemaat.json';
        }

        if (!empty($menuFile)) {
          $verticalMenuJson = file_get_contents(base_path($menuFile));
          $menuData = json_decode($verticalMenuJson, true);
        }
      }

      $view->with('menuData', $menuData);
    });
  }
}

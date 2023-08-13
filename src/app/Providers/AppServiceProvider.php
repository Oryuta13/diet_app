<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\foods;

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
    public function boot()
    {
        View::composer('dashboard', function ($view) {
            // foods.index ビューのコードを取得しfoodsのデータを渡す
            $selectedDate = request()->input('date') ?? now()->format('Y-m-d');
            $loggedInUserId = Auth::id();
            $foods = Foods::where('user_id', $loggedInUserId)
                        ->whereDate('created_at', $selectedDate)
                        ->get();

            $indexContent = view('foods.index', compact('foods', 'selectedDate'))->render();
            $view->with('indexContent', $indexContent);
        });
    }
}

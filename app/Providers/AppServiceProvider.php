<?php

namespace App\Providers;

use App\Models\MainProfile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
            $photoUrl = null;
            if (Auth::check()) {
                $idCandidate = auth()->user()->id_candidate;
                $mainProfile = MainProfile::where('id_candidate', $idCandidate)->first();
                if ($mainProfile && $mainProfile->self_photo) {
                    if (isset($mainProfile->self_photo) && file_exists(public_path($mainProfile->self_photo))) {
                        $photoUrl = $mainProfile->self_photo;
                    }
                }
            }
            $view->with('globalSelfPhotoUrl', $photoUrl);
        });
    }
}

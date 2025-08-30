<?php

namespace App\Providers;

use App\Models\MainProfile;
use App\Models\MstRules;
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
            
            $emailHR = optional(MstRules::where('rule_name', 'Email HR')->first())->rule_value;
            $waHR = optional(MstRules::where('rule_name', 'WA Number HR')->first())->rule_value;
            $phoneHR = optional(MstRules::where('rule_name', 'Phone Number HR')->first())->rule_value;
            $rules = [
                'emailHR' => $emailHR,
                'waHR' => $waHR,
                'phoneHR' => $phoneHR,
            ];

            $view->with('globalSelfPhotoUrl', $photoUrl);
            $view->with('mainRules', $rules);
        });
    }
}

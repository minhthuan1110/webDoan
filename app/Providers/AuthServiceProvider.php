<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Verify Email Customize
        VerifyEmail::toMailUsing(function ($notifiable) {
            $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), ['id' => $notifiable->getKey()]);

            return (new MailMessage)
                ->subject('Verify Email Address')
                ->greeting('Hello! Confirm your email to continue using the service of VieTour')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });

        // Reset password link Customization
        ResetPassword::createUrlUsing(function ($user, string $token) {
            return 'https://vietour.biz/reset-password?token=' . $token;
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\RepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\AboutUs\AboutUsRepositoryInterface::class,
            \App\Repositories\AboutUs\AboutUsRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Area\AreaRepositoryInterface::class,
            \App\Repositories\Area\AreaRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Article\ArticleRepositoryInterface::class,
            \App\Repositories\Article\ArticleRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Attribute\AttributeRepositoryInterface::class,
            \App\Repositories\Attribute\AttributeRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Booking\BookingRepositoryInterface::class,
            \App\Repositories\Booking\BookingRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Comment\CommentRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Contact\ContactRepositoryInterface::class,
            \App\Repositories\Contact\ContactRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Location\LocationRepositoryInterface::class,
            \App\Repositories\Location\LocationRepositoryEloquent::class,
        );
        // $this->app->singleton(
        //     \App\Repositories\Notification\NotificationRepositoryInterface::class,
        //     \App\Repositories\Notification\NotificationRepositoryEloquent::class,
        // );
        $this->app->singleton(
            \App\Repositories\Payment\PaymentRepositoryInterface::class,
            \App\Repositories\Payment\PaymentRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Promotion\PromotionRepositoryInterface::class,
            \App\Repositories\Promotion\PromotionRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Slider\SliderRepositoryInterface::class,
            \App\Repositories\Slider\SliderRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tag\TagRepositoryInterface::class,
            \App\Repositories\Tag\TagRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tour\TourRepositoryInterface::class,
            \App\Repositories\Tour\TourRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tour\Image\TourImageRepositoryInterface::class,
            \App\Repositories\Tour\Image\TourImageRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tour\Plan\TourPlanRepositoryInterface::class,
            \App\Repositories\Tour\Plan\TourPlanRepositoryEloquent::class,
        );
        // User Repository
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Vehicle\VehicleRepositoryInterface::class,
            \App\Repositories\Vehicle\VehicleRepositoryEloquent::class,
        );
        // $this->app->singleton(
        //     \App\Repositories\Vote\VoteRepositoryInterface::class,
        //     \App\Repositories\Vote\VoteRepositoryEloquent::class,
        // );
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

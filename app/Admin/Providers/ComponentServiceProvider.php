<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('alert', \App\Admin\View\Components\Layout\Alert::class);
        Blade::component('admin-sidebar-left', \App\Admin\View\Components\Layout\SidebarLeft::class);
        Blade::component('admin-item-link-sidebar-left', \App\Admin\View\Components\Link\AdminItemLinkSidebarLeft::class);
        Blade::component('form', \App\Admin\View\Components\Form::class);
        Blade::component('input', \App\Admin\View\Components\Input\Input::class);
        Blade::component('input-password', \App\Admin\View\Components\Input\InputPassword::class);
        Blade::component('input-email', \App\Admin\View\Components\Input\InputEmail::class);
        Blade::component('input-phone', \App\Admin\View\Components\Input\InputPhone::class);
        // Blade::component('input-date', \App\Admin\View\Components\Input\InputDate::class);
        // Blade::component('input-datetime', \App\Admin\View\Components\Input\InputDatetime::class);
        Blade::component('input-gallery-ckfinder', \App\Admin\View\Components\Input\InputGalleryCkfinder::class);
        Blade::component('input-image-ckfinder', \App\Admin\View\Components\Input\InputImageCkfinder::class);
        Blade::component('input-file-ckfinder', \App\Admin\View\Components\Input\InputFileCkfinder::class);
        // Blade::component('input-video', \App\Admin\View\Components\Input\InputVideo::class);
        Blade::component('textarea', \App\Admin\View\Components\Input\Textarea::class);
        Blade::component('select', \App\Admin\View\Components\Select\Select::class);
        Blade::component('option', \App\Admin\View\Components\Select\Option::class);
    }
}

<?php

namespace App\Providers;

use URL;
use App\Filament\Blocks\FaqsBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    FaqsBlock::class
                ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                /*->flags([
                    'en' => asset('flags/usa.svg'),
                    'pt_BR' => asset('flags/brazil.svg')
                ])*/
                ->locales(['pt_BR', 'pt','en','fr'])
                ->labels([
                    'pt_BR' => 'Português (BR)',
                    'pt' => 'Português (PT)',
                    // Other custom labels as needed
                ]);
        });
    }
}

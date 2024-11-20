<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\DataTables\Master\PersyaratanDispensasiDataTable;

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
        $this->app->bind(PersyaratanDispensasiDataTable::class, function ($app) {
            $request = $app->make(Request::class);
            $periodeId = $request->periodeId ?? 0;
            return new PersyaratanDispensasiDataTable($periodeId);
        });

        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('alpha_dash_only', function ($attribute, $value) {
            // This will only accept alpha, dashes, and underscores.
            return preg_match('/^[\pL\-_]+$/u', $value);
        });

        Validator::extend('alpha_specified_symbols', function ($attribute, $value) {

            // This will accept alpha, spaces, and specified symbols.
            // Symbols allowed: ? . , ! & (){}[]:; "" '' / - = +
            return preg_match('/^[\pL\s?.,!&(){}[\]:;""\'\/\-+=]+$/u', $value);

        });

        Validator::extend('alpha_num_spaces', function ($attribute, $value) {
            // This will only accept alpha, numeric, and spaces.
            return preg_match('/^[\pL\pN\s]+$/u', $value);
        });

        // Validator for cannot only number, must have at least one alphabet
        Validator::extend('alpha_num_spaces_with_alphabet', function ($attribute, $value) {
            return preg_match('/^.*[a-zA-Z].*$/', $value);
        });

        // Validator for cannot only number and symbol, must have at least one alphabet
        Validator::extend('alpha_num_spaces_with_alphabet_and_symbol', function ($attribute, $value) {
            return preg_match('/^.*[a-zA-Z].*$/', $value);
        });

        Validator::extend('alpha_num_spaces_with_alphabet_and_symbol_html', function ($attribute, $value) {
            try {
                $text = strip_tags($value);
                return preg_match('/^.*[a-zA-Z].*$/', $text);
            } catch (\Exception $e) {
                return false;
            }
        });
    }
}

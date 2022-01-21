<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;

class SiteIsLive
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $started = true;

        $setting = Setting::where('key', 'is_started')->first();

        if ($setting) {
            $started = $this->check($setting);
        } else {
            $setting = Setting::create([
                'key' => 'is_started',
                'value' => '0'
            ]);

            $started = $this->check($setting);
        }

        if ($started) {
            return $next($request);
        }

        return redirect()->route('start');
    }

    public function check($setting)
    {
        if ($setting->value == '0') {
            return false;
        }
        return true;
    }
}

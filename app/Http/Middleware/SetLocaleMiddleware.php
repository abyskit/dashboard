<?php

namespace AbysKit\Http\Middleware;

use AbysKit\Locale;
use Illuminate\Support\Facades\Schema;
use Closure;


class SetLocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->init();

        return $next($request);
    }

    private function init()
    {
        $localeSlug = config("app.locale");

        if(session()->exists("locale")) :
            (session("locale.slug") != $localeSlug) && $this->set($localeSlug);
        else :
            $this->set($localeSlug);
        endif;
    }

    private function set($localeSlug)
    {
        if(Schema::hasTable('locales')) {
            $localeId = Locale::where('slug', $localeSlug)->value('id');
            if($localeId) {
                session(["locale.id" => $localeId]);
                session(["locale.slug" => $localeSlug]);
            }
        } else session(["locale.slug" => $localeSlug]);
    }
}
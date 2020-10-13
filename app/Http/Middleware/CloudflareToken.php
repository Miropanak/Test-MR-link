<?php


namespace App\Http\Middleware;

use Closure;


class CloudflareToken
{
    public function handle($request, Closure $next)
    {
        $request->headers->set('CF-Access-Client-Id', env('CLOUDFLARE_ID'));
        $request->headers->set('CF-Access-Client-Secret', env('CLOUDFLARE_TOKEN'));

        return $next($request);
    }
}
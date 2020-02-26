<?php


namespace App\Http\Middleware;

use Closure;


class CloudflareToken
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('CF-Access-Client-Id', env('CLOUDFLARE_ID'));
        $response->headers->set('CF-Access-Client-Secret', env('CLOUDFLARE_TOKEN'));

        return $response;
    }
}
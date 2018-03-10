<?php

namespace Bantenprov\IKKabupatenKota\Http\Middleware;

use Closure;

/**
 * The IKKabupatenKotaMiddleware class.
 *
 * @package Bantenprov\IKKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IKKabupatenKotaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

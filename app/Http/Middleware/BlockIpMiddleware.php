<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIpMiddleware
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public $blockIps = ['whitelist-ip-1', 'whitelist-ip-2', '127.0.0.1','192.168.15.48'];
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->ip(), $this->blockIps)) {
            abort(403, "You are restricted to access the site.");
        }
        return $next($request);
    }
}

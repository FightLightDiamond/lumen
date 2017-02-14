<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 2/13/17
 * Time: 12:04 AM
 */

namespace app\Http\Middleware;
use Closure;

class Cors
{
    public function handle($request, Closure $next) {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET', 'POST', 'PUT', 'PATCh', 'DELETE', 'OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
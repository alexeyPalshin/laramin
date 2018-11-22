<?php


namespace Laramin\Middleware;

use Closure;

class ModelCrudEntryPoint
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$scopes)
    {
        //

        return $next($request);
    }

}
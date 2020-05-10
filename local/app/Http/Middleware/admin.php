<?php


namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Auth;

class admin
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
        if(!(Auth::user()->role == 'admin'))
        {
          //  return response('Partie admin  non autorisé  ');
          return back()->withInput();
        }
        
        return $next($request);
    }
}

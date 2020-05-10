<?php


namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Auth;

class professionnel
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
        if(!(Auth::user()->role == 'professionnel'))
        {
          //  return response('Partie professionnel  non autorisé  ');
          return back()->withInput();
        }
        
        return $next($request);
    }
}

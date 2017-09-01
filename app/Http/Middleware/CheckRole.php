<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class CheckRole
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

            if (Auth::check() && Auth::user()->is_client ) {

                $routeName = $request->route()->getName() ;
                switch ($routeName){
                    case 'projects.create' :
                    case 'projects.update':
                    case 'projects.store':
                    case 'projects.destroy':
                    case 'projects.show':
                        return $next($request);
                        break;
                }

                return redirect('/home');
            }
            if (Auth::check() && !Auth::user()->is_client ){

                $routeName = $request->route()->getName() ;
                switch ($routeName){
                    case 'projects.create' :
                    case 'projects.update':
                    case 'projects.store':
                    case 'projects.destroy':
                        return redirect('/home');
                        break;
                }


                    return $next($request);


            }


                return redirect('/home');



        /*
        if ($request->user() === null){
            return response("Insufficient permissions", 401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        ////
        if($roles === $request->user()->userRole()){
            return $next($request);
        } else
            return response("Insufficient permissions", 401);

       ////
        if ($roles === 'client' && $request->user()->is_client){
            return $next($request);
        }
        */


    }
}

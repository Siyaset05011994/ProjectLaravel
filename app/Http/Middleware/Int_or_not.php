<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;

class Int_or_not
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
        if (!filter_var($request->id,FILTER_VALIDATE_INT)||\App\Models\User::where('id','=',$request->id)->count()>0)
        {
                  return view('pages.admin.error');
        }

        return $next($request);
    }
}

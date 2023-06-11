<?php

namespace App\Http\Middleware;//ログイン後に表示するページにアクセス制限をかける

use App\Models\User;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        foreach($user->roles as $role){
            if($role->name=='admin'){
                return $next($request);
            }else{
                abort(404);
            }
        }
    }
}
Route::middleware(['AdminMiddleware'])->group(function(){
    });

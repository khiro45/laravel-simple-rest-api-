<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\characters;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCharacterv
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name=$request->route('name');

        $character =characters::where('name',$name)->first();

        if(!$character){
            return response()->json(['error' => 'Character name not found'], 404);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class Charactervalidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'type' => 'required|string',
                'city' => 'required|string',
            ]);


            return $next($request);
        } catch (ValidationException $e) {
            // Handle validation error
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }
}

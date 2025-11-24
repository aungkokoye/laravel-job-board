<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->employer === null || !$request->user()->employer instanceof \App\Models\Employer) {
            return redirect()->route('employer.create')
                ->with('error', 'You need to create an employer profile first.');
        }

        return $next($request);
    }
}

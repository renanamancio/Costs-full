<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CorrelationIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //verifica se o correlation id existe, se não, cria um
        $correlationId = $request->header('X-Correlation-ID') ?: Str::uuid()->toString();

        //define um  header para um request
        $request->headers->set('X-Correlation-ID', $correlationId);

        //prossegue com o request
        $response =  $next($request);

        //definir um correlation id no header do reponse
        $response->headers->set('X-Correlation-ID', $correlationId);

        //retorna a response
        return $response;
    }
}

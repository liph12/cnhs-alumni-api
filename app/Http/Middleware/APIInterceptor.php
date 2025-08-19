<?php

namespace App\Http\Middleware;

use App\Http\Controllers\APIController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIInterceptor extends APIController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    protected array $validKeys = [
        'hvwHzEJoa7N3n7LJ4F9yIT41SbtkLdwV' => [
            'cnhsalumniassociation.ph', 
            'localhost',
            '127.0.0.1'
        ]
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->query('api_key');
        $origin = $request->header('Origin') ?? $request->header('Referer');

        header("Access-Control-Allow-Origin: $origin");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Headers: Content-Type, X-API-KEY');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

        if (!$apiKey || !isset($this->validKeys[$apiKey])) {
            return $this->failResponse("Invalid API key. => $apiKey");
        }

        $allowedDomains = $this->validKeys[$apiKey];

        if ($origin) {
            $host = parse_url($origin, PHP_URL_HOST);

            if (!in_array($host, $allowedDomains)) {
                return $this->failResponse("Domain not allowed.");
            }
        }

        return $next($request);
    }
}

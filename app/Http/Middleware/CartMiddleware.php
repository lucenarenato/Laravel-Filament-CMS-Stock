<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\CartManager;
use Exception;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $cart = app(CartManager::class);

            if (!$cart->exists()) {
                $cart->create($request->user());
            }

            if ($request->user()) {
                $cart->associateWithUser();
            }
        } catch (Exception $e) {
            // Manejo de excepciones (puedes registrar el error o tomar alguna acción)
            // Log::error('Error en el manejo del carrito: ' . $e->getMessage());

            // Opcional: Redirigir a una página de error o devolver una respuesta de error
            return response()->json(['error' => 'Erro no gerenciamento do carrinho'], 500);
        }

        return $next($request);
    }
}

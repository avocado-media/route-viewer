<?php

namespace Avocadomedia\Hackathon;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RouteController extends Controller
{
    /**
     * Shows the view for displaying all the routes.
     *
     * @return View
     */
    public function index(): View
    {
        $routes = collect(Route::getRoutes());

        foreach (config('hackathon.ignored_routes') as $ignoredRoute) {
            $routes = $routes->filter(function ($value) use ($ignoredRoute) {
                return !preg_match($ignoredRoute, $value->uri());
            });
        }

        return view('hackathon::routeList', [
            'routes' => $routes->transform(function ($route) {
                return [
                    'uri' => $route->uri(),
                    'name' => $route->getName(),
                    'action' => 'Action',
                    'methods' => $route->methods(),
                    'middleware' => $route->middleware()
                ];
            }),
        ]);
    }
}

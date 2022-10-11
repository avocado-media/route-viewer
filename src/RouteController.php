<?php

namespace AvocadoMedia\RouteViewer;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RouteController extends Controller
{
    /**
     * Shows the view for displaying all the routes. We collect all the routes and
     * filter them by the ignored routes defined in the package's config file.
     *
     * https://laravel.com/api/9.x/Illuminate/Routing/Route.html
     *
     * @return View
     */
    public function index(): View
    {
        $routes = collect(Route::getRoutes());

        // In order to filter out ignored routes, we match the pattern
        // against the route's URI, and if they match, we exclude them
        // from the route collection.
        foreach (config('route-viewer.ignored_routes') as $ignoredRoute) {
            $routes = $routes->filter(function ($value) use ($ignoredRoute) {
                return !preg_match($ignoredRoute, $value->uri());
            });
        }

        return view('route-viewer::routeViewer', [
            'routes' => $routes->transform(function ($route) {
                return [
                    'uri' => (config('route-viewer.slash_prefix') ? '/' : '') . $route->uri(),
                    'name' => $route->getName(),
                    'action' => $route->getAction()['uses'] instanceof \Closure ? 'Closure' : $route->getAction()['uses'],
                    'methods' => $route->methods(),
                    'middleware' => $route->middleware()
                ];
            })->sortBy(function ($route) {
                return $route['uri'];
            })->values(),
        ]);
    }
}

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
     * @return View
     */
    public function index(): View
    {
        $routes = collect(Route::getRoutes());

        foreach (config('route-viewer.ignored_routes') as $ignoredRoute) {
            $routes = $routes->filter(function ($value) use ($ignoredRoute) {
                return !preg_match($ignoredRoute, $value->uri());
            });
        }

        return view('route-viewer::routeViewer', [
            'routes' => $routes->transform(function ($route) {
                return [
                    'uri' => '/' . $route->uri(),
                    'name' => $route->getName(),
                    'action' => 'Action',
                    'methods' => $route->methods(),
                    'middleware' => $route->middleware()
                ];
            }),
        ]);
    }
}

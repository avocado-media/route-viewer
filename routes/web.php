<?php

// The route for visiting the route list
\Illuminate\Support\Facades\Route::get('/route-viewer', [\AvocadoMedia\RouteViewer\RouteController::class, 'index']);

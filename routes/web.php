<?php

// Route for the route list view
\Illuminate\Support\Facades\Route::get('/test-route', [\Avocadomedia\Hackathon\RouteController::class, 'index']);

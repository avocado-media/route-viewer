<?php

// Route for the route list view
\Illuminate\Support\Facades\Route::get('/test-route', function () {
    return view('hackathon::routeList');
});

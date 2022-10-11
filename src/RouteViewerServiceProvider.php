<?php

namespace AvocadoMedia\RouteViewer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RouteViewerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('route-viewer')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web');
    }
}

<?php

namespace Avocadomedia\Hackathon;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HackathonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hackathon')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web');
    }
}

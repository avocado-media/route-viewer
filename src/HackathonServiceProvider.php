<?php

namespace Avocadomedia\Hackathon;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Avocadomedia\Hackathon\Commands\HackathonCommand;

class HackathonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('hackathon')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_hackathon_table')
            ->hasCommand(HackathonCommand::class);
    }
}

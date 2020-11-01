<?php

namespace RifRocket\LaravelInstaller;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RifRocket\LaravelInstaller\Skeleton\SkeletonClass
 */
class LaravelInstallerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelinstaller';
    }
}

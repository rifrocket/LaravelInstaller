<?php

namespace RifRocket\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use RifRocket\LaravelInstaller\Events\LaravelInstallerFinished;
use RifRocket\LaravelInstaller\Helpers\EnvironmentManager;
use RifRocket\LaravelInstaller\Helpers\FinalInstallManager;
use RifRocket\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \RifRocket\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \RifRocket\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \RifRocket\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}

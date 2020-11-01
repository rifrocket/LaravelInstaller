<?php


namespace RifRocket\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use RifRocket\LaravelInstaller\Helpers\ProgressHelper;
use RifRocket\LaravelInstaller\Helpers\RequirementsChecker;

class RequirementsController extends Controller
{
    /**
     * @var RequirementsChecker
     */
    protected $requirements;
    protected $ProgressBar;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker,ProgressHelper $ProgressBar)
    {
        $this->requirements = $checker;
        $this->ProgressBar = $ProgressBar;
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('installer.core.minPhpVersion')
        );
        $requirements = $this->requirements->check(
            config('installer.requirements')
        );
        $this->ProgressBar->update_session_data(1);
        return view('vendor.installer.requirements', compact('requirements', 'phpSupportInfo'));
    }
}

<?php


namespace RifRocket\LaravelInstaller\Controllers;


use App\Http\Controllers\Controller;
use RifRocket\LaravelInstaller\Helpers\ProgressHelper;

class WelcomeController extends Controller
{
    protected $ProgressBar;
    public function __construct(ProgressHelper $ProgressBar)
    {
        $this->ProgressBar = $ProgressBar;

    }
    public function welcome()
    {
        $this->ProgressBar->calculate_progess(3,config('installer.config.num_of_environment_steps'));
        return view('vendor.installer.welcome');
    }
}

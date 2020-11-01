<?php


namespace RifRocket\LaravelInstaller\Controllers;



use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use RifRocket\LaravelInstaller\Helpers\ProgressHelper;

class ProgressBarController extends Controller
{
    protected $ProgressBar;
    public function __construct(ProgressHelper $ProgressBar)
    {
        $this->ProgressBar = $ProgressBar;
    }

    public function add_session_complete_steps()
    {
        $counter=1;
        $installerSession= json_decode(Session::get('installerSession')) ;
       return $this->ProgressBar->update_session_data($installerSession->complete_steps+$counter);
    }

    public function sub_session_complete_steps()
    {
        $counter=1;
        $installerSession= json_decode(Session::get('installerSession')) ;
        return $this->ProgressBar->update_session_data($installerSession->complete_steps-$counter);
    }
}

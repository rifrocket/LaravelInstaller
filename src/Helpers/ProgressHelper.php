<?php


namespace RifRocket\LaravelInstaller\Helpers;

use Illuminate\Support\Facades\Session;

class ProgressHelper
{
    protected $step_value;

    public function calculate_progess($initial_count, $conCount)
    {
        $step_count=$initial_count+$conCount;
        $this->step_value=100/($initial_count+$conCount);
        self::createSession($initial_count,$step_count,$this->step_value);
    }

    public function createSession($initial_steps, $steps, $percentage )
    {
        $installerSession=array('initial_steps'=>$initial_steps, 'steps'=> $steps, 'percentage'=>$percentage, 'complete_steps'=>0);
        Session::put('installerSession',json_encode($installerSession));
        Session::save();
    }

    public static function update_session_data($current_step)
    {
        $installerSession= json_decode(Session::get('installerSession')) ;
        $installerSession->complete_steps=$current_step;
        $currentProgress=$installerSession->complete_steps*$installerSession->percentage;
        Session::put('installerSession',json_encode($installerSession));
        Session::put('currentProgress',$currentProgress);
        Session::save();
        return Session::get('currentProgress');
    }

    public static function envoirment_states()
    {
        $installerSession= json_decode(Session::get('installerSession')) ;
        $envoirment_stepts= abs($installerSession->steps-$installerSession->initial_steps);
        $completed_steps=abs($installerSession->complete_steps-$installerSession->initial_steps);
       if ($completed_steps==0)
       {
           return $completed_steps+1;
       }
        return $completed_steps;
    }

    public function destroySession()
    {
        Session::forget(['installerSession','currentProgress']);
    }
}

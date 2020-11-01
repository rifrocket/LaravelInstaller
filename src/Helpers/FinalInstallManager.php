<?php


namespace RifRocket\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use MongoDB\Driver\Session;
use Symfony\Component\Console\Output\BufferedOutput;

class FinalInstallManager
{

    private $ProgressBar;
    public function __construct(ProgressHelper $ProgressBar)
    {

        $this->ProgressBar = $ProgressBar;
    }

    /**
     * Run final commands.
     *
     * @return string
     */
    public function runFinal()
    {

        $outputLog = new BufferedOutput;

        $this->generateKey($outputLog);
        $this->publishVendorAssets($outputLog);
        $this->ProgressBar->update_session_data(json_decode(\Session::get('installerSession'))->complete_steps+1);
        return $outputLog->fetch();
    }

    /**
     * Generate New Application Key.
     *
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     * @return \Symfony\Component\Console\Output\BufferedOutput|array
     */
    private static function generateKey(BufferedOutput $outputLog)
    {
        try {
            if (config('installer.final.key')) {
                Artisan::call('key:generate', ['--force'=> true], $outputLog);
            }
        } catch (Exception $e) {
            return static::response($e->getMessage(), $outputLog);
        }

        return $outputLog;
    }

    /**
     * Publish vendor assets.
     *
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     * @return \Symfony\Component\Console\Output\BufferedOutput|array
     */
    private static function publishVendorAssets(BufferedOutput $outputLog)
    {
        try {
            if (config('installer.final.publish')) {
                Artisan::call('vendor:publish', ['--all' => true], $outputLog);
            }
        } catch (Exception $e) {
            return static::response($e->getMessage(), $outputLog);
        }

        return $outputLog;
    }

    /**
     * Return a formatted error messages.
     *
     * @param $message
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     * @return array
     */
    private static function response($message, BufferedOutput $outputLog)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'dbOutputLog' => $outputLog->fetch(),
        ];
    }
}

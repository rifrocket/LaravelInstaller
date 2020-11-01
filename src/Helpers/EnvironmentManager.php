<?php


namespace RifRocket\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent($final=null)
    {
        if (empty($final))
        {
            if (config('installer.config.use_env_example_template') =='true' OR !file_exists($this->envPath)) {
                if (file_exists($this->envExamplePath)) {
                    copy($this->envExamplePath, $this->envPath);
                } else {
                    touch($this->envPath);
                }
            }
        }


        return file_get_contents($this->envPath);
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }


    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveFileWizard(Request $request)
    {
        $results = trans('installer_messages.environment.success');
        try {
            if (config('installer.config.use_env_example_template')=='false')
            {
                $envFileData ='APP_KEY= base64:'.base64_encode(Str::random(32))."\n";
                foreach($request->all() as $key => $value) {
                    if ($key == "_token") {
                        continue;
                    }
                    $envFileData .= $key . '=' . $value . "\n";
                }
                file_put_contents($this->envPath, $envFileData);
            }

            elseif(config('installer.config.use_env_example_template') =='true')
            {
                foreach($request->all() as $key => $value) {
                    $this->update_env($key, $value);

                }
                $this->update_env('APP_KEY', 'base64:'.base64_encode(Str::random(32)));

            }

        } catch (Exception $e) {
            $results = trans('installer_messages.environment.errors');
        }

        return $results;
    }

    /**
     * @param $key
     * @param $value
     */
    public function update_env($key, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
            ));
        }
    }
}

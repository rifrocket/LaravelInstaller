<?php


namespace RifRocket\LaravelInstaller\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use PDO;
use RifRocket\LaravelInstaller\Events\EnvironmentSaved;
use RifRocket\LaravelInstaller\Helpers\EnvironmentManager;
use RifRocket\LaravelInstaller\Helpers\ProgressHelper;
use Validator;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;
    protected $ProgressBar;
    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager,ProgressHelper $ProgressBar)
    {
        $this->EnvironmentManager = $environmentManager;
        $this->ProgressBar = $ProgressBar;
    }

    /**
     * Display the Environment menu page.
     * @return \Illuminate\View\View
     */
    public function environmentMenu()
    {
        $this->ProgressBar->update_session_data(3);
        $envConfig = $this->EnvironmentManager->getEnvContent();
        return view('vendor.installer.environment-wizard', compact('envConfig'));
    }


    /**
     * Processes the newly saved environment configuration (Form Wizard).
     *
     * @param Request $request
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveWizard(Request $request, Redirector $redirect)
    {
        $rules = config('installer.environment.form.rules');
        $messages = [
            'environment_custom.required_if' => trans('installer_messages.environment.wizard.form.name_required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors($validator->errors());
        }

        if (! $this->checkDatabaseConnection($request)) {
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors([
                'database_connection' => trans('installer_messages.environment.wizard.form.db_connection_failed'),
            ]);
        }

        $results = $this->EnvironmentManager->saveFileWizard($request);

        event(new EnvironmentSaved($request));

        return $redirect->route('LaravelInstaller::database')
            ->with(['results' => $results]);
    }

    /**
     * Validate database connection with user credentials (Form Wizard).
     *
     * @param Request $request
     * @return bool
     */
    private function checkDatabaseConnection(Request $request)
    {
        $DB_CONNECTION = $request->input('DB_CONNECTION');
        $DB_HOST = $request->input('DB_HOST');
        $DB_PORT = $request->input('DB_PORT');
        $DB_DATABASE = $request->input('DB_DATABASE');
        $DB_USERNAME = $request->input('DB_USERNAME');
        $DB_PASSWORD = $request->input('DB_PASSWORD');

      if((DB::connection()->getDatabaseName() != $DB_DATABASE) AND ($DB_CONNECTION=='mysql' OR $DB_CONNECTION=='MYSQL'))
      {
          $pdo = $this->getPDOConnection($DB_CONNECTION, $DB_HOST, $DB_PORT, $DB_USERNAME, $DB_PASSWORD);
          $pdo->exec(sprintf('CREATE DATABASE IF NOT EXISTS %s ;', $DB_DATABASE));

      }

        $settings = config("database.connections.$DB_CONNECTION");

        config([
            'database' => [
                'default' => $DB_CONNECTION,
                'connections' => [
                    $DB_CONNECTION => array_merge($settings, [
                        'driver' => $DB_CONNECTION,
                        'host' => $request->input('DB_HOST'),
                        'port' => $request->input('DB_PORT'),
                        'database' => $request->input('DB_DATABASE'),
                        'username' => $request->input('DB_USERNAME'),
                        'password' => $request->input('DB_PASSWORD'),
                    ]),
                ],
            ],
        ]);
        DB::purge();

        try {
            DB::connection()->getPdo();
            return true;
        } catch (Exception $e) {
            return false;
        }


    }

    private function getPDOConnection($driver,$host, $port, $username, $password)
    {
        return new PDO(sprintf($driver.':host=%s;port=%d;', $host, $port), $username, $password);
    }
}

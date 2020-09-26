<?php


namespace RifRocket\LaravelInstaller;

use Illuminate\Routing\Controller;
use RifRocket\LaravelInstaller\Helpers\DatabaseManager;

class DatabseController
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        $response = $this->databaseManager->migrateAndSeed();

        return redirect()->route('LaravelInstaller::final')
            ->with(['message' => $response]);
    }
}

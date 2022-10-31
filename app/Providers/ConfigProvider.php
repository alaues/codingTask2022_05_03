<?php

namespace App\Providers;

use App\DTO\DatabaseConfigDTO;

class ConfigProvider
{
    /**
     * @var DatabaseConfigDTO
     */
    private DatabaseConfigDTO $databaseConfig;


    /**
     * ConfigProvider constructor
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->loadDatabaseConfig();
    }

    /**
     * @return DatabaseConfigDTO
     */
    public function getDatabaseConfig()
    {
        return $this->databaseConfig;
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function loadDatabaseConfig(): void
    {
        $filename = __DIR__ . '/../../config/database.php';
        if (file_exists($filename)) {
            $config = (array) include $filename;
            $config = $config['default'];
            if (!$config) {
                throw new \Exception('database config not found');
            }
            $this->databaseConfig = new DatabaseConfigDTO(
                $config['host'],
                $config['port'],
                $config['dbname'],
                $config['user'],
                $config['password']
            );
            return;
        }
        throw new \Exception('database config not found');
    }
}

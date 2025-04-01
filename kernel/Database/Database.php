<?php

namespace App\Kernel\Database;

use App\Kernel\Config\ConfigInterface;
use PDO;

class Database implements DatabaseInterface
{
    private PDO $pdo;

    public function __construct(private ConfigInterface $config)
    {
        $this->connect();
    }
    public function insert(string $table, array $data): int|false
    {
        return 1;
    }

    private function connect(): void
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $charset = $this->config->get('database.charset');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');

        try {
            $this->pdo = new PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (\PDOException $exception) {
            exit("Database connection failed: ". $exception->getMessage());
        }
    }
}

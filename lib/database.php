<?php

require 'vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Database;

class DatabaseConnection {
    private $database = null;

    public function getConnection(): Database {
        if ($this->database === null) {
            $host = 'localhost';
            $port = 27017; // port par défaut de MongoDB
            $dbname = 'testdb';

            $uri = "mongodb://$host:$port";

            try {
                $client = new Client($uri);
                $this->database = $client->selectDatabase($dbname);
            } catch (Exception $e) {
                die('Erreur de connexion à MongoDB : ' . $e->getMessage());
            }
        }

        return $this->database;
    }
}

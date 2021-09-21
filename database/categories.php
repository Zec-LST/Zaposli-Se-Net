<?php
    
    if (file_exists("../database/dbconfig.php")) {
        include_once("../database/dbconfig.php");
    }
    if (file_exists("./database/dbconfig.php")) {
        include_once("./database/dbconfig.php");
    }
    if (file_exists("./dbconfig.php")) {
        include_once("./dbconfig.php");
    }


    class Categories {
        private $conn;
        private $tableName = "categories";

        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->createTableIfNotExist();

            if (count($this->retrieveCategories()->fetchAll()) == 0) {
                $this->insert("Posao na određeno vrijeme");
                $this->insert("Posao na Adventu");
                $this->insert("Posao u inozemstvu");
                $this->insert("Posao u Posao za umirovljenike");
                $this->insert("Honorarni posao");
                $this->insert("Stalni radni odnos");
                $this->insert("Studentski posao");
                $this->insert("Poslovi u IT");
                $this->insert("Sezonski posao 2021");
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function createTableIfNotExist() {
            $query = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $this->tableName (
                category_name          VARCHAR(50) NOT NULL PRIMARY KEY
            );
            EOSQL;

            $this->conn->exec($query);
        }

        public function insert($category_name) {

            $query = <<<EOSQL
                INSERT INTO $this->tableName(category_name) VALUES(:category_name);
            EOSQL;

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':category_name', $category_name);

            try {
                $stmt->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retrieveCategories() {
            $query = <<<EOSQL
                SELECT * FROM $this->tableName;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retreiveCategoryByName($name){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE category_name=:name LIMIT 1;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':name', $name);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

    }
        $categories_table = new Categories();

?>

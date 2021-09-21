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

    class Counties {
        private $conn;
        private $tableName = "counties";

        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->createTableIfNotExist();

            if (count($this->retrieveCounties()->fetchAll()) == 0) {
                $this->insert("Zagrebačka županija");
                $this->insert("Krapinsko-zagorska županija");
                $this->insert("Sisačko-moslavačka županija");
                $this->insert("Karlovačka županija");
                $this->insert("Varaždinska županija");
                $this->insert("Koprivničko-križevačka županija");
                $this->insert("Bjelovarsko-bilogorska županija");
                $this->insert("Primorsko-goranska županija");
                $this->insert("Ličko-senjska županija");
                $this->insert("Virovitičko-podravska županija");
                $this->insert("Požeško-slavonska županija");
                $this->insert("Brodsko-posavska županija");
                $this->insert("Zadarska županija");
                $this->insert("Osječko-baranjska županija");
                $this->insert("Šibensko-kninska županija");
                $this->insert("Vukovarsko-srijemska županija");
                $this->insert("Splitsko-dalmatinska županija");
                $this->insert("Istarska županija");
                $this->insert("Dubrovačko-neretvanska županija");
                $this->insert("Međimurska županija");
                $this->insert("Grad Zagreb");
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function createTableIfNotExist() {
            $query = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $this->tableName (
                county_name        VARCHAR(50) NOT NULL PRIMARY KEY
            );
            EOSQL;

            $this->conn->exec($query);
        }

        public function insert($county_name) {

            $query = <<<EOSQL
                INSERT INTO $this->tableName(county_name) VALUES(:county_name);
            EOSQL;

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':county_name', $county_name);

            try {
                $stmt->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retrieveCounties() {
            $query = <<<EOSQL
                SELECT county_name FROM $this->tableName;
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

        public function retreiveCountyByName($name){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE county_name=:name LIMIT 1;
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
        $counties_table = new Counties();

?>

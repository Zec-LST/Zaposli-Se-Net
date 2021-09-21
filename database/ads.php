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

    class Ads {
        private $conn;
        private $tableName = "ads";

        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->createTableIfNotExist();

            if (count($this->retrieveAds()->fetchAll()) == 0) {
                $this->insert("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.jpD63kYxdmBKXV4M6sJliAHaE6%26pid%3DApi&f=1", "Istarska","Osijek","Osječko-baranjska županija","Studentski posao","Opis","Konobar","23.9.2021.",30,1);
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function createTableIfNotExist() {
            $query = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $this->tableName (
                ad_id                INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
                ad_image             TEXT DEFAULT NULL,
                ad_street            VARCHAR(50) NOT NULL,
                ad_city              VARCHAR(50) NOT NULL,
                ad_county            VARCHAR(50) NOT NULL,
                ad_category          VARCHAR(50) NOT NULL,
                ad_title             TEXT DEFAULT NULL,
                ad_description       TEXT DEFAULT NULL,
                ad_expire_time       TEXT DEFAULT NULL,
                ad_wage              FLOAT DEFAULT NULL,
                employer_id          INT NOT NULL,
                FOREIGN KEY (employer_id) REFERENCES users (user_id) ON DELETE CASCADE,
                FOREIGN KEY (ad_county) REFERENCES counties (county_name),
                FOREIGN KEY (ad_category) REFERENCES categories (category_name)
            );
            EOSQL;

            $this->conn->exec($query);
        }

        public function insert($ad_image, $ad_street, $ad_city, $ad_county, $ad_category, $ad_title, $ad_description, $ad_expire_time, $ad_wage, $employer_id) {
            $ad = array(
                ':image' => $ad_image,
                ':street' => $ad_street,
                ':city' => $ad_city,
                ':county' => $ad_county,
                ':category' => $ad_category,
                ':title' => $ad_title,
                ':description' => $ad_description,
                ':expire_time' => $ad_expire_time,
                ':wage' => $ad_wage,
                ':employer_id' => $employer_id
            );

            $query = <<<EOSQL
                INSERT INTO $this->tableName(ad_image, ad_street, ad_city, ad_county, ad_category, ad_title, ad_description, ad_expire_time, ad_wage, employer_id) VALUES(:image,:street,:city,:county,:category,:title,:description,:expire_time,:wage,:employer_id);
            EOSQL;

            $stmt = $this->conn->prepare($query);

            try {
                $stmt->execute($ad);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retrieveAds() {
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

        public function retreiveAdById($id){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE ad_id=:id LIMIT 1;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retreiveAdsByEmployerId($id){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE employer_id=:id;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retreiveAdsByCounty($county){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE ad_county=:county;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':county', $county);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retreiveAdsByCategory($category){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE ad_category=:category;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':category', $category);

            try {
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function update($ad_image,$ad_street,$ad_city,$ad_county, $ad_category, $ad_title, $ad_description, $ad_expire_time, $ad_wage, $employer_id, $id) {
            $ad = array(
                ':image' => $ad_image,
                ':street' => $ad_street,
                ':city' => $ad_city,
                ':county' => $ad_county,
                ':category' => $ad_category,
                ':title' => $ad_title,
                ':description' => $ad_description,
                ':expire_time' => $ad_expire_time,
                ':wage' => $ad_wage,
                ':employer_id' => $employer_id,
                ':id' => $id
            );

            $query = <<<EOSQL
                    UPDATE $this->tableName SET ad_image=:image, ad_street=:street, ad_city=:city, ad_county=:county, ad_category=:category, ad_title=:title, ad_description=:ad_description, ad_expire_time=:expire_time, ad_wage=:wage, employer_id=:employer_id WHERE ad_id=:id;
                EOSQL;


                $stmt = $this->conn->prepare($query);

                try {
                    $stmt->execute($ad);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
        }

        public function deleteAd($id) {
            $query = <<<EOSQL
                DELETE FROM $this->tableName WHERE ad_id=:id;
            EOSQL;

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id);

            try {
                $stmt->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

    }
        $ads_table = new Ads();

?>

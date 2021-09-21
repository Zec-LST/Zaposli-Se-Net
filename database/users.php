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

    class Users {
        private $conn;
        private $tableName = "users";

        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->createTableIfNotExist();

            if (count($this->retrieveUsers()->fetchAll()) == 0) {
                $this->insert("employer@employer.com", "employer123","http://www.naceweb.org/uploadedImages/images/2017/feature/employer-rescinds-job-offer.jpg","0955433333","Ferit");
                $this->insert("mcdonalds@mcdonalds.com", "mcdonalds123","https://www.peterboroughtoday.co.uk/webimg/T0FLMTIzNTcwOTc3.jpg","0910910911","McDonalds");
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function createTableIfNotExist() {
            $query = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $this->tableName (
                user_id                 INT AUTO_INCREMENT PRIMARY KEY,
                user_email              VARCHAR (255) DEFAULT NULL,
                user_password           TEXT DEFAULT NULL,
                user_image              TEXT DEFAULT NULL,
                user_contact_number     INT(11) DEFAULT NULL,
                user_company_name       TEXT DEFAULT NULL
            );
            EOSQL;

            $this->conn->exec($query);
        }

        public function insert($user_email, $user_password, $user_image, $user_contact_number, $user_company_name) {
            $user = array(
                ':user_email' => $user_email,
                ':user_password' => md5($user_password),
                ':user_image' => $user_image,
                ':user_contact_number' => $user_contact_number,
                ':user_company_name' => $user_company_name
            );

            $query = <<<EOSQL
                INSERT INTO $this->tableName(user_email, user_password, user_image, user_contact_number, user_company_name) VALUES(:user_email,:user_password,:user_image,:user_contact_number,:user_company_name);
            EOSQL;

            $stmt = $this->conn->prepare($query);

            try {
                $stmt->execute($user);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function retrieveUsers() {
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


        public function retrieveUserById($id){
            $query = <<<EOSQL
                SELECT * FROM $this->tableName WHERE user_id=:id LIMIT 1;
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

    public function deleteUser($id) {
        $query = <<<EOSQL
            DELETE * FROM $this->tableName WHERE user_id=:id;
        EOSQL;

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            echo "id";
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
    $users_table = new Users();

?>

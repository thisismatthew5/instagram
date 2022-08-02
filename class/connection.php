<?php

    class Database
    {
        private $server = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "instagram";

        public function connect(){
            $connection = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);
            return $connection;
        }

        public function save($query){
            $conn = $this->connect();
            $result = mysqli_query($conn, $query);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function read($query){
            $conn = $this->connect();
            $result = mysqli_query($conn, $query);
            if(!$result){
                return false;
            }else{
                $data = false;
                while($row = mysqli_fetch_assoc($result)){
                    // $row = $data[]; cannot use this for reading data
                    $data[] = $row;
                }return $data;
            }
        }
    }
?>
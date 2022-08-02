<?php

    // class Signup
    // {
    //     private $error = "";

    //     public function verify($data)
    //     {

    //         foreach($data as $key => $value){

    //             if(empty($value)){

    //                 $this->error .= $key . " is empty<br>";

    //             }else{
    //                 if($key == 'first_name'){
    //                     if(is_numeric($value)){
    //                         $this->error .= " please input a valid first name<br>";
    //                     }

    //                     if(strstr($value," ")){
    //                             $this->error .= " please remove all spaces from the name<br>";
    //                     }
                        
    //                 }
    //                 if($key == 'last_name'){
    //                     if(is_numeric($value)){
    //                         $this->error .= " please input a valid last name<br>";
    //                     }
    //                     if(strstr($value," ")){
    //                         $this->error .= " please remove all spaces from the name<br>";
    //                     }
                        
    //                 }
    //                 if($key == "email"){
    //                     if(!preg_match("/([\w\-]+\@[\w\-)]+\.[\w\-]+)/", $value)){
    //                         $this->error .= " invalid" . $key;
    //                     }else{
    //                         $select = "select * from users where email = '$value' limit 1";
    //                         $DB = new Database();
    //                         $conn = $DB->connect();
    //                         $result = mysqli_query($conn, $select);

    //                         if(mysqli_num_rows($result) > 0){
    //                             $this->error .= " email already exists<br>";
    //                         }
    //                     }

    //                 }
    //                 if($key == "age"){
    //                     if(!is_numeric($value)){
    //                         $this->error .= " please enter a valid age<br>";
    //                     }

    //                     if($value < 18){
    //                         $this->error .= " please you have to be up to 18 to register<br>";
    //                     }
    //                 }
    //                 if($key == "cpassword"){
    //                     if($value != $_POST['password']){
    //                         $this->error .= " password must tally";
    //                     }
    //                 }
    //             }
    //         }
    //         if(empty($this->error)){
    //             $this->create_user($data);
    //         }else{
    //             return $this->error;
    //         }
    //     }


    //     public function create_user($data)
    //     {
            
    //         $first_name = ucfirst($data['first_name']);
    //         $last_name = ucfirst($data['last_name']);
    //         $email = $data['email'];
    //         $gender = $data['gender'];
    //         $age = $data['age'];
    //         $password = $data['password'];
    //         $cpassword = $data['cpassword'];

    //         $userid = $this->create_userid();
    //         $url = strtolower($first_name) . "." . strtolower($last_name);

    //         $query = "insert into users(userid, first_name, last_name, email, age, gender, url, password, cpassword) values ('$userid', '$first_name', '$last_name', '$email', '$age', '$gender', '$url', '$password', '$cpassword')";

    //         $DB = new Database();
    //         $DB->save($query);
    //     }


    //     private function create_userid(){
    //         $length = rand(4,19);
    //         $number = "";
    //         for($i=0; $i<$length; $i++){
    //             $random = rand(0,9);
    //             $number .= $random;
    //         }
    //         return $number;
    //     }
    // }



    class Signup
    {
        private $error ="";

        public function verify($data)
        {
            foreach($data as $key => $value){
                if(empty($value)){
                    $this->error .= $key . " is empty <br>";
                }else{
                    if($key == 'first_name'){
                        if(is_numeric($value)){
                            $this->error .= $key . " cant contain number<br>";
                        }
                        if(strstr($value, " ")){
                            $this->error .= $key . " please remove all space from name";
                        }
                    }
                    if($key == 'last_name'){
                        if(is_numeric($value)){
                            $this->error .= $key . " cant contain number<br>";
                        }
                        if(strstr($value, " ")){
                            $this->error .= $key . " please remove all space from name";
                        }
                    }
                    if($key == "email"){
                        if(!preg_match("/([\w\-]+\@[\w\-)]+\.[\w\-]+)/", $value)){
                           $this->error .= " invalid" . $key;
                       }else{
                           $select = "select * from users where email = '$value' limit 1";
                           $DB = new Database();
                             $conn = $DB->connect();
                           $result = mysqli_query($conn, $select);
                           if(mysqli_num_rows($result) > 0){
                               $this->error .= $key . " email already exists<br>";
                           }
                       }

                    }
                    if($key == "age"){
                        if(!is_numeric($value)){
                             $this->error .= " please enter a valid age<br>";
                        }

                        if($value < 18){
                            $this->error .= " please you have to be up to 18 to register<br>";
                        }
                    }
                    if($key == 'cpassword'){
                        if($value != $_POST['password']){
                            $this->error .= " please check password<br>";
                        }
                    }
                    

                }
            }
            if(empty($this->error)){
                $this->create_user($data);
            }else{
                return $this->error;
            }
        }

        public function create_user($data){
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $email = $data['email'];
            $gender = $data['gender'];
            $age = $data['age'];
            $password = $data['password'];
            $cpassword = $data['cpassword'];

            $url = strtolower($first_name) . "." . strtolower($last_name);
            $userid = $this->create_userid();

            $query = "insert into users(userid, first_name, last_name, email, age, gender, url, password, cpassword) values ('$userid', '$first_name', '$last_name', '$email', '$age', '$gender', '$url', '$password', '$cpassword')";

            $DB = new Database();
            $DB->save($query);

        }

        private function create_userid(){
            $length = rand(4,19);
            $number = "";
            for($i=0; $i<$length; $i++){
                $randnum = rand(0,9);
                $number .= $randnum;
            }return $number;
        }
    }
?>
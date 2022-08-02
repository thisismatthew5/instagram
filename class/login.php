<?php

// class Login
// {
//     private $error = "";

//     public function verify($data){


//         $email = $data['email'];
//         $password = $data['password'];

//         $query = "select * from users where email = '$email' limit 1";
//         $DB = new Database();
//         $result = $DB->read($query);

//         if($result){
//             $row = $result[0];
//             if($password == $row['password']){
//                 $_SESSION['userid'] = $row['userid'];

//             }else{
//                 $this->error .= " incorrect password";
//             }
//         }
//         else{
//             $this->error .= " invalid email";
//         }
//         return $this->error;

//     }
// }


class Login{

    private $error = "";

    public function verify($data){

        $email = $data['email'];
        $password = $data['password'];

        $query = "select * from users where email = '$email' limit 1";
        $DB = new Database();
        $result = $DB->read($query);
        if($result){
            $row = $result[0];
            if($password == $row['password']){
                $_SESSION['userid'] = $row['userid'];
            }else{
                $this->error .= " wrong password";
            }
        }else{
            $this->error .= " invalid email";
        }
        return $this->error;
    }

    public function check_login($id){
        $DB = new Database();
        $query = "select userid from users where userid = '$id' limit 1";
        $result = $DB->read($query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}

?>
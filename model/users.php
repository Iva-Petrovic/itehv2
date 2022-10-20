<?php
class User{
    public $id;
    public $username;
    public $password;

    public function __construct($id= null, $username=null, $password=null){
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
    }

    public static function loginUser($user, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$user->username' AND password='$user->password'";
       // return true; #da nam ne bi bacao greske

       return $conn->query($query);
    }
}
?>
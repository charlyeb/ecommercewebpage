<?php


namespace Config;


class Config
{
    public function con()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "company";
        $conn = mysqli_connect($host,$user,$pass,$db);
        if ($conn==true){
            return $conn;
        }else{
            die($conn);
        }
    }

    public function query($sql)
    {
        return mysqli_query($this->con(),$sql);
    }
}

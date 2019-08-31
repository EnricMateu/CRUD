<?php
class User 
{
    public $id;
    public $name;
    public $lastname;
    public $id_rol;
    public $id_schedule;

    function getUserData ($con, $username, $password)
    {
            $sqlSentence = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
        $result=mysqli_query($con, $sqlSentence);
        try {
        if ($result);
        } catch(Exception $e){
        //header("Location: ../views/viewLogin.html");
        echo $e->getMessage();
        }
        foreach($result as $value)
        {
            $this->id= $value['id'];
            $this->name= $value['name'];
            $this->lastname= $value['last_name'];
            $this->id_rol= $value['id_rol'];
            $this->id_schedule= $value['id_schedule'];
        }
    }

    function fichar($conn,$date,$time,$idUser,$meteo)
    {
        $sql= "INSERT INTO attendance (id_user,date,time,meteo) VALUES('$idUser','$date','$time','$meteo')";
        $result = mysqli_query($conn,$sql);
        try {
        if ($result);
        } catch(Exception $e) {
        echo $e->getMessage();
        }
    }
}
?>
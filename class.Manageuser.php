<?php
    include_once('class.database.php');

    class ManageUsers{
        public $link;
        
        function __construct(){
            $db_connection = new dbConnection();
            $this->link = $db_connection->connect();
            return $this->link;
        }
        
        function registerUsers($username,$password,$time,$date){
            $query = $this->link->prepare("INSERT INTO users (username,password,time,date) VALUES ($username,$password,$time,$date)");
            $values = array($username,$password,$time,$date);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }
    }
    $user = new ManageUsers();
    echo $user->registerUsers('joo','jh','12:00','21-02-2021');

?>
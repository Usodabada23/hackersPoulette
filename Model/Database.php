<?php
class Database{
    private $db;
    public function __construct(){
        try{
            $db = new PDO('mysql:host=localhost:3307;dbname=hackers;charset=utf8', 'root', '');
            return $db;
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
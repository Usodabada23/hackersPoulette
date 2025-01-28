<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'Database.php';
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;


class Client{

    private $db;
    private string $lastname;
    private string $firstname;
    private string $email; 

    public function __construct(string $lastname,string $firstname,string $email){
        $this->db = new Database();
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
    }


    // get and set 
    public function getLastname(){return $this->lastname;}
    public function getFirstname(){return $this->firstname;}
    public function getEmail(){return $this->email;}
    
    public function getIdByEmail() {
        $stmt = $this->db->getDb()->prepare("SELECT id FROM clients WHERE email = ?");
        $stmt->execute([$this->email]);
        return $stmt->fetchColumn(); 
    }

    public static function verifLastnameAndFirstname(string $text){
        if(strlen($text)>255 || strlen($text)<2){
            return false;
        }else {
            return true;
        }
    }
    public static function verifEmail(string $text){
        $validator = new EmailValidator();
        return $validator->isValid($text, new RFCValidation());
    }
    public function addClient(){
        $sql = "INSERT INTO clients (lastname,firstname,email) VALUES (?,?,?)";
        $stmt= $this->db->getDb()->prepare($sql);
        $stmt->execute([$this->lastname,$this->firstname, $this->email]);
    }



}
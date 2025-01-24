<?php
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

require_once './Database.php';

class Client{

    private $db;
    private string $lastname;
    private string $firstname;
    private string $email; 
    private string $role;

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
    public function getMessage(){return $this->message;}

    public function setLastname(string $text){
        if(strlen($text)>255 || strlen($text)<2){
            echo "lastname too long or too short";
            exit();
        }else {
            return $this->lastname = $text;
        }
    }
    public function setFirstname(string $text){
        if(strlen($text)>255 || strlen($text)<=0){
            echo "firstname too long or too short";
            exit();
        }else {
            return $this->firstname = $text;
        }
    }
    public function setEmail(string $text){
        $validator = new EmailValidator();
        if(!$validator->isValid($text,new RFCValidation())){
            echo "Invalid email";
            exit();
        }else{
            return $this->email = $text;
        }       
    }
    
    public static function getIdByEmail($email){
        $stmt = $this->db->prepare("SELECT id FROM clients WHERE email = ?");
        $id = $stmt->execute([$email]);
        return $id;  
    }



}
<?php
require_once 'Database.php';

class Message{
    private $db;
    private int $id_client;
    private string $description;
    private ?string $file;

    public function __construct(int $id_client,string $description,?string $file){
        $this->db = new Database();
        $this->id_client = $id_client;
        $this->description = $description;
        $this->file = $file;
    }

    // get and set 
    public function getClientId(){return $this->id_client;}
    public function getDescription(){return $this->description;}


    public function saveMessage(){
        $sql = "INSERT INTO messages (description,publish_date,id_client,file) VALUES (?,NOW(),?,?)";
        $stmt= $this->db->getDb()->prepare($sql);
        $stmt->execute([$this->description,$this->id_client,$this->file]);
    }
    public function deleteMessage($id){
        try{
           $sql = "DELETE FROM messages WHERE id = ? ";
           $stmt= $this->db->getDb()->prepare($sql);
           $stmt->execute([$id]); 
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    public static function showAllMessages(){
        try{
          $sql = "SELECT * FROM messages";
        $stmt = $this->db->getDb()->prepare($sql)->execute();
        $rows = $stmt->fetchAll();
        return $rows;  
        }catch(Exception $e){
            echo $e->getMessage();
        }    
    }
    public static function showMessageByClient($client_id){ 
        try{
            $sql = "SELECT clients.email,messages.id,messages.description FROM clients FULL OUTER JOIN messages ON clients.id = messages.id_clients WHERE id_client=?";
            $stmt = $this->db->getDb()->prepare($sql)->execute([$client_id]);
            $rows = $stmt->fetchAll();
            return $rows;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    public function __destruct(){
        $this->db= null;
    }

}
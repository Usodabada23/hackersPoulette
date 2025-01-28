<?php
require_once 'Model/Client.php';
require_once 'Model/Message.php';
require_once 'C:\xampp\htdocs\hackers\vendor\google\recaptcha\src\autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
class formController{
    
    
    public function formView(){
        $this->submit();
        require 'View/client/formView.php';
        
    }

    public function verifyReCaptcha(){
        if(isset($_POST["ok"])){
                $gRecaptchaResponse = $_POST['g-recaptcha-response'];
                $remoteIp = $_SERVER['REMOTE_ADDR'];

                $recaptcha = new ReCaptcha\ReCaptcha($_ENV["RECAPTCHA"]);
                $resp = $recaptcha->setExpectedHostname('localhost')
                                ->verify($gRecaptchaResponse, $remoteIp);

                if (!$resp->isSuccess()) {
                    $errors = $resp->getErrorCodes();
                    var_dump($errors);
                } 
            } 
    }
    public function getUrlByFile() {
        if (isset($_FILES["file"])) {
            $size = $_FILES["file"]["size"];
            $imageData = getimagesize($_FILES["file"]["tmp_name"]);
    
            if ($imageData === false) {
                return "Error: file is not a valid image";
            }
            if ($size > 2097152 || !in_array($imageData['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
                return "Error: file must be .jpg, .png, or .gif and no larger than 2MB";
            }
    
            $cloud_name = $_ENV["CLOUD_NAME"];
            $myKey = $_ENV["CLOUDINARY_KEY"];
            $secret = $_ENV["CLOUDINARY_SECRET"];
            Configuration::instance(array(
                "cloud_name" => $cloud_name,
                "api_key" => $myKey,
                "api_secret" => $secret
            ));
    
            try {
                $uploadApi = new UploadApi();
                $upload = $uploadApi->upload($_FILES["file"]["tmp_name"]);
                return $upload['url']; 
            } catch (Exception $e) {
                return "Error uploading file: " . $e->getMessage();
            }
        } else {
            return "No file uploaded"; 
        }
    }
    
    
    
    public function submit(){
        $this->verifyReCaptcha();
    
        if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["description"])){
            $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $email = $_POST["email"];
            $description = $_POST["description"];
    
            if(!Client::verifLastnameAndFirstname($lname) || !Client::verifLastnameAndFirstname($fname) || !Client::verifEmail($email)){
                echo "Lastname, firstname or email isn't valid ";
                exit();
            }

            $newClient = new Client($lname, $fname, $email);
            $newClient->addClient();

            $client_id = $newClient->getIdByEmail();
            if (!$client_id) {
                echo "Client ID not found!";
                exit();
            }

            $newMsg = new Message($client_id, $description, $this->getUrlByFile());
            $newMsg->saveMessage();

            echo "<div class='notification is-primary' id=success-notif>";
            echo "<button class='delete'></button>";
            echo "Message has been sent!";
            echo "</div>";
           
        }
    }
    
}
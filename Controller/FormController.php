<?php
require_once 'Model/Client.php';
require_once 'Model/Message.php';
require_once 'C:\xampp\htdocs\hackers\vendor\google\recaptcha\src\autoload.php';
class formController{

    function formView(){
        $this->verifyReCaptcha();
        require 'View/client/formView.php';
        
    }

    function verifyReCaptcha(){
        if(isset($_POST["ok"])){
                $gRecaptchaResponse = $_POST['g-recaptcha-response'];
                $remoteIp = $_SERVER['REMOTE_ADDR'];

                $recaptcha = new ReCaptcha\ReCaptcha("6LfQ_MEqAAAAAFqpZ_JAxEpEHWnWNOHLqnWIWop7");
                $resp = $recaptcha->setExpectedHostname('localhost')
                                ->verify($gRecaptchaResponse, $remoteIp);

                if ($resp->isSuccess()) {
                    echo "Verified!";
                } else {
                    $errors = $resp->getErrorCodes();
                    var_dump($errors);
                } 
            } 
    }
    function submit(){
        if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["description"])){
            $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $email = $_POST["email"];
            $description = $_POST["description"];

            if(!Client::verifLastnameAndFirstname($lname) && !Client::verifLastnameAndFirstname($fname) && !Client::verifEmail($email)){
                echo "lastname ,firstname or email isn't valid ";
                exit();
            }else{
                $newClient = new Client($lname,$fname,$email);
                $newClient->addClient();
                $client_id = $newClient->getIdByEmail($email);
            }
        }
    }
}
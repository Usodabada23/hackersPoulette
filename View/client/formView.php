<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <script async src="https://www.google.com/recaptcha/api.js" defer></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="./public/js/validation/formValidation.js" defer></script>
    <title>Hackers Poulette</title>
</head>
<body>
<div class="content">
    <h1>Hackers Poulette</h1>
</div>
<form action="" method="POST">
    <div class="field">
        <label class="label">Support Form</label>
        <label class="label">Tell us how we can help.</label>
    </div>
    <div class="field">
        <label class="label">Firstname</label>
        <div class="control">
            <input class="input" type="text" placeholder="e.g Alex" name="firstname">
        </div>
        <label class="label">Lastname</label>
        <div class="control">
            <input class="input" type="text" placeholder="e.g Smith" name="lastname">
        </div>
    </div>
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="email" placeholder="e.g. alexsmith@gmail.com" name="email">
        </div>
    </div>
    <div class="field">
        <label class="label">More details ?</label>
        <textarea class="textarea is-info" placeholder="Feel free to share all relevant details." name="description"></textarea>
    </div>
    <div class="file is-info has-name">
    <label class="file-label">
        <input class="file-input" type="file" name="resume" />
        <span class="file-cta">
        <span class="file-label">Info file… </span>
        </span>
        <span class="file-name" id="span-filename">(JPG, PNG, GIF)</span>
    </label>
    </div>
    <div class="field">
        <div class="g-recaptcha" data-sitekey="6LfQ_MEqAAAAAPY6ybefh0PZFIKaAuLToEcuZ539"></div>
    </div>
    <div class="field is-grouped">
        <div class="control">
            <input type="submit" class="button is-link" name="ok" value="Submit" />
        </div>
        <div class="control">
            <button class="button is-link is-light" id="cancel">Cancel</button>
        </div>
    </div>
</form>
</body>
</html>

<?php
require_once __DIR__ . '/../../vendor/autoload.php';

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
verifyReCaptcha();


?>

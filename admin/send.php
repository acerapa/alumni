<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require __DIR__ . '../vendor/autoload.php';

use Twilio\Rest\Client; 

$sid   = "AC03710a159331d64e256cfe8f51fe140c";
$token  = "98779e1b5456a913fd27ff0175ab2e74";
$sendto = "+639810095685";
// $sendto = "+639396917102";
$auth = "+12054486258";

$twilio = new Client($sid, $token); 

// echo var_dump($_POST);

if(isset($_POST['submit'])) {  
        $message = $twilio->messages 
        ->create($sendto,// to 
                array(        
                    "body" => $_POST['message'],
                    "from" => $auth, 
                ) 
        );

      //  print($message->sid);
//      require_once('send1.php');
      header('Location: index.php?page=home');
}

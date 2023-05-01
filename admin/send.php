<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require __DIR__ . '../vendor/autoload.php';

use Twilio\Rest\Client; 

$sid   = "AC03710a159331d64e256cfe8f51fe140c";
$token  = "0dfa86344fbe05a3032145e7608c1e3e";
$sendto = "+639810095685";
$auth = "+12054486258";

$twilio = new Client($sid, $token); 

if(isset($_POST['submit'])) {  
        $message = $twilio->messages 
        ->create($sendto,// to 
                array(        
                    "body" => "Hi Graduates",
                    "from" => $auth, 
                ) 
        ); 

      //  print($message->sid);
     require_once('send1.php');
      header('Location: index.php?page=home');
}


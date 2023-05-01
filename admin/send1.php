<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require __DIR__ . '../vendor/autoload.php';

use Twilio\Rest\Client; 

$sid    = "AC30a71f382cef1df3dbf5a3c6dbf4dd6a";
$token  = "136fb42f8ff081a2e02b1f0eff80a57d";
$sendto = "+639478415879";
$auth = "+18452528119";

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
}



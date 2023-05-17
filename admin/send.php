<?php 
include('db_connect.php');
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
      /**
       * This code should be used if the client use a paid account.
       */

      // ======================================================================
      // if ($_POST['batch']) {
      //       $query = "SELECT contact FROM users WHERE course LIKE ". $_POST['batch'].";";
      //       $result = mysqli_query($conn, $query);
      //       $data = $result->fetch_all(MYSQLI_NUM);
      // } else {
      //       $query = "SELECT contact FROM users ;";
      //       $result = mysqli_query($conn, $query);
      //       $data = $result->fetch_all(MYSQLI_NUM);
      // }

      // if (count($data)) {
      //       foreach ($data as $contact) {
      //             $message = $twilio->messages 
      //                   ->create($contact,// to 
      //                         array(        
      //                               "body" => $_POST['message'],
      //                               "from" => $auth, 
      //                         ) 
      //                   );           
      //       }
      // }
      // =======================================================================

        $message = $twilio->messages 
        ->create($sendto,// to 
                array(        
                    "body" => $_POST['message'],
                    "from" => $auth, 
                ) 
        );
      header('Location: index.php?page=home');
}

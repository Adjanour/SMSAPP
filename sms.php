<?php
require_once("include/dbconn.php");


if (isset($_POST['Send'])) {
    $PhoneNumber = ($_POST['phone_number']);
    $Message =  $_POST['message'];
    $Sender = "SalemInc.";
}
date_default_timezone_set('Africa/Accra');
$currentTime = time();
$messageDate = date('Y-m-d H:i:s', $currentTime);

$sql = 'CALL update_message_counts(?)';
$stmt = mysqli_prepare($ConnStrx, $sql);
mysqli_stmt_bind_param($stmt,'s', $messageDate);
mysqli_stmt_execute($stmt);

// $auth = new BasicAuth("kcaliqtv", "rmiumzxp");
// // instance of ApiHost
// $apiHost = new ApiHost($auth);
// // instance of AccountApi
// $accountApi = new AccountApi($apiHost);
// // Get the account profile
// // Let us try to send some message
// $messagingApi = new MessagingApi($apiHost);
// try {
//     // Send a quick message
//     $messageResponse = $messagingApi->sendQuickMessage("SalemInc.", "$PhoneNumber", "$Message");

//     if ($messageResponse instanceof MessageResponse) {
//         echo $messageResponse->getStatus();
//     } elseif ($messageResponse instanceof HttpResponse) {
//         echo "\nServer Response Status : " . $messageResponse->getStatus();
//     }
// } catch (Exception $ex) {
//     echo $ex->getTraceAsString();
// }



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://devp-sms03726-api.hubtel.com/v1/messages/send?" . http_build_query($query),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
  echo "cURL Error #:" . $error;
} else {
  echo $response;
}
if ($response)
{
    header("location:dashboard.php");
}

$sql = "INSERT INTO messages (reciever, sender, body, status) VALUES ('$PhoneNumber', '$Sender', '$Message', 'sent')";
mysqli_query($ConnStrx,$sql);

if (mysqli_affected_rows($ConnStrx) > 0) {
    echo "Message inserted successfully";
} else {
    echo "Error inserting message: " . mysqli_error($ConnStrx);
}

?>

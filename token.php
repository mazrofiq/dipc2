<?php
include 'Utils.php';
    // $notificationHeader = getallheaders();
    // $notificationBody = file_get_contents('php://input');
    // $bodynotif = json_decode($notificationBody, true);
    // $vanum = $bodynotif['virtual_account_info']['virtual_account_number'];
$dateTime = gmdate("Y-m-d H:i:s");
$isoDateTime = date(DATE_ISO8601, strtotime($dateTime));
$dateTimeFinal = substr($isoDateTime, 0, 19) . "Z";
$clientId = "BRN-0225-1714113997400";

// $dataSign = $clientId."|".$dateTimeFinal;
// signatureToken($dataSign);

    $Body = array(
        'responseCode' => '2007300',
        'responseMessage' => 'Successful',
        'accessToken' => token(),
        'tokenType' => 'Bearer',
        'expiresIn' => 900
    );
    
    
    
    header("X-CLIENT-KEY:". $clientId );
    header("X-TIMESTAMP:".$dateTimeFinal );
    echo json_encode($Body);
?>
<?php
    $notificationHeader = getallheaders();
    $notificationBody = file_get_contents('php://input');
    $notificationPath = '/dipc2/notifyv2.php'; // Adjust according to your notification path
    $secretKey = 'SK-r6gc3JZOyf6g9INSIMe4'; // Adjust according to your secret key

    $bodyReq = hash('sha256', json_encode($notificationBody,JSON_UNESCAPED_SLASHES));
    $data = "POST".":".$notificationPath.":".$notificationHeader['Authorization'].":".strtolower($bodyReq).":".$notificationHeader['X-TIMESTAMP'];
    $signature = base64_encode(hash_hmac('sha512', $data, $secretKey, true)); 
    //echo $finalSignature;

    if ($signature == $notificationHeader['X-SIGNATURE']) {
        // TODO: Process if Signature is Valid
        echo "Valid";
        

        // TODO: Do update the transaction status based on the `transaction.status`
    } else {
        // TODO: Response with 400 errors for Invalid Signature
        echo " Invalid";
    }

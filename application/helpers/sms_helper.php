<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function send_sms($mobilenumber,$textmessage){
    /*$authKey = "2015ACzPY9MhK579dcc6e";
    $mobileNumber = $mobilenumber;
    $senderId = "SAKAPP";
    $message = urlencode($textmessage);
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="http://bulksms.iclauncher.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //get response
    $output = curl_exec($ch);
    //Print error if any
    if(curl_errno($ch))
    {
        return false;
        //echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    //echo $output;
    */
    return true;
}
?>
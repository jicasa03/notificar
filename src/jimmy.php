<?php
require __DIR__ . '/../vendor/autoload.php';
use Minishlink\WebPush\WebPush;

// here I'll get the subscription endpoint in the POST parameters
// but in reality, you'll get this information in your database
// because you already stored it (cf. push_subscription.php)
$subscription = json_decode(file_get_contents('php://input'), true);
print_r($subscription);
$auth = array(
    'VAPID' => array(
        'subject' => 'https://github.com/Minishlink/web-push-php-example/',
        'publicKey' => 'BCmti7ScwxxVAlB7WAyxoOXtV7J8vVCXwEDIFXjKvD-ma-yJx_eHJLdADyyzzTKRGb395bSAtxlh4wuDycO3Ih4',
        'privateKey' => 'HJweeF64L35gw5YLECa-K7hwp3LLfcKtpdRNK8C_fPQ', // in the real world, this would be in a secret file
    ),
);

$webPush = new WebPush($auth);

$res = $webPush->sendNotification(
    "https://fcm.googleapis.com/fcm/send/fA0gTBMDYz8:APA91bHyBuWyRKeWSizVKU8q0wG60MTnSAncYlwpeRx7gqB_tVS0TM9pqSl6hy_pywPhfBRqz_V5pUAQMXf3bVx7ivxkVQ-wU-71mq3S9LVxE9dmVPqDVvWXIVF00c6_eJzF6ko6LoG9",
    "jimmy carbajal sanhcez",
    "BMyrZGxChaOQCOeKovkG762/OO0L/2+N9pZTxKeP6960lexopmv4RfM8z27Uht2vGFab/xun4TQtusAs/iTZx30=",
    "GyuTWRYDdlKVOzDYnr+7EQ==",
    true
);
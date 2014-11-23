<?php

require "../mpgClasses.php";

/******************************* Request Variables ********************************/

$store_id="store5";
$api_token="yesguy";


/*************************** Transaction Associative Array ************************/

$txnArray=array('type'=>'reauth',
         'order_id'=>'ord-'.date("dmy-G:i:s"),
         'cust_id'=>'my cust id',
         'amount'=>'1.00',
         'orig_order_id'=>'original_order_id',
         'txn_number'=>'123_45_6',
         'crypt_type'=>'7',
         'dynamic_descriptor'=>'123456'
           );


/****************************** Transaction Object *******************************/

$mpgTxn = new mpgTransaction($txnArray);

/******************************* Request Object **********************************/

$mpgRequest = new mpgRequest($mpgTxn);

/****************************** HTTPS Post Object *******************************/

$mpgHttpPost  =new mpgHttpsPost($store_id,$api_token,$mpgRequest);


/************************************* Response *********************************/

$mpgResponse=$mpgHttpPost->getMpgResponse();


print("\nCardType = " . $mpgResponse->getCardType()."<br>");
print("\nTransAmount = " . $mpgResponse->getTransAmount()."<br>");
print("\nTxnNumber = " . $mpgResponse->getTxnNumber()."<br>");
print("\nReceiptId = " . $mpgResponse->getReceiptId()."<br>");
print("\nTransType = " . $mpgResponse->getTransType()."<br>");
print("\nReferenceNum = " . $mpgResponse->getReferenceNum()."<br>");
print("\nResponseCode = " . $mpgResponse->getResponseCode()."<br>");
print("\nISO = " . $mpgResponse->getISO()."<br>");
print("\nMessage = " . $mpgResponse->getMessage()."<br>");
print("\nIsVisaDebit = " . $mpgResponse->getIsVisaDebit()."<br>");
print("\nAuthCode = " . $mpgResponse->getAuthCode()."<br>");
print("\nComplete = " . $mpgResponse->getComplete()."<br>");
print("\nTransDate = " . $mpgResponse->getTransDate()."<br>");
print("\nTransTime = " . $mpgResponse->getTransTime()."<br>");
print("\nTicket = " . $mpgResponse->getTicket()."<br>");
print("\nTimedOut = " . $mpgResponse->getTimedOut()."<br>");


?>


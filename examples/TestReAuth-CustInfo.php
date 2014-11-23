<?php

require "../mpgClasses.php";

/******************************* Request Variables ********************************/

$store_id="store5";
$api_token="yesguy";

/******************* Customer Information Variables ********************/

$first_name = 'Cedric';
$last_name = 'Benson';
$company_name = 'Chicago Bears';
$address = '334 Michigan Ave';
$city = 'Chicago';
$province = 'Illinois';
$postal_code = 'M1M1M1';
$country = 'United States';
$phone_number = '453-989-9876';
$fax = '453-989-9877';
$tax1 = '1.01';
$tax2 = '1.02';
$tax3 = '1.03';
$shipping_cost = '9.95';
$email ='Joe@widgets.com';
$instructions ="Make it fast";

/*********************** Line Item Variables **************************/

$item_name[0] = 'Guy Lafleur Retro Jersey';
$item_quantity[0] = '1';
$item_product_code[0] = 'JRSCDA344';
$item_extended_amount[0] = '129.99';

$item_name[1] = 'Patrick Roy Signed Koho Stick';
$item_quantity[1] = '1';
$item_product_code[1] = 'JPREEA344';
$item_extended_amount[1] = '59.99';

/******************** Customer Information Object *********************/

$mpgCustInfo = new mpgCustInfo();

/********************** Set Customer Information **********************/

$billing = array(
				 'first_name' => $first_name,
                 'last_name' => $last_name,
                 'company_name' => $company_name,
                 'address' => $address,
                 'city' => $city,
                 'province' => $province,
                 'postal_code' => $postal_code,
                 'country' => $country,
                 'phone_number' => $phone_number,
                 'fax' => $fax,
                 'tax1' => $tax1,
                 'tax2' => $tax2,
                 'tax3' => $tax3,
                 'shipping_cost' => $shipping_cost
                 );

$mpgCustInfo->setBilling($billing);

$shipping = array(
				 'first_name' => $first_name,
                 'last_name' => $last_name,
                 'company_name' => $company_name,
                 'address' => $address,
                 'city' => $city,
                 'province' => $province,
                 'postal_code' => $postal_code,
                 'country' => $country,
                 'phone_number' => $phone_number,
                 'fax' => $fax,
                 'tax1' => $tax1,
                 'tax2' => $tax2,
                 'tax3' => $tax3,
                 'shipping_cost' => $shipping_cost
                 );

$mpgCustInfo->setShipping($shipping);

$mpgCustInfo->setEmail($email);
$mpgCustInfo->setInstructions($instructions);

/*********************** Set Line Item Information *********************/

$item[0] = array(
			   'name'=>$item_name[0],
               'quantity'=>$item_quantity[0],
               'product_code'=>$item_product_code[0],
               'extended_amount'=>$item_extended_amount[0]
               );

$item[1] = array(
			   'name'=>$item_name[1],
               'quantity'=>$item_quantity[1],
               'product_code'=>$item_product_code[1],
               'extended_amount'=>$item_extended_amount[1]
               );

$mpgCustInfo->setItems($item[0]);
$mpgCustInfo->setItems($item[1]);


/*************************** Transaction Associative Array ************************/

$txnArray=array('type'=>'reauth',
         'order_id'=>'ord-'.date("dmy-G:i:s"),
         'cust_id'=>'my cust id',
         'amount'=>'1.00',
         'orig_order_id'=>'original_order_id',
         'txn_number'=>'123_45_6',
         'crypt_type'=>'7'
           );



/****************************** Transaction Object *******************************/

$mpgTxn = new mpgTransaction($txnArray);

/******************** Set Customer Information ************************/

$mpgTxn->setCustInfo($mpgCustInfo);

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


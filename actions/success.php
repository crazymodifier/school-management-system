<?php

include ('../includes/config.php');
include ('../includes/functions.php');

session_start();
//require('config.php');
// extract($_REQUEST);
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$month=$_POST["udf1"];
$salt="";


$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
$title = '';
$date = date('Y-m-d');

$query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `type`, `publish_date`, `status`, `author`) VALUES ('$title', 'payment','$date','$status', ''$user_id)");

if($query){
    $item_id = mysqli_insert_id($db_conn);
}

$payment_data = array(
    'txn_id' => $txnid,
    'amount' => $amount,
    'firstname' => $firstname,
    'productinfo' => $productinfo,
    'status' => $status
);

foreach($payment_data as $key => $value){
    mysqli_query($db_conn, "UPDATE `metadata` (`item_id`, `meta_key`, `meta_value`) VALUE ('$item_id', '$key', '$value')");
}

$old_months = get_usermeta();
if($old_months){
    $old_months[] = 
    mysqli_query($db_conn, "UPDATE `metadata` (`item_id`, `meta_key`, `meta_value`) VALUE ('$item_id', 'months',)");
}
else{

    $months = serialize(array($months));
    mysqli_query($db_conn, "INSERT INTO `usermeta` (`user_id`, `meta_key`, `meta_value`) VALUE ('$item_id', 'months',$months)");
}


if (isset($_POST["additionalCharges"])) 
{
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       
	  
	  // echo $status." ".$txnid;
		if ($status == "success" && $txnid!="") 
		{
		$msg = "Transaction completed successfully";	
		}
	     else 
		   {
           $msg = "Invalid Transaction. Please Try Again";
		   }
?>	
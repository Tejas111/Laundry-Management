<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
    $invoiceid = $_GET["invoiceid"];
	$status = $_GET["status"];
	$email = mysql_fetch_assoc(mysql_query("SELECT email from clients where id in (SELECT client_id from job_order where id='$invoiceid')"));
	echo $email[0];
	// $email=mysql_query("SELECT email from clients where id='$cid'");
    mysql_query('UPDATE job_order SET delivery_status='.$status.' WHERE id="'.$invoiceid.'"');
    $joborderrow = mysql_fetch_array(mysql_query("SELECT * FROM job_order WHERE id='$invoiceid'"));
    $usermobilecol = mysql_fetch_array(mysql_query("SELECT a.mobile_no FROM appusers a, job_order j WHERE a.id=j.user_id and j.id='$invoiceid'"));
	$clientnamerow = mysql_fetch_array(mysql_query("SELECT c.fullname FROM clients c, job_order j WHERE c.id=j.client_id and j.id='$invoiceid'"));
	$orderdetails = mysql_query("SELECT * FROM order_details WHERE job_order_id='$invoiceid'");
	$usermobileno = $usermobilecol[0];
	$clientname = $clientnamerow[0];
	$status = $joborderrow[7];
           $output .= "<div>";
           $output .= ' <h5 style="text-align:center">Cash Bill</h5>';
           $output .=    '<h3 style="text-align:center;font-weight:bold"> LAUNDRY POINT</h3>';
           $output .=  '<h5 style="text-align:center">Mobile:' .$usermobileno.'<h5>';
                  $output.= '<span style="float:left;">Invoice Id:'. $invoiceid.'</span>';
                 
                  $output.=  '<span style="float:right;">Delivery Date:'. $joborderrow[4].'</span>';
                  $output.= '<br>';
                  $output.= '<span style="float:left;">Name : '.$clientname.'</span>';
                  $output.=  '<span style="float:right;">Date:'.$joborderrow[3].'</span>';
                  $output.= '<br>';
                  $output.=
                  '<table border="1">
                  <col width="10%">
                  <col width="40%">
                  <col width="10%">
                  <col width="20%">
                  <col width="20%">
				<thead>  
					<tr>  
						<th>Sl No.</th>  
						<th>Cloth Type</th>  
						<th>Quantity</th>  
						<th>Amount</th>
                        <th>Laundry/Dry Clean</th>   
					</tr>  
				</thead>  
                <tfoot>';
                $i=0;
					   while ($row = mysql_fetch_array($orderdetails)) {
						   $i++;
                           $output.= 
                            '<tr>';
						    $output.= '<td>'.$i.'</td>';
                            $output.= '<td>'.$row[1].'</td>';
                            $output.=  '<td>'.$row[2].'</td>';
                            $output.= '<td>'.$row[3].'</td>';
						  if($row[4] == 0)
						    $output.='<td>Laundry</td>'; 
						  else
						     $output.='<td>Dry Clean</td>'; 
						  $output.= '</tr>';	 
                       }
                    $output.=
   					 '<tr>';
                        $output.=    '<td></td>';
                        $output.=  '<td>Total</td>';
                        $output .= 
						   '<td>'.$joborderrow[5].'</td>';
                           $output.=   '<td>'.$joborderrow[6].'</td>';
						   $output.= 
                           '<td></td>
   					 </tr>
  				</tfoot>
				<tbody>';
					
                    $output.=
                '</tbody>
                  </table>
                  </div>';

	if($status==0){
		$mailMsg = "Your Order is being processed";
	}
	else if($status == 1){
		$mailMsg="Your Order is ready to be delivered";
	}
	else{
		$mailMsg=$output;
	}
	
	$mailto = $email['email'];
	echo $email;
    $mailSub = "DETERGE";
    // $mailMsg = $_POST['mail_msg'];
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "";
   $mail ->Password = "";
   $mail ->SetFrom("");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);
//    $mail->Send();

if($mail->Send())
   {
	//    echo "Mail Not Sent";
	header('Location: showinvoice.php?invoiceid='.$invoiceid);

   }
   else
   {
       echo "Mailnot Sent";
   }
   

?>
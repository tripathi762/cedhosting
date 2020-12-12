<?php 
require_once('header.php');
require_once('class/user.php');
require_once('class/dbcon.php');
$obj= new DB();
$obj2=new User();
 $m=$_SESSION['email'];

if (isset($_POST['submit'])){


    $name=isset($_POST['otp'])?$_POST['otp']:'';
    if($name!=$_SESSION['otp']){
        echo "<script>alert('Email-verify unsuccessfull please do again');
        window.location.href='verification2.php';</script>";
    }
    else{
      $obj2->verify2($name,$m,$obj->conn);
    }
   
}

if (isset($_POST['submitt'])){
$otp = rand(1000,9999);
$_SESSION['otp']=$otp;
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => 'Your Otp is'.$otp,
    "language" => "english",
    "route" => "p",
    "numbers" => $_SESSION['phone'],
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization:12ipLshQWJV8gIqzklHye65jSODYbZwEafnxXNGvUKFC93MAcu81sAxhFSHk3pmZrbTeJn2Y6aMRcK0X",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
?>

<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span> Name=<label><?php echo $_SESSION['name'] ?></label></span>
</div>
					 <div>
						<span>Phone No.=<label><?php echo $_SESSION['phone'] ?></label></span>
					
					 </div>
					 <div>
						 <span>Email Address=<label><?php echo $_SESSION['email'] ?></label></span>
						
					 </div>

					 <div>
					 	 <span>Security Question=<label><?php echo $_SESSION['ques'] ?></label></span>
				
					 </div>
					 <div>
						 <span>Answer-<label><?php echo $_SESSION['ans'] ?></label></span>

					 </div>
					 <div class="clearfix"> </div>
					   
				     
				
				<div class="clearfix"> </div>
                <div class="register-top-grid">
                    <h3>Enter Your Otp</h3>
                  <div>
						<span>OTP<label>*</label></span>
                        <input type="text" name="otp" >
                        <div class="register-but">
                       <input type="submit" value="submit" name="submit" class="a" >
                      <input type="submit" value="Send OTP" name="submitt" class="a a1" >
                      <input type="submit" value="Re-Send OTP" name="submitt" class="a a1" >
</div>
</div>
</form>
			
				</div>
		   </div>
		 </div>
	</div>
  <style>
        .a1{
            border:1px solid black;
            margin-top:10px;
        }
        .a{
          border:1px solid black; 
        }
       
        </style>
				
<?php 
require_once 'footer.php';
?>
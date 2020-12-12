
<?php 


require_once('header.php');
require_once('class/user.php');
require_once('class/dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';
$obj= new DB();
$obj2=new User();
if (isset($_POST['submitt'])){
$otp = rand(1000,9999);
$_SESSION['otp']=$otp;
$mail = new PHPMailer();

try {                                       
         $mail->isSMTP(true);                                             
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'tripathiashutosh762@gmail.com';                  
        $mail->Password   = 'ashutosh_12345';                         
        $mail->SMTPSecure = 'tls';                               
        $mail->Port       = 587;   
      
        $mail->setfrom('tripathiashutosh762@gmail.com', 'CedHosting');            
        $mail->addAddress($_SESSION['email']); 
        $mail->addAddress($_SESSION['email'], $_SESSION['name']); 
           
        $mail->isHTML(true);                                   
        $mail->Subject = 'Account Verification'; 
        $mail->Body    = 'Hi User,Here is your otp for account verification-'.$otp; 
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        // header('location: verification.php?email=' . $email);
    } 
    catch (Exception $e)
     {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}
if (isset($_POST['submit'])){
  
    $m=$_SESSION['email'];

    $name=isset($_POST['otp'])?$_POST['otp']:'';
    if($name!=$_SESSION['otp']){
        echo "<script>alert('Email-verify unsuccessfull please do again');
        window.location.href='verification.php';</script>";
    }
    $obj2->verify($name,$m,$obj->conn);
  
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
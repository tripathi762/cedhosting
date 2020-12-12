<?php 
require_once 'header.php';
$email2=$_SESSION['email'];
?>
	<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form> 
				 <div class="register-top-grid">
 <div class="register-bottom-grid">
						    <h3>Verified by email</h3>
                            <div>
                                <span><?php echo $_SESSION['email'] ?><label>*</label></span>
                                <?php 
                                echo '<a href="verification.php?email="'.$_SESSION['email'].'">Verify By Email</a>';
                                ?>
							
                             </div>
                            
</div>
<div class="register-bottom-grid">
<h3>Verified by phone</h3>
							 <div >
								<span><?php echo $_SESSION['phone'] ?><label>*</label></span>
                                <a href="verification2.php">Verify By Phone</a>
							 </div>
</form>
				</div>
		   </div>
		 </div>
	</div>
<?php 
require_once 'footer.php';

?>
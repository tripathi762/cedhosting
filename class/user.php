<?php
if(!isset($_SESSION)){
    session_start();
}


require_once('dbcon.php');

class User{
    public$name,$phone,$ques,$ans,$userpassword,$email, $userpassword2,$conn;
    
    function entry($name,$phone,$ques,$ans,$userpassword,$email,$userpassword2,$conn){

        $count=0;
        if ($userpassword != $userpassword2) {
            echo "<script>alert('Your Password and Repassword should be same');
            </script>";
            $count++;
        }
        if($name=='admin'){
            echo "<script>alert('this Name is reserve please go for another one');
            </script>";
            $count++;
        }
        if($name!='admin'){
            $sql="SELECT * FROM `tbl_user` WHERE `email`='".$email."'";
            $result=$conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<script>alert('Email already exists');
                </script>";
                $count++;
            }
        }  

        if ($count==0) {

           $sql="INSERT INTO `tbl_user` ( `email`, `name`, `mobile`, `password`, `security_question`, `security_answer`,`is_admin`)
           VALUES ( '".$email."', '".$name."', '".$phone."','".md5($userpassword)."', '".$ques."', '".$ans."',0);"; 


           if ($conn->query($sql)===true) {
            echo "<script>alert('signed in successfully');
            window.location.href='account2.php';</script>";

                        // header("Location: login.php");
        } 

        else {
                        // echo "<center><h3 style='color:white; font-size:1.2em;'> record not created </h3></center>";
            echo "<script>alert('Error');
            </script>";
        }

    }
} 

function admit($email,$password,$conn){
    $count=0;

    if ($count==0) {

     $sql1="SELECT * from tbl_user WHERE `email`='".$email."'
     AND password='".md5($password)."'";

     $result=$conn->query($sql1);

     if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            $_SESSION['userdata']=array("name"=>$row['name'],
                "user_id"=>$row['id']);

            if ($row['is_admin']==0) {
             if($row['active']==0){

                echo "<script>alert('Account not approve yet please wait for  admin approval');<script>";
            } 
            else{
                echo "<script>alert('logged in successfully');
                window.location.href='index.php';</script>";
            }
        }

            else if($row['is_admin']==1){
                echo "<script>alert('logged in successfully');
                window.location.href='admin/admin.php';</script>";
            } 

    }    
}

                    // else {
                    //   $count++;
                    //   echo "<center><h3 style='color:white; font-size:1.2em;'>Invalid Login credentials</h3></center>";
                    // }

}

}
function verify($name,$m,$conn){


    $sql="UPDATE tbl_user SET `email_approved`='1' , `active`='1' 
    WHERE `email`='".$m."'";
    echo $sql;
    $result=$conn->query($sql);
    echo "<script>alert('Email-verify successfully please login');
    window.location.href='login.php';</script>";

}
function verify2($name,$m,$conn){
    $sql="UPDATE tbl_user SET `phone_approved`='1' , `active`='1' 
    WHERE `email`='".$m."'";
    echo $sql;
    $result=$conn->query($sql);
    echo "<script>alert('phone-verify successfully please login');
    window.location.href='login.php';</script>";

}

}

<?php 
require_once('../class/product.php');
require_once('../class/dbcon.php');
$obj= new DB();
$obj2=new Product();
if(isset($_GET['id'])){
    $m=$_GET['id'];
   
    $obj2->cat_del($m,$obj->conn);
}
if(isset($_GET['eid'])){
    $m=$_GET['eid'];
    $obj2->cat_edit($m,$obj->conn);
}


?>
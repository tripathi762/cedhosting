<?php 
require_once('header.php');
require_once('../class/product.php');
require_once('../class/dbcon.php');
$obj= new DB();
$obj2=new Product();
if (isset($_POST['submit']))
 {
    $id=isset($_POST['id'])?$_POST['id']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $link=isset($_POST['link'])?$_POST['link']:'';
    
    $obj2->cat($id,$name,$link,$obj->conn);

}
if (isset($_POST['submitt']))
 {
    $id=isset($_POST['id'])?$_POST['id']:'';
    $parentid=isset($_POST['parent-id'])?$_POST['parent-id']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $link=isset($_POST['link'])?$_POST['link']:'';
    $avb=isset($_POST['avb'])?$_POST['avb']:'';
    $obj2->cat_edit($id,$parentid,$name,$link,$avb,$obj->conn);

}

?>

<div class="contaner">
<form  method="POST"><center>
<h4 class="h4">Create Category</h4>
<div class="form-control m-2">
    Product-parent-id :<input type ="text" name="id" class="ll id ml-2">
</div>
<div class="form-control m-2">
    Product-Name:<input type ="text" name="name" class="ll id ml-4">
</div>
<div class="form-control m-2">
    Product-link:<input type ="text" name="link" class="ll id ml-5 ">
</div>

<div class="form-control m-2">
 <input type ="Submit" name="submit" class="submit"></center>
</div>
</form>
<?php 
$back=$obj2->cat_print($obj->conn);
  $a= '<table id="myTable" ><thead><tr><th>Id</th><th>Parent-Id</th><th>Product-Name</th><th>Link</th><th>Is-Avb</th><th>Date</th><th>Action</th></thead></tr><tbody><tr>';
  foreach($back as $val){
    $a.='<td>'.$val['id'].'</td>';
    $a.='<td>'.$val['prod_parent_id'].'</td>';
    $a.='<td>'.$val['prod_name'].'</td>';
    $a.='<td>'.$val['link'].'</td>';
    $a.='<td>'.$val['prod_available'].'</td>';
    $a.='<td>'.$val['prod_launch_date'].'</td>';
    $a.='<td><a href="cat_del.php?id='.$val['id'].'" class="btn btn-default btn-rounded mb-4 sa">Delete</a><a href="cat_del.php?eid='.$val['id'].'" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm'.$val['id'].'">Edit</a></td></tr>';
}
$a.='</tbody></table>';
echo $a;
?>
</div>
<?php 
require_once('footer.php');
?>
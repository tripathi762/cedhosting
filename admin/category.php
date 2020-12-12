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



<div class=container>
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
  $a= '<table id="myTable"><thead><tr><th>Id</th><th>Parent-Id</th><th>Product-Name</th><th>Link</th><th>Is-Avb</th><th>Date</th><th>Action</th></thead></tr><tbody><tr>';
  foreach($back as $val){
    $a.='<td>'.$val['id'].'</td>';
    $a.='<td>'.$val['prod_parent_id'].'</td>';
    $a.='<td>'.$val['prod_name'].'</td>';
    $a.='<td>'.$val['link'].'</td>';
    $a.='<td>'.$val['prod_available'].'</td>';
    $a.='<td>'.$val['prod_launch_date'].'</td>';
    $a.='<td><a href="cat_del.php?id='.$val['id'].'" class="btn btn-default btn-rounded mb-4 sa">Delete</a><a href="cat_del.php?eid='.$val['id'].'" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm'.$val['id'].'">Edit</a></td></tr>';
    $b='
    <div class="modal fade" id="modalLoginForm'.$val['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body mx-3">
      <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type ="hidden" value="'.$val['id'].'" name="id" id="defaultForm-email" class="form-control validate id ml-4" readonly >
       
          <label data-error="wrong" data-success="right" for="defaultForm-email">Id--'.$val['id'].'</label>
        </div>
       <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type ="text" value="'.$val['prod_parent_id'].'" name="parent-id" id="defaultForm-email" class="form-control validate id ml-4 >
       
          <label data-error="wrong" data-success="right" for="defaultForm-email">parent-Id</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$val['prod_name'].'" name="name"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Product-name-name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type ="text" value="'.$val['link'].'" name="link" id="defaultForm-email" class="form-control validate id ml-4">
       
          <label data-error="wrong" data-success="right" for="defaultForm-email">Parent-link</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$val['prod_available'].'" name="avb" id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">  Product-Avaiblable</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
      <input type ="Submit" name="submitt" class="btn btn-default">
      </div>
      </form>
    </div>
  </div>
</div>';
    echo $b;
  }
  $a.='</tbody></table>';
  echo $a;
  
?>
</div>
<style>
.info{
  margin
}
</style>

</div>
<?php 
require_once('footer.php');
?>
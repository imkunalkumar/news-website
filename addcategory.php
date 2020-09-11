<?php 
session_start();
if($_SESSION['email']==true)
{

}else{
  header('location:admin_login.php');
}
$page='category';
include('include/header.php');

?>
<div style="width: 50%; margin-left: 25%; margin-top: 5%">
 
<form action="addcategory.php" method="post" name="form1" onsubmit=" return validate()">
	<h1>Add Categories</h1>
	<hr>
  <div class="form-group">
    <label for="category">Category</label>
    <input type="text" name="cat" class="form-control" placeholder="Enter name of category" id="category"><span id="error"></span>
  </div>
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" name="des" rows="5" id="comment"></textarea>
</div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>
<script>
  function validate()
  {
var x = document.forms['form1']['cat'].value;
var error = document.getElementById("error")
if (x=="") {
  
  error.textContent = "*Category name can't be empty" 
  error.style.color = "red" 
  return false;
  }
}

</script>
	</div>

  <?php 
include('include/footer.php');
?>
<?php
include ('db/connection.php');
if (isset($_POST['submit'])) {
  $category_name=$_POST['cat'];
  $des=$_POST['des'];

//validation
  $check=mysqli_query($conn,"select * from category where category_name='$category_name' ");
if (mysqli_num_rows($check)>0) {
  echo "<script>alert('category name allready present');</script>";
  exit();
}

  $query=mysqli_query($conn,"insert into category(category_name,des) value('$category_name','$des')");
  if ($query) {
    
    echo "<script>alert('category add succesfully');</script>";

  }else{
    echo "<script>alert('category does not add succesfully');</script>";
  }
}


?>
<?php 
session_start();
error_reporting(0);
if($_SESSION['email']==true)
{

}else{
  header('location:admin_login.php');
}
$page='category';
include('include/header.php');

?>
<?php
include('db/connection.php');
$id=$_GET['row'];

$query=mysqli_query($conn,"select * from category where id='$id'");

while ($row=mysqli_fetch_array($query)) {
  $category=$row['category_name'];
  $des=$row['des'];
}
?>
<div style="width: 50%; margin-left: 25%; margin-top: 5%">
 
<form action="edit.php" method="post" name="form1" onsubmit=" return validate()">
	<h1>Update Category</h1>
	<hr>
  <div class="form-group">
    <label for="category">Category</label>
    <input type="text" name="cat" class="form-control" placeholder="Enter name of category" value="<?php echo $category;?>" id="category"><span id="error"></span>
  </div>
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control"  name="des" rows="5" id="comment"><?php echo $des;?></textarea>
</div>
  <input type="hidden" name="id" value="<?php echo $_GET['row']; ?>;">
  <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
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
  $category=$_POST['cat'];
  $des=$_POST['des'];
  $id=$_POST['id'];
  
  $query1=mysqli_query($conn,"UPDATE category SET category_name='$category',des='$des' where id='$id'");
  if ($query1) {
    echo "<script>alert('category updated');</script>";
    header('location:category.php');
  }else{
    echo "<script>alert('category does not updated');</script>";
  }
}


?>
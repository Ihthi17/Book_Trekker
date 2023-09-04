<?php
//session_start();
include 'config.php';
?>


<?php
//categories start

if (isset($_POST['categories'])) 
{
  $categories=$_POST['categories'];
      $sql="INSERT INTO categories(`categories`)VALUES('$categories')";
        //print_r($sql);
      if($con->query($sql)==TRUE)
      {
      
        echo "Category stored successfully";
      
      
      }
      else {
        echo "<script type='text/javascript'>alert('error');</script>";
        echo  "Error: " . $sql . "<br>" . mysqli_error($con);
      }
}
    
    
  


//categories end

//insert book query start
if (isset($_FILES['file']) && isset($_POST['bname']) && isset($_POST['description']) && isset($_POST['keyword']) && isset($_POST['price']) && isset($_POST['author'])&& isset($_POST['publisher'])&& isset($_POST['p_date'])&& isset($_POST['category']))
{
  $target_dir="Upload/";
  $target_file=$target_dir.basename($_FILES["file"]["name"]);
 // $image = $_FILES['file']['name'];
  $bname=$_POST['bname'];
  $description= mysqli_real_escape_string($con, $_POST['description']);
  $keyword=$_POST['keyword'];
  $price=$_POST['price'];
  $author=$_POST['author'];
  $publisher=$_POST['publisher'];
  $p_date=$_POST['p_date'];
  $category=$_POST['category'];
  if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
  {
      $sql="INSERT INTO `book`(`b_name`,`description`,`keyword`,`price`,`image`,`author`,`publisher`,`p_date`,`category_id`) VALUES ('$bname','$description','$keyword','$price','$target_file','$author','$publisher','$p_date','$category')";
   //print_r($sql);
      if($con->query($sql)==TRUE)
      {
       
      echo 'Book Successfully Stored';
     
     
    
      }
      else {
          echo "<script type='text/javascript'>alert('error');</script>";
          echo  "Error: " . $sql . "<br>" . mysqli_error($con);
        }
  }
}
?>
<?php




//book delete

  if(isset($_POST['deletesend']))
  {
    $uniqu=$_POST['deletesend'];
   // print_r($uniqu);
    $sql="DELETE FROM `book` WHERE b_id=$uniqu ";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      echo "Book Deleted Successfully";
    }
  }
  
 //update book
 if(isset($_POST['b_id'])) 
  {
  $user_id = $_POST['b_id'];
  $sql = "select * from `book` where  `b_id`='$user_id'";
  $result = mysqli_query($con,$sql);
  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $response = $row;
    if($row['image'] != '') {
      $response['image'] = '<img src="'.$row["image"].'"width="100" height="100"/>';
      $response['hidden_user_image'] = $row['image'];
  } else {
      $response['image'] = '';
      $response['hidden_user_image'] = '';
  }
  echo json_encode($response);
  }
 
}



  

?>
<?php
if(isset($_POST['book_id']) && isset($_POST['book_name']) && isset($_POST['book_name']) && isset($_POST['description']) && isset($_POST['keyword']) && isset($_POST['price']) && isset($_POST['author']) && isset($_POST['publisher']) && isset($_POST['p_date']) && isset($_FILES['book_image']) && isset($_POST['book_category'])) 
{
$target_dir = "Upload/";
$target_file = $target_dir . basename($_FILES["book_image"]["name"]);
$Hideen_id = $_POST['book_id'];
$bname = $_POST['book_name'];
$description = mysqli_real_escape_string($con, $_POST['description']);
$keyword = $_POST['keyword'];
$price = $_POST['price'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$p_date = $_POST['p_date'];
$book_category=$_POST['book_category'];
//print_r($description);

if(move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)) {
 $sql = "UPDATE `book` SET `b_name`='$bname',`description`='$description',`keyword`='$keyword',`price`='$price',`image`='$target_file',`author`='$author',`publisher`='$publisher',`p_date`='$p_date',`category_id`='$book_category' WHERE `b_id`='$Hideen_id'";
 //print_r($sql);
 $result =mysqli_query($con,$sql);
 //print_r($result);
 if($result) {
   echo "Data updated Successfully";
 }
 else{
  echo "Error updating record: " . mysqli_error($con);
}
}
}
?>
<?php
//category delete
if(isset($_POST['deletecategory']))
{
  $uniqu=$_POST['deletecategory'];
 // print_r($uniqu);
  $sql="DELETE FROM `categories` WHERE c_id=$uniqu ";
  $result=mysqli_query($con,$sql);
  if($result)
  {
    echo "Category Deleted Successfully";
  }
}
?>


<?php
//category update
if(isset($_POST['updatecid']))
{
    $user_id=$_POST['updatecid'];

    $sql = "select * from `categories` where  `c_id`='$user_id'";
    $result = mysqli_query($con,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="invalid or data not found";
}


// category update query 
if(isset($_POST['hiddendata']))
{
 
    $Hideen_id=$_POST['hiddendata'];
   
    $category=$_POST['category'];
   
   
    $sql = "UPDATE categories SET categories='$category' WHERE c_id='$Hideen_id'";
    //print_r($sql);die();
    $result = mysqli_query($con,$sql);
    if($result)
    {
      echo 'Category Updated Successfully';
    }

}
?>
















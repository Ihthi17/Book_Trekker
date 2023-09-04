<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<style>
   form .error {
  color: #ff0000;
}
</style>
</head>
<body>
  
</body>
</html>

<?php 
include 'config.php';



?>






<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper"> 
   <!-- main content start -->
          
   <div class="container-fluid pt-4 px-4">
              <h1 style="text-align: center;">Book Views</h1>  
<br><br>
<!--session alert start-->

            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Book
</button>

<!-- Modal -->
<div class="modal fade dark " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <!--form start-->
        
      <form class="was-validated" method="post" action="#" id="form" enctype="multipart/form-data">
   <div class="row jumbotron">
    
            <div class="col-sm-12 form-group">
                <label class="text-dark" for="name-f">Book Name</label>
                <input  type="text" class="form-control bg-white text-dark" name="bname" id="bname" placeholder="Enter the book." autocomplete="off" required >
                
            
            </div>
           
            <div class="col-sm-12 form-group">
                <label for="name-f">Description</label>
                <textarea name="description" class="form-control bg-white text-dark"  rows="2" cols="2" required></textarea>
           
            </div>
   
   
            <div class="col-sm-12 form-group">
                <label for="name-f">Keywords</label>
                <textarea name="keyword" class="form-control bg-white text-dark" id="exampleFormControlTextarea1" rows="3" required></textarea>
           
            </div>
           
            <!--category add start-->
            <div class="col-sm-12 form-group">
            <label for="name-f">Book-Category</label>
            <?php
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>

                <select class="form-control " id="category" name="category">
                <option value="" >---</option>
                <?php

    foreach ($result as $categories) {
      
        ?>

                    <option value="<?=$categories['c_id']?>"><?=$categories['categories']?></option>
                   <?php
}
    ?>
                  </select>
                  <?php
}
?>
        </div>
            <!--category add close-->
           
            <div class="col-sm-12 form-group">
                <label for="name-f">Price</label>
                <input type="number" class="form-control bg-white text-dark" name="price"  placeholder="Enter the book." required >
            </div>
           
           
            <div class="col-sm-12 form-group">
                <label for="pass">image</label>
                <input type="file"  name="file" class="form-control bg-white text-dark" id="file" required >
            </div>
           
           
            <div class="col-sm-12 form-group">
                <label for="name-f">Author</label>
                <input type="text" class="form-control bg-white text-dark" name="author"  placeholder="Enter the author name." required >
            </div>
            
           
            <div class="col-sm-12 form-group">
                <label for="name-f">Publisher</label>
                <input type="text" class="form-control bg-white text-dark" name="publisher"  placeholder="Enter the publisher name." required >
            </div>
           
           
            <div class="col-sm-12 form-group">
                <label for="name-f">Publish-Date</label>
                <input type="date" class="form-control bg-white text-dark" name="p_date"  placeholder="Enter the publish date." required >
            </div>
           
   
           
            
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit"   class="btn btn-success" id="add">ADD</button>
        </form>
        <!--form close-->
      </div>
      
    </div>
  </div>
</div>
            </div>
            <!-- form end -->
<br><br><br>
<!--update model form start-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Book update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <!-- Form -->
      <input type="hidden" class="form-control"   id="b_id"  >
      <div class=" form-group mb-3 mx-3 ">
    <label for="Name"class="form-label">Book Name</label>
    <input type="text" name="bname" class="form-control bname" id="book_name">
  </div>
      <div class="form-group mb-3 mx-3">
    <label for="description"class="form-label">Description</label>
    <textarea name="description"  class="form-control bg-white text-dark form-control form no-resize " id="description" rows="3" cols="3"></textarea>
  </div>
      <div class="form-group mb-3 mx-3">
    <label for="Mobile"class="form-label">Keyword</label>
    <textarea name="keyword" class="form-control bg-white text-dark" id="keyword" rows="3"></textarea>
  </div>
  <!--category add start-->
  <div class="col-sm-12 form-group">
            <label for="name-f">Book-Category</label>
            <?php
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>

                <select class="form-control " id="book_category" name="book_category">
                <option value="" >---</option>
                <?php

    foreach ($result as $categories) {
      
        ?>

                    <option value="<?=$categories['c_id']?>"><?=$categories['categories']?></option>
                   <?php
}
    ?>
                  </select>
                  <?php
}
?>
        </div>
            <!--category add close-->
      <div class="form-group mb-3 mx-3">
    <label for="Course"class="form-label">Price</label>
    <input type="number" class="form-control"  id="price">
  </div>
  <div class="form-group mb-3 mx-3">
    <label for="Course"class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="book_image"  >
    <span id="image"></span>
  </div>
  <div class="form-group mb-3 mx-3">
    <label for="Course"class="form-label">Author</label>
    <input type="text" name="author" class="form-control"  id="author" >
  </div>
  <div class="form-group mb-3 mx-3">
    <label for="Course"class="form-label">Publisher</label>
    <input type="text" name="publisher" class="form-control"  id="publisher" >
  </div>
  <div class="form-group mb-3 mx-3">
    <label for="Course"class="form-label">Publish-Date</label>
    <input type="date" name="p_date" class="form-control"  id="p_date" >
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       <!-- <input type="hidden" name="hiddendata" id="hiddendata">-->
        <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
      </div>
    </div>
  </div>
</div>

<!--update model form end-->

<!--data table start-->

<div id="displayDataTable" class="table table-responsive"></div>
<!--data table start-->
            
        </div>
        <div id="editor"></div>
        <!-- main content End -->


        <!-- Back to Top -->
    </div>
  
  </div>
  
  <script>
       $(document).ready(function(){
      
        //displayData();
        $("#form").on('submit',function(e){
          e.preventDefault();
           // $("#example").load()
          var formData = new FormData(this);
               
                $.ajax({
                type:"post",
                url:"function.php",
                data:formData,
                contentType: false,
                cache: false,
                processData:false,
                success:function(status,data){
                // console.log("data");
                    alertify.set('notifier','position', 'top-center');
                    alertify.success(status);
                  $('#exampleModal').modal('hide');
                 $("#form")[0].reset();
                 displayData();
                
                // displayData();
                   
                }


            })
        })
            
          
        
    })
      $(document).ready(function(){
        displayData();
      })  
    function displayData()
    {
        var displayData='true';
        $.ajax({
            url:'view.php',
            type:'post',
            data:{
                displaySend:displayData,
            },
            success:function(data,status)
            {
                   $('#displayDataTable').html(data);
                 // console.log(data);
            }
        });
       // displayData();
    }
    </script>
    
    <script>
    function deleteBook(deleteid)
    {
      if(confirm('Are you sure to delete this record ?'))
      {
        $.ajax({
        url:"function.php",
        type:"post",
        data:{deletesend:deleteid},
        success:function(data,status)
        {

          alertify.set('notifier','position', 'top-center');
         
                    alertify.success(data);
                    

          displayData();
        }

      })
      }
     
      // alert(deleteid);
    }
    </script>
   <script>
    //update js
    function Getdetails(b_id)
      {
         //alert(b_id);
           $('#b_id').val('b_id');
           $.post("function.php",{b_id:b_id},function(data,status){
            //console.log(data);
            var book_details=JSON.parse(data);
           // console.log(book_details);
            $('#b_id').val(book_details.b_id);
             $('#book_name').val(book_details.b_name);
            // console.log(book_details.b_name);
             $('#description').val(book_details.description);
             $('#keyword').val(book_details.keyword);
             $('#price').val(book_details.price);
             $('#image').html(book_details.image);
            // console.log(book_details.image);
             $('#author').val(book_details.author);
             $('#publisher').val(book_details.publisher);
             $('#p_date').val(book_details.p_date);
             $('#book_category').val(book_details.category_id);
             //console.log(book_details.category_id);

            
                 
          });
          
         $('#updateModal').modal('show');
      
      }
      function updateDetails(){
  var form_data = new FormData();
  var bname =$('#book_name').val();
  var description =$('#description').val();
  var keyword =$('#keyword').val();
  var price =$('#price').val();
  var image =$('#book_image')[0].files[0];
  var author=$('#author').val();
  var publisher=$('#publisher').val();
  var p_date=$('#p_date').val();
  var book_category=$('#book_category').val();
//console.log(image);
   
  var b_id=$('#b_id').val();
  form_data.append("book_name", bname);
  form_data.append("description", description);
  form_data.append("keyword", keyword);
  form_data.append("price", price);
  form_data.append("book_image", image);
  form_data.append("author",author);
  form_data.append("publisher", publisher);
  form_data.append("p_date", p_date);
  form_data.append("book_category", book_category);
  form_data.append("book_id",b_id);
  //console.log(description);
  $.post({
    url: "function.php",
   
    data: form_data,
    processData: false,
    contentType: false,
   
    success: function(data){
      $('#updateModal').modal('hide'); 
     // console.log(data);
      alertify.set('notifier','position', 'top-center');
         
         alertify.success(data);
       
      displayData();
    }
      
    
  });
}
      

        
   </script>



<?php include('includes/footer.php');?>



 <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 <script src="validate/jquery.validate.js"></script>
 <script src="validate/jquery.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
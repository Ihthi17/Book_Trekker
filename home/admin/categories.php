<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>
<body>
  
</body>
</html>

<?php include 'config.php';?>
<?php include('includes/scripts.php');?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
 <!-- main content start -->
 <div class="container-fluid pt-4 px-4">
            <h1 style="text-align: center;">Categories Views</h1>  
<br><br>
<div class="row">
    <div class="col-md-xs-lg-4">
            <form class="form1" name="form2" action="#"  id="form1">
   <div class="row jumbotron">
            <div class="col-sm-4 form-group">
                <label class="text-dark" for="name-f">Categories</label><br><br>
                <input type="text" class="form-control bg-white text-dark" name="categories" id="categories" autocomplete="off" placeholder="Enter the category." required >
                <br>
                <center><button class="btn btn-info text-white" type="submit"  name="click" id="click">click</button></center>
</form>
    </div>
    <div class="col-md-xs-lg-8">

  <div id="displayCategory" class="table table-responsive"></div>
</div>
</div>
 
            </div>
           
            </div>
            <!-- main content end -->
           <!--update model form start-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Category update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <!-- Form -->
 
      <div class=" form-group mb-3 mx-3 ">
    <label for="Name"class="form-label">Category</label>
    <input type="text" class="form-control" name="category"  id="category" >
  </div>
      
      
      
  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="hiddendata" id="hiddendata">
        <button type="button" class="btn btn-dark" onclick="updateCategory()">Update</button>
      </div>
    </div>
  </div>
</div>

<!--update model form end-->
</div>
<script>
    //fetch data
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
                displayCategory:displayData,
            },
            success:function(data,status)
            {
                   $('#displayCategory').html(data);
                 // console.log(data);
            }
        });
       // displayData();
    }


    </script>
    
    <script>
        //delete data
    function deleteCategory(deleteaid)
    {
      if(confirm('Are you sure to delete this record ?'))
      {
        $.ajax({
        url:"function.php",
        type:"post",
        data:{deletecategory:deleteaid},
        success:function(data,status)
        {
                    //console.log(data);
                alertify.set('notifier','position','top-center');
                    alertify.success(data);
                displayData();
        }

      })
      }
     
      // alert(deleteid);
    }
    </script>

    <script>
        //update  category js
    function GetCategory(updatecid){
          $('#hiddendata').val(updatecid); 
          $.post("function.php",{updatecid:updatecid},function(data,status){
            var userid=JSON.parse(data);
            $('#category').val(userid.categories);
           
            //console.log(data);
          });

          $('#updateModal').modal('show'); 
        }

        // // onclik update event function
        function updateCategory(){
            var category =$('#category').val();
           
            var hiddendata=$('#hiddendata').val();

            $.post("function.php",{
             category:category,
            
              hiddendata:hiddendata
            },function(data,status){
              $('#updateModal').modal('hide'); 
              alertify.set('notifier','position', 'top-center');
              alertify.success(data);
              //console.log(data);
              displayData();
              
            });
         
        }
    </script>

<?php include('includes/footer.php');?>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

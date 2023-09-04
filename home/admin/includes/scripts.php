<script src="./assest/dist/js/style.js"></script>
<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--boostrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>
 <!-- sweet alert JavaScript -->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
 
  <!--validation-->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>


  <script>
    //author form validation and data insert
    $(function() {
        $("#form2").validate({  
  rules: {
           name: 
           {
           required:true,
           
            }, 
       
      
       },
    
  messages: {
           name:
           {
                required: "Enter Valid Name",
                
           },
           
          
       },
       submitHandler: function(form) {
           //form.submit();
           
        
            
               var form=$("#form2");
           $.ajax({
                type:"post",
                url:"function.php",
                data:form.serialize(),
                
                success:function(status,data){
            // console.log(data);
                    alertify.set('notifier','position', 'top-center');
                    alertify.success(status);
                 // alert(status);
                 // $('#exampleModal').modal('hide');
                 $("#form2")[0].reset();
                 displayData();
                   
                },
                error:function(){
                    console.log("Data not insertet");
                    //
                }
            })
           
        }
        })
    })



    
    
    

   
   
   
  
    
  </script>
  <script>
    //category insert
    $(function() {
    // Setup form validation on the #register-form element
   $("#form1").validate({   //#register-form is form id
       // Specify the validation rules
  rules: {
           name: 
           {
           required:true,
          
            }, 
       
        
      
       },
       // Specify the validation error messages
  messages: {
           name:
           {
                required: "Enter Valid Name",
                
           },
           
          
       },
       submitHandler: function(form) {
           //form.submit();
          
           
                var form=$("#form1");
                $.ajax({
                type:"post",
                url:"function.php",
                data:form.serialize(),
                
                success:function(status){
                    alertify.set('notifier','position', 'top-center');
                    alertify.success(status);
            //alert(status);
                 // $('#exampleModal').modal('hide');
                 $("#form1")[0].reset();
                 displayData();
                   
                }
            })
        }
        })
    })

  
    
  </script>

<script>
    //publisher insert and validation
    $(function() {
    // Setup form validation on the #register-form element
   $("#form3").validate({   //#register-form is form id
       // Specify the validation rules
  rules: {
           name: 
           {
           required:true,
          
            }, 
       
        
      
       },
       // Specify the validation error messages
  messages: {
           name:
           {
                required: "Enter Valid Name",
                
           },
           
          
       },
       submitHandler: function(form) {
           //form.submit();
          
           
          
                var form=$("#form3");
                $.ajax({
                type:"post",
                url:"function.php",
                data:form.serialize(),
                
                success:function(status){
                  alertify.set('notifier','position', 'top-center');
                    alertify.success(status);
                 // alert(status);
                 // $('#exampleModal').modal('hide');
                 $("#form3")[0].reset();
                 displayData();
                     
                }
            })
        }
        })
    })

  
    
  </script>
 
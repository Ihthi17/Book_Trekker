

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!--validation-->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  <style>
   form .error {
  color: #ff0000;
}
</style>
</head>
<body>
    <form name="form1">
       <input type="text" name="" id="" required>
       <button type="submit">click</button>
    </form>




    <script>
        $(function() {
    // Setup form validation on the #register-form element
   $("form[name='form1']").validate({   //#register-form is form id
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
           form.submit();
       }
   });
  
    });
    </script>
</body>
</html>
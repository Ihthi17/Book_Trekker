$(document).ready(function(){

$.validator.addMethod("letters", function(value, element) {
  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
}); 

    $(function() {
    // Setup form validation on the #register-form element
   $("form[name='register']").validate({   //#register-form is form id
       // Specify the validation rules
  rules: {
           name: 
           {
           required:true,
           letters:true,
            }, 
        password: {
          required: true,
          minlength:6,
         
        },
       confirm_Passowrd: {
          required: true,
          minlength: 6,
          equalTo: "#password"
      },
   
           email: {               
               required: true,
               email: true,
               minlength:10
           },
        
      
       },
       // Specify the validation error messages
  messages: {
           name:
           {
                required: "Enter Valid Name",
                letters:"please enter letters only",
           },
           password: 
           {
            required:"Enter Passowrd",
            minlength:"Minimum character 6",
           },
        password_confirm: 
        {
          required:"Enter Passowrd",
          equalTo:"Password not match",
        },
           email: "Enter Valid Email ID",
          
       },
       submitHandler: function(form) {
           form.submit();
       }
   });
  
    });
  })
  $(document).ready(function(){
    $('#click').click(function() {
window.location.href ='index.php';
return false;
});
  })

 //password show
$(document).ready(function(){
  $('#eye').click(function(){
     
     if($(this).hasClass('fa-eye-slash')){
        
       $(this).removeClass('fa-eye-slash');
       
       $(this).addClass('fa-eye');
       
       $('#password').attr('type','text');
         
     }else{
      
       $(this).removeClass('fa-eye');
       
       $(this).addClass('fa-eye-slash');  
       
       $('#password').attr('type','password');
     }
 });
})


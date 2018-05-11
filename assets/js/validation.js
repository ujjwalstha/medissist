/** Admin dashboard change password validation **/

$(document).ready(function(){    
  
   $(document).off("click", "#editPassBtn").on("click", "#editPassBtn", function(){

    $("form[name='changePass']").validate({
      // Specify validation rules
      rules: {
       
        oldpassword: {
          required: true,
        },
        newpassword: {
          required: true,
          minlength: 6,
        },
        confirmpassword: {
          required: true,
          equalTo: "#newpassword",
        }
      },
      // Specify validation error messages
      messages: {
        
        oldpassword: {
          required: "Please enter your old password",
        },
        newpassword: {
          required: "Please enter new password",
          minlength: "Your password must be at least 6 characters long",
        },
        confirmpassword: {
          required: "Please enter confirm password",
          equalTo: "New password and confirm password does not match",
        }
      },
      
    });

  });

 });

/** Admin dashboard change password validation ends here **/



/** Add question in forum section validation **/
$(document).ready(function(){    
  
   $(document).off("click", "#addques-btn").on("click", "#addques-btn", function(){

    $("form[name='forum-ques-form']").validate({
      // Specify validation rules
      rules: {
       
        question: {
          required: true,
          maxlength: 340,
        },
       
      },
      // Specify validation error messages
      messages: {
        
        question: {
          required: "Please write something to share your thoughts or questions.",
          maxlength: "Shall not exceed more than 340 letters.",
        }
      },
      
    });

  });

 });
/** Add question in forum section validation ends**/



/** Add specialist validation **/
$(document).ready(function(){    
  
   $(document).off("click", "#addspecialist-btn").on("click", "#addspecialist-btn", function(){

    $("form[name='addspecialist']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6,
        },
        specialisttype: {
          required: true,
        },
        image: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter full name",
        },
        email: {
          required: "Please enter email",
          email: "Please enter a valid email address",
        },
        password: {
          required: "Please enter password",
          minlength: "Your password must be at least 6 characters long",
        },
        specialisttype: {
          required: "Please enter specialist type",
        },
        image: {
          required: "Please select an profile image",
        },
      },
      
    });

  });

 });

/** Add specialist validation ends here **/


/** Edit specialist validation **/
$(document).ready(function(){    
  
   $(document).off("click", "#editspecialist-btn").on("click", "#editspecialist-btn", function(){

    $("form[name='editspecialist-form']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6,
        },
        specialisttype: {
          required: true,
        },
        
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter full name",
        },
        email: {
          required: "Please enter email for username",
          email: "Please enter a valid email address",
        },
        password: {
          required: "Please enter password",
          minlength: "Your password must be at least 6 characters long",
        },
        specialisttype: {
          required: "Please enter specialist type",
        },
        
      },
      
    });

  });

 });

/** Edit specialist validation ends here **/


/** Change profile image validation **/
$(document).ready(function(){    
  
   $(document).off("click", "#changeimg-btn").on("click", "#changeimg-btn", function(){

    $("form[name='editprofileimg-form']").validate({
      // Specify validation rules
      rules: {
       
        image: {
          required: true,
        },
       
      },
      // Specify validation error messages
      messages: {
        
        image: {
          required: "Please choose an image.",
        }
      },
      
    });

  });

 });
/** Change profile image validation ends**/


/** Change profile setting validation **/
$(document).ready(function(){    
  
   $(document).off("click", "#editprofile-btn").on("click", "#editprofile-btn", function(){

    $("form[name='editprofile-form']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },
        username: {
          required: true,
        },
        specialisttype: {
          required: true,
        }
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter full name",
        },
        username: {
          required: "Please enter username",
        },
        specialisttype: {
          required: "Please enter specialist type",
        }
      },
      
    });

  });

 });

/** Change profile setting validation ends here **/


/** Add specialist type validation **/
$(document).ready(function(){

  $(document).off("click", "#addspecialisttype-btn").on("click", "#addspecialisttype-btn", function(){

    $("form[name='addspecialisttype']").validate({
      // Specify validation rules
      rules: {
       
        specialisttype: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        specialisttype: {
          required: "Please enter a specialist type",
        },
      },
       
    });

  });

});
/** Add specialist type validation ends here **/


/** Edit specialist type validation **/
$(document).ready(function(){

  $(document).off("click", "#editspecialisttype-btn").on("click", "#editspecialisttype-btn", function(){

    $("form[name='editspecialisttype']").validate({
      // Specify validation rules
      rules: {
       
        specialisttype: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        specialisttype: {
          required: "Please enter a specialist type",
        },
      },
       
    });

  });

});
/** Edit specialist type validation ends here **/


/** Add health problem validation **/
$(document).ready(function(){

  $(document).off("click", "#addhealthproblems-btn").on("click", "#addhealthproblems-btn", function(){

    $("form[name='addhealthproblems']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },

        description: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter title",
        },

        description: {
          required: "Please enter description",
        },
      },
       
    });

  });

});
/** Add health problem validation ends here **/



/** Edit health problem validation **/
$(document).ready(function(){

  $(document).off("click", "#edithealthproblem-btn").on("click", "#edithealthproblem-btn", function(){

    $("form[name='edithealthproblem']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },

        description: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter title",
        },

        description: {
          required: "Please enter description",
        },
      },
       
    });

  });

});
/** Edit health problem validation ends here **/


/** Add Medicinal product validation **/
$(document).ready(function(){

  $(document).off("click", "#addmedicinalproduct-btn").on("click", "#addmedicinalproduct-btn", function(){

    $("form[name='addmedicinalproduct']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },

        description: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter name",
        },

        description: {
          required: "Please enter description",
        },
      },
       
    });

  });

});
/** Add Medicinal product validation ends here **/


/** Edit Medicinal product validation **/
$(document).ready(function(){

  $(document).off("click", "#editmedicinalproduct-btn").on("click", "#editmedicinalproduct-btn", function(){

    $("form[name='editmedicinalproduct']").validate({
      // Specify validation rules
      rules: {
       
        name: {
          required: true,
        },

        description: {
          required: true,
        },
        
      },
      // Specify validation error messages
      messages: {
        
        name: {
          required: "Please enter title",
        },

        description: {
          required: "Please enter description",
        },
      },
       
    });

  });

});
/** Edit Medicinal product validation ends here **/
















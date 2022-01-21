// Wait for the DOM to be ready
$(function() {
    $("#hero_modal_form").validate({
        
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        first_name:  {
          required: true,
          minlength: 2
        },
        last_name:  {
          required: true,
          minlength: 2
        },
        profession: {
          required: true,
          minlength: 2
        },
        identity: {
          required: true,
          minlength: 2
        },
        contribution:{
          required: true,
          minlength: 8
        },
        photo: "required",
      },
      // Specify validation error messages
      messages: {
        first_name: "Please enter at least 2 character",
        last_name: "Please enter at least 2 character",
        profession: "Please enter at least 2 character",
        identity: "Please enter at least 2 character",
        contribution: "Please enter at least 8 character",
      },
    });
  });
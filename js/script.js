$( document ).ready(function() {


    function signup_validate(){

      var upass = $("#signup-form input[name='upass']").val();
      var urepass = $("#signup-form input[name='urepass']").val();
      if(upass == urepass){
        return true;
      }
      return false;
    }
    
    $("#signup-form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        if(signup_validate()){
            $(".signup-msg").html("");
            var form = $(this);
            var form_url = form.attr('action');
            var form_type = form.attr('method');
            $.ajax({
                   type: form_type,
                   url: form_url,
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       
                       $('#signup-modal').modal('hide');
                       $(".response_msg").text(data + " Check out our new articles!");

                   }
                 });
        }
        else{
            $(".signup-msg").html("The passwords do not match! Please try again.")
        }
       

    }); //sign-up fom submit

    $("#login-form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
            // $(".signup-msg").html("");
            var form = $(this);
            var form_url = form.attr('action');
            var form_type = form.attr('method');
            $.ajax({
                   type: form_type,
                   url: form_url,
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       $('#signup-modal').modal('hide');
                       location.reload();
                       // $(".response_msg").text(data + " Check out our new articles!");

                   }
                 });
           }); //login fom submit
      


    $("#add_post").submit(function(e) {

        $("#res_msg").html("");
        e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var form_url = form.attr('action');
            var form_type = form.attr('method');
            $.ajax({
                   type: form_type,
                   url: form_url,
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {  
                      console.log(data);
                      $("#add_post")[0].reset();
                      $("#res_msg").html("New article submitted successfully!");
                   }

        });
    }); //add_post fom submit

    //toggle login
    $(".sign-text").click(function(){
        $(".signup_container").toggle();
        $(".login_container").toggle();
    });


    
    $(".modify-post").click(function(){

        var targetrowid = $(this).attr("post-id");
        $("#"+targetrowid).toggle();

        
    }); //modify post


    $(".updatepost").submit(function(e) {

          e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var form_url = "files/action.php";
            var form_type = form.attr('method');
            $.ajax({
                   type: form_type,
                   url: form_url,
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {  
                      alert(data);
                      console.log(data);
                   }

        });


    });


}); //document ready



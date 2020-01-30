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

    $(".search-user").submit(function(e){
      // $(".usersearch-response").html("");
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var form = $(this);
      var form_url = form.attr("action");
      var form_type = form.attr('method');
      var form_data = form.serialize();
       $.ajax({
                   type: form_type,
                   url: form_url,
                   data: form_data, // serializes the form's elements.
                   success: function(data)
                   { 
                    $("#userresponse-table tbody").html("");
                    var data = JSON.parse(data);
                    // console.log(data);
                    // console.log(data["status"] == "User found");
                    if(data["status"] == "User found"){
                    for(i = 0;i < Object.keys(data).length - 1;i++){
                      $("#userresponse-table tbody").append("<tr><td>"+data[i]["Name"]+"</td><td>"+data[i]["phone"]+"</td><td>"+data[i]["Email"]+"</td><td>"+data[i]["Code"]+"</td></tr>");  
                      }
                    }
                    else{
                      $("#userresponse-table tbody").html("<tr><td>"+data["status"]+"</td></tr>");
                    }
                   }

        });

    });

    //pagination function

    $(".page-link").click(function(){

       var page =  $(this).attr("data-value");
       if(page=="0"){
              
       }
       else{
              var form_url = "files/action.php";
              var form_type = "POST";
               $.ajax({
                           type: form_type,
                           url: form_url,
                           data: {
                                  "page":page
                               },
                           success: function(data)
                           { 
                            $(".page-link").parent().removeClass("active");
                            $(this).parent().addClass("active");
                            var data = JSON.parse(data);
                            if(data.status == "success"){
                             $(".show-articles").html("");
                                for(i = 0;i <= 2;i++){
                                  var article_html = '<div class="article_summary"><h1>'+data[i]["Post_title"]+'</h1><p>Date:'+data[i]["Created_at"]+'</p><p>Category:'+data[i]["Ctg"]+'</p><p>Author:'+data[i]["Name"]+'</p><p class="mt-3">'+data[i]["Post"]+'</p></div>';
                                  $(".show-articles").append(article_html);
                                 }//for
                            }//if
                           }//success

                });
       }
    });


}); //document ready



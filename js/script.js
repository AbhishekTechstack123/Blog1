$( document ).ready(function() {
    
    $("#signup-form").submit(function(e) {

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
                   
                   $('#signup-modal').modal('hide');
                   $(".response_msg").text(data + " Check out our new articles!");

               }
             });


    });
});



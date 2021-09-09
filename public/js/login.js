$(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form[name="login"]').on("submit", function(event){
        event.preventDefault();
        
        const form = $(this);
        const action = form.attr('action');
        const email = form.find('input[name="email"]').val();
        const password = form.find('input[name="password"]').val();

        $.post(action,{email: email, password: password}, function(response){
            console.log(response.type);
            
            if(response.message && response.type === "error"){      
                toastr.error(response.message);
            }

            if(response.redirect){
                window.location.href = response.redirect;
            }

        }, 'json');

    })
    
});
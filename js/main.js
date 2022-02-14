function loginData(){

console.log(window.name);

if(typeof window.name === "undefined" || window.name === '' ){  
    window.location.href="sign_in.html";
}else{

    $.ajax({
        method:"POST",
        dataType: "json",
        url:"php/fetch.php",
        data:{data:"1",uId:window.name},
        beforeSend: function() {        
            $("#overlay").show();
        },
        success:function(result){

            $("#Name").val(result.user_name);
            $("#Phone").val(result.user_phone);
            $("#Email").val(result.user_email);
            $("#Username").val(result.user_usrname);
            $("#Address").val(result.user_address);
            //$("#userId").val(window.name);
            $("#userSta").val(result.user_sta);
            $("#passcode").val(result.user_password);
            $("#overlay").hide();

        }
    })
    
}

}

$("body").on('submit', '#loginForm', function(e) {
        e.preventDefault();        
        const formData = new FormData(e.target);
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "php/login.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status===true){
                    window.name=data.user_data;
                    $(".form-control").val("");
                    $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    setTimeout(function(){
                            window.location.href="index.html";
                    },1800); 
                    
                } else {
                    $( "div.failure" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );    
                }
            },
            error: function(erroe) {
                $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            }
        });
    });


$("body").on('submit', '#signupForm', function(e) {
        e.preventDefault();        
        const formData = new FormData(e.target);
        $.ajax({
            method: "POST",
            dataType: 'text',
            url: "php/register.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
            if(data!=='0'){
                $(".view").val("");
                $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
               
                }
            }
        });
    });


$("body").on('submit', '#updateForm', function(e) {
        e.preventDefault();        
        const formData = new FormData(e.target);
        $.ajax({
            method: "POST",
            dataType: 'text',
            url: "php/update.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
            if(data=='1'){                
                $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
               
                }
            }
        });
    });

function logout(){

    window.name='';
    window.location.href="sign_in.html";

}
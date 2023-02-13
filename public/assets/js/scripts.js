/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

//This is the function that i made
function Appear(mod) {

    if(mod == 'Show'){

        document.getElementById('account-Modification').style.display = "none";  
        document.getElementById('account-password').style.display = "none";   

        for(var i = 1; i < 6 ; i++){

            document.getElementById('account-'+i).style.display = "block";   
        }
    }
    else{
        document.getElementById('account-Modification').style.display = "block";   
        document.getElementById('account-password').style.display = "block";   

        for(var i = 1; i < 6 ; i++){

            document.getElementById('account-'+i).style.display = "none";   
    
        }
    }
    


}

//This is what i found
function Appear1(){

    //hide and show inputs
    //https://stackoverflow.com/questions/31799603/show-hide-multiple-divs-javascript
    $(".AfterMod").slideToggle();

    //clear the inputs
    //https://stackoverflow.com/questions/11072031/clearing-multiple-text-input-boxes-with-one-name
    $(".clear").val("");
}

$(document).ready(function(){
    $('.pass_show').append('<span class="ptxt">Show</span>');  
});
      
$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show");

    //Amine: Call Back Function
$(this).parent().find(".form-control").attr('type', function(index, attr){
    
    return attr == 'password' ? 'text' : 'password'; }); 
    
});

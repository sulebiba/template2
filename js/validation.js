    function validate(){
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;
         var error=document.getElementById("error");
          var error2=document.getElementById("error2");
          var error3=document.getElementById("error3");
        var error4=document.getElementById("error4");
              
          if(name== "" || name==" "){
           error.style.visibility="visible";
            return false; 
             }
            else if(!name.match(/^[a-zA-Z]+$/)){
            error.style.visibility="visible";
            return false; 
             }
            else if(email== "" || email==" "){
            error2.style.visibility = "visible";
            return false; 
             }
            else if(message== "" || message==" "){
            error3.style.visibility = "visible";
            return false; 
             }
            else{
                return true;
            }
          }
   
                   function message(x,y,z){
                     swal(x=x,y=y,z=z);
    
                        }
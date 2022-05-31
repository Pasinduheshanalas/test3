const form = document.querySelector(".register form "),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{

    e.preventDefault();//preventing form from submitting

}

continueBtn.onclick = ()=>{
    
    //let's start Ajax

    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("POST","php/register.php",true);
    xhr.onload = () =>{

        
        if(xhr.readyState === XMLHttpRequest.DONE){

            if(xhr.status === 200 ){
                let data = xhr .response;
                if(data == "success"){

                    location.href = "login.php";

                   

                }
                        else{
                            errorText.textContent = data;
                            errorText.style.display  = "block";
                           
                            
                           
                        }
            }
        }


    }

    //send the form data through ajax to php

    let formData = new FormData(form);//create new formdata object

    xhr.send(formData);//sending form data to php

    
}



    

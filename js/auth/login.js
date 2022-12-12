
document.addEventListener("DOMContentLoaded", () => {
    prepareSubmitEvent();
});

const email = document.querySelector("#email");

const prepareSubmitEvent = () =>{
   

    const buttonSubmit = document.querySelector("#button-login");
    buttonSubmit.addEventListener(("click"), () =>{
     const inputs = [email]
        let inputValid = 0; 
    
        inputs.forEach((input)=>{
            inputValid += handleInputChange(input);
        })
    

        if(inputValid !== inputs.length){
            Swal.fire({
                title: '¡Oops!',
                text: 'Complete todos los campos marcados en rojo por favor',
                confirmButtonText: 'OK'
              })
           return;  
        }
 
        login();
    })
}

const login = async() =>{
    await $.ajax({
        url: '../auth/login.php',
        type: 'post',
        data: {method: 'login', email: email.value, password: password.value},
        success: function(response){
            const res = JSON.parse(response);
            if(res.token){
                localStorage.setItem("token", JSON.stringify(res.token));
                 window.location.href = "/tomihq-codoacodo/";
            }
            
        }, error: function(xhr, status, error){
            Swal.fire({
                title: '¡Error!',
                text: 'Algo ha salido mal, pero no te preocupes, ¡estamos arreglándolo!',
                confirmButtonText: 'OK'
              })
        },
     });
}
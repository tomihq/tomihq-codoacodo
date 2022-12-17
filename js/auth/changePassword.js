document.addEventListener("DOMContentLoaded", () => {
    prepareSubmitEvent();
});

const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#confirmPassword");

const prepareSubmitEvent = () =>{
   
    const buttonSubmit = document.querySelector("#button-submit");
    buttonSubmit.addEventListener(("click"), () =>{
     const inputs = [password, confirmPassword]
        let inputValid = 0; 
    
        inputs.forEach((input)=>{
            inputValid += handleInputChange(input);
        })

        if(password.value !== confirmPassword.value){
            Swal.fire({
                title: '¡Oops!',
                text: 'Las contraseñas no coinciden',
                confirmButtonText: 'OK'
              })
              return;
        }
    

        if(inputValid !== inputs.length){
            Swal.fire({
                title: '¡Oops!',
                text: 'Complete todos los campos marcados en rojo por favor',
                confirmButtonText: 'OK'
              })
           return;  
        }
 
        changePassword();
    })
}

const changePassword = async() =>{
    
    await $.ajax({
        url: '../auth/changePassword.php',
        type: 'post',
        data: {password: password.value, confirmPassword: confirmPassword.value},
        success: function(response){
              const res = JSON.parse(response);
            if(res.ok){
                 window.location.href = "../../php/auth/login.php";
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
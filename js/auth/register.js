
document.addEventListener("DOMContentLoaded", () => {
    prepareSubmitEvent();
});

const email = document.querySelector("#email");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#confirmPassword");

const prepareSubmitEvent = () =>{
   

    const buttonSubmit = document.querySelector("#button-submit");
    buttonSubmit.addEventListener(("click"), () =>{
     const inputs = [email, password, confirmPassword]
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
 
        registerUser();
    })
}

const registerUser = async() =>{
    await $.ajax({
        url: '../auth/register.php',
        type: 'post',
        data: {method: 'addUser', email: email.value, password: password.value, confirmPassword: confirmPassword.value},
        success: function(response){
            
            const res = JSON.parse(response);
            Swal.fire({
                title: res.title,
                text: res.msg,
                confirmButtonText: 'OK'
              })
        }, error: function(xhr, status, error){
            Swal.fire({
                title: '¡Error!',
                text: 'Algo ha salido mal, pero no te preocupes, ¡estamos arreglándolo!',
                confirmButtonText: 'OK'
              })
        },
     });
}
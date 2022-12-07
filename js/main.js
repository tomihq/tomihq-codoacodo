document.querySelector("#buyTickets").addEventListener("click", (e) =>{
    window.location = 'tickets.html';
})

const name = document.querySelector("#name");
const surname = document.querySelector("#surname");
const email = document.querySelector("#email");
const talkAbout = document.querySelector("#talkAbout");

document.querySelector("#btn-form").addEventListener("click", async() =>{
    const inputs = [name, surname, email]
    let inputValid = 0; 

    inputs.forEach((input)=>{
        inputValid += handleInputChange(input);
    })


    if(inputValid !== inputs.length){
        Swal.fire({
            title: '¡Oops!',
            text: 'Complete todos los campos por favor',
            confirmButtonText: 'OK'
          })
       return;  
    }

    if(talkAbout.value.length<30){
        talkAbout.classList.add("is-invalid")
        Swal.fire({
            title: '¡Oops!',
            text: 'El motivo por el cual quieres ser un orador debe tener 30 caracteres o más.',
            confirmButtonText: 'OK'
          })
          return;
    }else{
        talkAbout.classList.remove("is-invalid");
        talkAbout.classList.add("is-valid");
    }


    
})


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

    if(talkAbout.value.length<5){
        talkAbout.classList.add("is-invalid")
        Swal.fire({
            title: '¡Oops!',
            text: 'El motivo por el cual quieres ser un orador debe tener 5 caracteres o más.',
            confirmButtonText: 'OK'
          })
          return;
    }else{
        talkAbout.classList.remove("is-invalid");
        talkAbout.classList.add("is-valid");
    }

   await registerUser();
    
})


const registerUser = async() =>{

    await $.ajax({
        url: './php/index.php',
        type: 'post',
        data: {name: name.value, surname: surname.value, email: email.value, talkAbout: talkAbout.value},
        success: function(response){
            console.log(response);
            
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

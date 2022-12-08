document.addEventListener("DOMContentLoaded", () => {
    const saveButton = document.querySelector(".saveButton");
    const name = document.querySelector("#name");
    const surname = document.querySelector("#surname");
    const email = document.querySelector("#email");
    const elements = [name, surname, email];

    verifyInputData(elements);
    saveButton.addEventListener("click", () =>{
        prepareSaveUsersAction(saveButton.id, elements);
    })
});

const verifyInputData = (elements) =>{

    elements.forEach((element) => element.addEventListener(('change'), () => handleInputChange(element)));

}

const prepareSaveUsersAction = (id, elements) =>{
    let inputValid = 0; 
 
    elements.forEach((input)=>{
        inputValid += handleInputChange(input);
    })


    if(inputValid !== elements.length){
        Swal.fire({
            title: '¡Oops!',
            text: 'Complete todos los campos por favor',
            confirmButtonText: 'OK'
          })
       return;  
    }

    const [name, surname, email] = elements;
    
    const data = {
        name: name.value, 
        surname: surname.value,
        email: email.value
    }

    const url = "./editUser.php?id="+id+"";


    $.ajax({
        url: url,
        type: 'POST',
        data: {data: data, method: 'put'},
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if(res.ok){
                Swal.fire({
                    title: res.title,
                    text: res.msg,
                    icon: "info",
                    imageSize: '200x200',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if(result.isConfirmed) window.location = "listaInscripcion.php";
                })
                
            } 
        }
    });
}

const deleteUser = (id) =>{
    $.ajax({
        url: '../php/listaInscripcion.php',
        type: 'POST',
        data: {id: id, method: 'delete'},
        error: function() {
        alert('Something is wrong');
        },
        success: function(data) {
            const res = JSON.parse(data);
            if(res.ok){
                Swal.fire({
                    title: '¡Proceso exitoso!',
                    text: 'El usuario ha sido eliminado',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if(result.isConfirmed) window.location.reload();
                })
                
            }
        }
    });
}

const prepareDeleteUsersAction = () => {
    const users = document.querySelectorAll(".deleteUser");
    users.forEach((user)=>{
            user.addEventListener("click", () =>{
                Swal.fire({
                    title: '¿Estás seguro que querés eliminar a este usuario?',
                    text: "No hay vuelta atrás",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'No, cancelar',
                    confirmButtonText: 'Sí, quiero eliminar a este usuario'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        deleteUser(user.id);
                    }
                  })

                
            })
        }
        
    )
}

const prepareModifyUsersAction = () =>{
    const users = document.querySelectorAll(".modifyUser");
    users.forEach((user)=>{
        user.addEventListener("click", () => modifyUser(user))      
    })
}

const modifyUser = (user) =>{
    const paragraphs = document.querySelectorAll("#paragraph-"+user.id);
    const inputs = document.querySelectorAll("#input-"+user.id);

    paragraphs.forEach((paragraph, index) =>{
        inputs[index].hidden = inputs[index].hidden?inputs[index].removeAttribute("hidden"):true;
        paragraph.hidden = paragraph.hidden?paragraph.removeAttribute("hidden"):true;
        user.textContent = !inputs[index].hidden?"Guardar":"Modificar";
       
    })
    if(user.textContent === 'Modificar') saveUser(user.id, inputs);
    
}

const saveUser = (id, inputs) =>{
    const data = [];
    inputs.forEach((input) => data.push(input.value));


    $.ajax({
        url: '../php/listaInscripcion.php',
        type: 'POST',
        data: {id: id, method: 'update', data: data},
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
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if(result.isConfirmed) window.location.reload();
                })
                
            }
        }
    });

    
    
}

    


document.addEventListener("DOMContentLoaded", () => {
    prepareDeleteUsersAction();
    prepareModifyUsersAction();
});




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



document.addEventListener("DOMContentLoaded", () => {
    prepareDeleteUsersAction();
});


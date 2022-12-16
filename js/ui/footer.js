const logoutLink = document.querySelector("#logout-a");

logoutLink.addEventListener(("click"), () =>{
    logout();
})

const logout = async() =>{
    let token = localStorage.getItem("token");
    if(token){
        await $.ajax({
            url: '/tomihq-codoacodo.000webhostapp.com/php/auth/logout.php',
            type: 'post',
            data: {},
            success: function(response){
                const res = JSON.parse(response);
                if(res.ok){
                    localStorage.removeItem("token");
                }

                Swal.fire({
                    title: 'Haz cerrado la sesión.',
                    text: '¡Su sesión se ha cerrado correctamente!',
                    confirmButtonText: 'OK'
                  })
                  
               
            }, error: function(xhr, status, error){
                console.log(error)
                Swal.fire({
                    title: '¡Error!',
                    text: 'Algo ha salido mal, pero no te preocupes, ¡estamos arreglándolo!',
                    confirmButtonText: 'OK'
                  })
            },
         });
    }else{
        Swal.fire({
            title: '¡Error!',
            text: 'Algo ha salido mal, pero no te preocupes, intenta iniciar sesión y limpiar las cookies.',
            confirmButtonText: 'OK'
          })
    }

   
}
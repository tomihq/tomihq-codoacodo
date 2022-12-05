document.querySelector("#buyTickets").addEventListener("click", (e) =>{
    window.location = 'tickets.html';
})

document.querySelector("#btn-form").addEventListener("click", async() =>{
   await registerUser();
    
})

const registerUser = async() =>{
    const name = document.querySelector("#name").value;
    const surname = document.querySelector("#surname").value;
    const email = document.querySelector("#email").value;
    const talkAbout = document.querySelector("#talkAbout").value;

    await $.ajax({
        url: './php/index.php',
        type: 'post',
        data: {name: name, surname: surname, email: email, talkAbout: talkAbout},
        success: function(response){
            console.log(response)
        }, error: function(xhr, status, error){
            alert("Error!" + xhr.status);
        },
     });



   
}
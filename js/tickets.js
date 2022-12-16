let ticketPrice = 200; 
const discountsByCategory = [
    {
        "category": "no-category",
        "discount": 0.0
    },
    {
        "category": "student",
        "discount": 0.8
    },
    {
        "category": "trainee",
        "discount": 0.5
    },
    {
        "category": "junior",
        "discount": 0.15
    }
]
let ticketQuantity = 1;

const nameSummary    = document.querySelector("#name-summary");
const surnameSummary = document.querySelector("#surname-summary");
const emailSummary = document.querySelector("#email-summary");
const totalSummary = document.querySelector("#total-summary");

const summaryInfo = document.querySelector("#summary-info");

let clientName = document.querySelector("#clientName");
let clientSurname = document.querySelector("#clientSurname");
let clientEmail = document.querySelector("#clientEmail");

/* document.querySelector("#goBack").addEventListener("click", () =>{
    window.location = "./";
})
 */

let ticketQuantityInput = document.querySelector("#ticket-quantity");

let totalPrice = document.querySelector("#total-price");
totalPrice.textContent = ticketPrice;

const selectCategoryDropdown = document.querySelector("#select-category-dropdown");

const form = document.querySelector("#form-ticket");
form.addEventListener("submit", (e) =>{
    e.preventDefault();
})



const btnSummary = document.querySelector("#btnSummary");
let inputs = [clientName, clientEmail, clientSurname];
let inputError = false;
let inputValid = 0; 


btnSummary.addEventListener("click", () =>{
    inputValid = 0;
    inputs.forEach((input)=>{
        inputValid+= handleInputChange(input);
    })



    if(inputValid !== inputs.length){
       return;
       
    }

    if(!inputError){
        if(ticketQuantityInput.value < 0 || !ticketQuantityInput.value){
            alert("Debe especificar la cantidad de tickets");
            return;
        }
    
        if(selectCategoryDropdown.children[0].selected === true){
            alert("Debe de especificar la categoría a la que pertenece");
            return; 
        }
    
    }
    
   

    handleSummary();
    showSummaryData();
    createTicket();
}) 

const createTicket = async() => {

    await $.ajax({
        url: './tickets.php',
        type: 'post',
        data: {name: clientName.value, surname: clientSurname.value, email: clientEmail.value, 
        quantity: ticketQuantityInput.value, category: selectCategoryDropdown.value},
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


const btnDelete = document.querySelector("#btnDelete");
btnDelete.addEventListener("click", () =>{
    totalPrice.textContent = 200;
    ticketQuantityInput.value = 1;
    selectCategoryDropdown.children[0].selected = true;
    summaryInfo.classList.add("hidden");
    clientName.textContent = '';
    clientSurname  = '';
    clientEmail  = '';

})



const handleSummary = () =>{
   let found = false;
   let i = 0;

   do {
     if(selectCategoryDropdown.value === discountsByCategory[i].category){
        const totalPriceQuantity = ticketPrice * ticketQuantityInput.value;
        const discount = (totalPriceQuantity * discountsByCategory[i].discount);
 
        totalPrice.textContent = totalPriceQuantity - discount;
        found = true;
    } 
    i++; 
   
    
   } while (!found || i<discountsByCategory.length); 
}

const showSummaryData = () =>{

    nameSummary.textContent    =  clientName.value; 
    surnameSummary.textContent =  clientSurname.value;
    emailSummary.textContent   = clientEmail.value;
    totalSummary.textContent = totalPrice.textContent;
    summaryInfo.classList.remove("hidden");



}

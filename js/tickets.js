let ticketPrice = 200; 
const discountsByCategory = [
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
        if(input.value === ''){
            input.classList.add("is-invalid");
            alert("Ingrese los datos personales obligatorios por favor");
        }else{
            input.classList.remove("is-invalid");
            input.classList.add("is-valid");
            inputValid++;
        }
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
}) 




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

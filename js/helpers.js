const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

const handleInputChange = (element) =>{
    let inputValue = 0;
    if((element.type==='text' && element.value === '') || (element.type==='email' && !element.value.toLowerCase().match(emailRegex))){
        element.classList.add("is-invalid");
    }else{
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
        inputValue++;
    }
    return inputValue; 
}
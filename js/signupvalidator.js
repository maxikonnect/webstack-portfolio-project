document.addEventListener("DOMContentLoaded", ()=>{
    const output = document.querySelector(".form-help-firstname");
    const firstName = document.getElementById("your-first-name");
    const form = document.querySelector("form");
    const firstNameExp = /[A-Za-zÀ-ž'\-\s]{3,}/;

    firstName.addEventListener("input", ()=>{
        const firstValue = firstName.value;
        const result = firstNameExp.test(firstValue);
        let response = "";

        if(!result){
            response = "First name should be at least 3 characters and only contains letters";
            output.style.color = "red";
        }else{
            response = "Valid first name";
            output.style.color = "green";
        }
        
        output.textContent = response;
    })
})

477
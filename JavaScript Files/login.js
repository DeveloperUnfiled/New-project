const passwordPattern= /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
const buttonElement=document.querySelector('.button-element');
buttonElement.addEventListener('click', (event)=>{
    const nameIdentity= document.querySelector('.email-input').value;
    const password= document.querySelector('.password-input').value;
    const passwordPattern= /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(nameIdentity===null || nameIdentity===''){
        event.preventDefault();
        document.querySelector('.null-input').innerHTML=`This field is mandatory`;
    }
     if(!passwordPattern.test(password)){
    event.preventDefault();
    document.querySelector('.password-input-js').innerHTML=`Password must be at least 8 characters long, contain an uppercase letter, a number, and a special character.';`;
   }
   else{
    document.querySelector('.password-input-js').innerHTML='';
   }

    console.log(nameIdentity);
    console.log(password);
    
});

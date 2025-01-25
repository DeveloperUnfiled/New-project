const upLoader=document.querySelector('.signup-input-js');
upLoader.addEventListener('click', (event)=>{
    const firstNameInput=document.querySelector('.first-name-input').value;
    const lastNameInput=document.querySelector('.last-name-input').value;
    const id_number=Number(document.querySelector('.id-number').value);
    const emailInput=document.querySelector('.email-input').value;
    const passwordElement=document.querySelector('.password-input').value;
    
    const messages=document.getElementById('message');
        event.preventDefault();

        const fileUploads= document.getElementById('inp-file');
        const files= fileUploads.files[0];

        if(files){
            const allowedFormats= ['image/jpeg', 'application/pdf', 'video/mp4'];
            if(allowedFormats.includes(files.type)){
                messages.textContent= 'File accepted. Uploading...';
            }
            else{
                messages.textContent= 'Invalid file format. Only JPG OR PDF formats allowed!';
            }
        }
        else{
            messages.textContent= 'Please select a file to upload!!';
        }
    
    console.log(firstNameInput);
    console.log(lastNameInput);
    console.log(id_number);
    console.log(emailInput);
    console.log(passwordElement);

});
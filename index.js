const form=document.getElementById('form');
const confirmar=document.getElementById('confirm')

form.addEventListener('submit',(event)=>{
   event.preventDefault();
   const pass=form.pass;
   const passConfirm=form.passConfirm;
    if(pass.value!=passConfirm.value){
        const error=document.createElement('small')
        error.className='text-danger'
        error.textContent="Las contraseñas no coinciden"
        let hayError=document.getElementsByTagName('small')
        if(hayError.length==0){
            form.passConfirm.parentNode.appendChild(error)
        }
        passConfirm.style.borderColor = "red"
        
    }
    else{
        form.submit()
    }
})
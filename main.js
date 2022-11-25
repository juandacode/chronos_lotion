
const form = document.querySelector('#form');


const name = form.name;
const email = form.email;
const address = form.address;
const phone = form.phone;
const document = form.document;

let errors= document.querySelector('.errors')

form.addEventListener('submit',validar);

function validar(e){
    errors.innerHTML = ''
    validarnombre(e)
    validarcorreo(e)
    validardocumento(e)
    validartelefono(e)
    validardireccion(e)
}

function validarnombre(e){
    if(nombre.value =='' || nombre.value == null ) {
        errors.style.display = 'block'
        errors.innerHTML +='<li>ingresa nombre </li>'
        e.preventDefault()
    }
}
function validarcorreo(e){
    if(correo.value =='' || nombre.value == null ) {
        errors.style.display = 'block'
        errors.innerHTML +='<li>ingresa correo </li>'
        e.preventDefault()
    }else{
        if(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo.value)){
            
        }else{
            errors.style.display = 'block'
            errors.innerHTML +='<li>ingrese correo valido</li>'
            e.preventDefault()
        }
    }
}


function validardireccion(e){
    if(direccion.value =='' || nombre.value == null ) {
        errors.style.display = 'block'
        errors.innerHTML +='<li>ingresa su direccion </li>'
        e.preventDefault()
    }
}
function validardocumento(e){
    if(!terminos.checked){
        errors.style.display = 'block'
        errors.innerHTML +='<li>acepte termino </li>'
        e.preventDefault()
    }
    
}
function validartelefono(e){
    if(!terminos.checked){
        errors.style.display = 'block'
        errors.innerHTML +='<li>acepte termino </li>'
        e.preventDefault()
    }
    
}


            










//URL
const url='http://10.30.0.28/BO/controller/AccesoController.php';
 const user= document.querySelector('#usuario');
 const clave = document.querySelector('#clave');

 //GET FORM
function getForm(){
    return obj={
        usuario : user.value,
        clave : clave.value
    }
    }
 //VALIDATION FORM
function validateForm(obj){
    alert=Swal.fire({
        title:"Notifación!",
        text: "Todos los datos son requeridos",
        icon: "warning",
        button:"Ok",
    });
    if(obj.usuario ==="" || obj.clave===""){
       return alert;
        
    }
        return null;
     
}
const postUser = () => {
    event.preventDefault();
    const obj = getForm();
    const error = validateForm(obj);
  
    if(error) {
      alert(error);
      return false;
    }
	 
    login();
  }
//CLEAR FORM
const clearForm = (closeModal = false) => {
    frm.reset();
    if(closeModal) {
      btnClose.click();
    }
  } 
function login(){
    var usuario=document.getElementById('usuario');
    var clave=document.getElementById('clave'); 
    var btn='btn';
    var form = new FormData; 
    form.append('btn',btn);
    form.append('usuario',usuario.value);
    form.append('clave',clave.value);
   
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:form
        
    }).then(res=>{
        console.log(res.data);
        clearForm();
        window.location.href = './views/avisos.php';
    }).catch(error=>{
      
        Swal.fire({
            title:"Notifación!",
            text: "Usuario o Contraseña incorrecta",
            icon: "warning",
            button:"Ok",
        })
        console.log(error)
    })  
}
//URL
const url='http://10.30.0.28/BO/controller/UsuarioController.php';
//TABLE
const tblUsers = document.querySelector('#tblUsers');
//INPUT
const txtid= document.querySelector('#id_usuario');
const txtnombre= document.querySelector('#nombre');
const txtcorreo= document.querySelector('#correo');
const txtclave= document.querySelector('#clave');
const reclave= document.querySelector('#reclave');
const slcunidad= document.querySelector('#unidad');
const slctipo= document.querySelector('#tipo');
const nivel = document.querySelector('#nivel');
const btncerrar = document.querySelector('#cerrar');
//BUTTONS
const add= document.querySelector('#add');


//OBTNER USUARIOS
function getUser(){
axios({
    method:'GET',
    url:url,
    responseType:'json'
    
}).then(res=>{
    tblUsers.innerHTML="";
    users=res.data;
    console.log(users);
    users.forEach(u => {
        tblUsers.innerHTML +=`
        <tr>
            <td>${u.id_usuario}</td>
            <td>${u.nombre}</td>
            <td>${u.correo}</td>
            <td>${u.unidad}</td>
            <td>${u.tipo}</td> 
            <td>
                 <span>
                    <a onclick="autocompleteUser('${u.id_usuario}',
                                                 '${u.nombre}',
                                                 '${u.correo}',
                                                 '${u.clave}',
                                                 '${u.id_unidad}',
                                                 '${u.id_tipo_usuario}')"
                        href='#' data-toggle='modal' data-target='.bd-example-modal-lg' data-placement='top' title='Editar'>
                        <i class='fa fa-pencil color-primary m-r-5'></i>
                    </a>
                    <a onclick="confirmDeleteUser('${u.id_usuario}','${u.tipo}')" href="#" data-toggle="tooltip" data-placement="top" title="Eliminar">
                <i class="fa fa-close color-danger"></i>
              </a>
                </span>
            </td>   
        </tr>
        `
    });
    
}).catch(erro=>{
    console.error('error al cargar datos');
});
}
getUser();
//GET FORM
function getForm(){
return user={
    id : txtid.value,
    nombre : txtnombre.value,
    correo : txtcorreo.value,
    clave : txtclave.value,
    reclave :reclave.value,
    unidad : slcunidad.value,
    tipo: slctipo.value
   

}
}
//VALIDATION FORM
function validateForm(user){
    if(user.nombre ===""|| user.clave===""){
        return "Todos los campos son obligatorios";
    }
    if(user.tipo === "0" || user.unidad==="0"){
        return "Debe seleccionar una opcion";
    }
    if(user.clave != user.reclave ){
        return "Las contraseñas deben ser iguales ";
    }
    return null;
}
//CLEAR FORM
const clearForm = (closeModal = false) => {
    frmUser.reset();
    txtid.value = "0";
  
    if(closeModal) {
      btnClose.click();
    }
  } 
//ADD OR EDIT
const postUser = () => {
    event.preventDefault();
    const user = getForm();
    const error = validateForm(user);
  
    if(error) {
      alert(error);
      return false;
    }
  
    (user.id === "0") ? addUser(user) : editUser(user);
  }
//AUTOCOMPLETE
const autocompleteUser = (id,nombre,correo,clave,unidad,tipo) => {
    txtid.value = id;
    txtnombre.value = nombre;
    txtcorreo.value = correo;
    txtclave.value=clave;
    slcunidad.value = unidad;
    slctipo.value=tipo;
  }
//ADD
function addUser(){
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:user
        
    }).then(res=>{
        console.log(res.data);
        getUser();
        clearForm();
        alert("Usuario agregado correctamente");
    }).catch(error=>{
      
        alert("No se pudo registar al usuario");
    })
    
}
//EDIT
function editUser(){
    axios({
        method:'PUT',
        url:url,
        responseType:'json',
        data:user
        
    }).then(res=>{
        console.log(res.data);
        getUser();
        clearForm();
        alert("Datos actualizados correctamente");
    }).catch(error=>{
      
        alert("No se pudo actualizar los datos");
    })
}

//CONFIRM DELETE
const confirmDeleteUser = (id,tipo) => {
    event.preventDefault();
  
    let res = confirm("Eliminar usuario");
    if (res) deleteUser(id,tipo);
  }
//DELETE
function deleteUser(id,tipo){
    
    console.log(tipo);
    if(tipo == 'Super-Admin'){
        alert("No se puede eliminar al Super-Admin");
    }else{
        axios({
            method:'DELETE',
            url:url+`?id=${id}`,
            responseType:'json',
            
        }).then(res=>{
            console.log(res.data);
            getUser();
            clearForm();
            alert("Datos eliminados correctamente");
        }).catch(error=>{
          
            alert("No se eliminaron los datos");
        })
    }
   
    
}


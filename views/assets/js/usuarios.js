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
    alert=Swal.fire({
        title:"Notifación!",
        text: "Todos los datos son requeridos",
        icon: "warning",
        button:"Ok",
    });
    console.log(user.unidad);
    if(user.nombre ===""|| user.clave===""){
        return alert;
    }
    if(user.unidad === "" || user.tipo===""){
        return alert;
    }
    if(user.clave != user.reclave ){
        return alert=Swal.fire({
            title:"Notifación!",
            text: "Las contraseñas deben ser iguales",
            icon: "warning",
            button:"Ok",
        });
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
        Swal.fire({
            title:"Notifación!",
            text: "Datos agregados correctamente",
            icon: "success",
            button:"Ok",
        })
    }).catch(error=>{
        Swal.fire({
            title:"Notifación!",
            text: "Ocurrio un error",
            icon: "warning",
            button:"Ok",
        })
        console.log(error)
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
        Swal.fire({
            title:"Notifación!",
            text: "Datos actualizados correctamente",
            icon: "success",
            button:"Ok",
        })
    }).catch(error=>{
        Swal.fire({
            title:"Notifación!",
            text: "Ocurrio un error",
            icon: "warning",
            button:"Ok",
        })
        console.log(error)
    }) 
}

//CONFIRM DELETE
const confirmDelete= async function (id,tipo) {
      
    const sweetConfirm = await Swal.fire({
        title: 'Estás seguro de eliminar los datos?',
        text: "No podrás reviertir esta acción !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, elimninar!',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    });
    
   if (sweetConfirm.isConfirmed) deleteAviso(id,tipo);
    
    
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
            Swal.fire({
                title:"Notifación!",
                text: "Datos eliminados correctamente",
                icon: "success",
                button:"Ok",
            })
         }).catch(error=>{
           
             console.log("No se eliminaron los datos"+erro);
             Swal.fire({
                title:"Notifación!",
                text: "Ocurrio un error",
                icon: "warning",
                button:"Ok",
            })
         })
    }
   
    
}


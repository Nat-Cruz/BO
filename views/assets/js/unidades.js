//URL
const url='http://localhost/BO/controller/UnidadController.php';
//TABLE
const tbl=document.querySelector('#tbl');
//BUTTONS
const add= document.querySelector('#add');
//INPUT
const txtid=document.querySelector('#id');
const txtnombre=document.querySelector('#nombre');
const txtdescripcion=document.querySelector('#descripcion');
const nivel = document.querySelector('#nivel');
const btncerrar = document.querySelector('#cerrar');

  function logout(){
    axios({
        method:'GET',
        url:url2,
        responseType:'json'
        
    }).then(res=>{
        tbl.innerHTML="";
        const av=res.data;
        av.forEach(key => {
            
        });
        
    }).catch(erro=>{
        console.error('error al cerrar sesión');
    });
  }
//OBTENER UNIDADES
function getUnidad(){
    axios({
        method:'GET',
        url:url,
        responseType:'json'
        
    }).then(res=>{
        tbl.innerHTML="";
        unidad=res.data;
        unidad.forEach(key => {
            tbl.innerHTML +=`
            <tr>
                <td>${key.id_unidad}</td>
                <td>${key.nombre}</td>
                <td>${key.descripcion}</td>
                <td>
                     <span>
                        <a onclick="autocomplete('${key.id_unidad}',
                                                     '${key.nombre}',
                                                     '${key.descripcion}',
                                                     )"
                            href='#' data-toggle='modal' data-target='.bd-example-modal-lg' data-placement='top' title='Editar'>
                            <i class='fa fa-pencil color-primary m-r-5'></i>
                        </a>
                        <a onclick="confirmDelete('${key.id_unidad}')" href="#" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fa fa-close color-danger"></i>
                  </a>
                    </span>
                </td>   
            </tr>
            `
        });
        
    }).catch(error=>{
        console.error('error al cargar datos');
    });
    }
    getUnidad();
//GET FORM
function getForm(){
    return unidad={
        id : txtid.value,
        nombre : txtnombre.value,
        descripcion : txtdescripcion.value,
    }
}
//VALIDATION FORM
function validateForm(unidad){
    if(unidad.nombre ===""|| unidad.descripcion===""){
        return alert=Swal.fire({
            title:"Notifación!",
            text: "Todos los datos son requeridos",
            icon: "warning",
            button:"Ok",
        });
    }
    
    return null;
}
//CLEAR FORM
const clearForm = (closeModal = false) => {
    frm.reset();
    txtid.value = "0";
  
    if(closeModal) {
      btnClose.click();
    }
  } 
//ADD OR EDIT
const postUnidad = () => {
    event.preventDefault();
    const unidad = getForm();
    const error = validateForm(unidad);
  
    if(error) {
      alert(error);
      return false;
    }
  
    (unidad.id === "0") ? addUnidad(unidad) : editUnidad(unidad);
  }
//AUTOCOMPLETE
const autocomplete = (id,nombre,descripcion) => {
    txtid.value = id;
    txtnombre.value = nombre;
    txtdescripcion.value=descripcion;
 }
  
//ADD
function addUnidad(){
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:unidad
        
    }).then(res=>{
        console.log(res.data);
        getUnidad();
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
function editUnidad(){
    axios({
        method:'PUT',
        url:url,
        responseType:'json',
        data:unidad
        
    }).then(res=>{
        console.log(res.data);
        getUnidad();
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
const confirmDelete= async function (id) {
      
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
    
   if (sweetConfirm.isConfirmed) deleteUnidad(id);
    
    
}
//DELETE
function deleteUnidad(id){
    axios({
         method:'DELETE',
         url:url+`?id=${id}`,
         responseType:'json',
         
     }).then(res=>{
         console.log(res.data);
         getUnidad();
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

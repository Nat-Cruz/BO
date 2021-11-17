//URL
const url='http://10.30.0.28/BO/controller/DescargasController.php';
//TABLE
const tblUsers = document.querySelector('#tbl');
//INPUT
const idDescarga= document.querySelector('#id_descarga');
const idUsuario =document.querySelector('#id_usuario');
const txtnombre= document.querySelector('#nombre');
const txtarchivo= document.querySelector('#archivo');
const txtfecha= document.querySelector('#fecha');
const nivel = document.querySelector('#nivel');
const btncerrar = document.querySelector('#cerrar');

//BUTTONS
const add= document.querySelector('#add');
//FECHA
const formato = new Date();
var dd = formato.getDate();
var mm = formato.getMonth() + 1; //January is 0!
var yyyy = formato.getFullYear();
const fecha = yyyy+'-'+mm+'-'+dd;
console.log(idUsuario.value);

//OBTNER USUARIOS
function getDescargas(){
axios({
    method:'GET',
    url:url,
    responseType:'json'
    
}).then(res=>{
    tbl.innerHTML="";
    const desc=res.data;
    console.log(desc);
    desc.forEach(key => {
        tbl.innerHTML +=`
        <tr>
            <td>${key.id_descargas}</td>
            <td>${key.nombre}</td>
            <td>${key.archivo}</td>
            <td>${key.fecha}</td>

          
            <td>
                 <span>
                    <a onclick="autocomplete('${key.id_descargas}',
                                                 '${key.nombre}',
                                                 '${key.archivo}',
                                                 '${key.feha}',
                                                 '${key.id_usuario}')"
                        href='#' data-toggle='modal' data-target='.bd-example-modal-lg' data-placement='top' title='Editar'>
                        <i class='fa fa-pencil color-primary m-r-5'></i>
                    </a>
                    <a onclick="confirmDelete('${key.id_descargas}')" href="#" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
getDescargas();
//GET FORM
function getForm(){
return obj={
    id : idDescarga.value,
    nombre : txtnombre.value,
    archivo : txtarchivo.value,
    fecha : txtfecha,
    usuario:idUsuario.value
}
}
//VALIDATION FORM
function validateForm(obj){
    if(obj.nombre ===""|| obj.archivo===""){
        return "Todos los campos son obligatorios";
    }
    
    
    return null;
}
//CLEAR FORM
const clearForm = (closeModal = false) => {
    frm.reset();
    idDescarga.value = "0";
  
    if(closeModal) {
      btnClose.click();
    }
  } 
//ADD OR EDIT
const postDescargas = () => {
    event.preventDefault();
    const obj = getForm();
    const error = validateForm(obj);
  
    if(error) {
      alert(error);
      return false;
    }
	console.log("PostAviso :"+obj.id);  
    (obj.id === "0") ? addDescargas() : editDescargas();
  }
//AUTOCOMPLETE
const autocomplete = (id,nombre,archivo,fecha,usuario) => {
    idDescarga.value = id;
    txtnombre.value = nombre;
   // txtarchivo.value = archivo;
    txtfecha.value=fecha;
    idUsuario.value=usuario;
 
  }
//ADD
function addDescargas(){
    
    var file = document.getElementById('archivo');
    var archivo = file.files[0];
    var id = 0;
    var nombre=document.getElementById('nombre');
    var usuario=document.getElementById('id_usuario');
    var form = new FormData;
    form.append('id',id);
    form.append('nombre',nombre.value);
    form.append('archivo',archivo);
    form.append('fecha',fecha);
    form.append('usuario',usuario.value);

    $.ajax({                                         
        url: url,                    
        data: form,
        type: 'POST',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(response){
            console.log(response.data);
		getDescargas();
		 clearForm();
        alert("Datos agregado correctamente");
        },
        error: function(){
            console.log('Error');
        }
    });  
    
}
//EDIT
function editDescargas(){
  
    var file = document.getElementById('archivo');
    var archivo = file.files[0];
    var id = idDescarga.value;
    var nombre=document.getElementById('nombre');
    var usuario=document.getElementById('id_usuario');
    var form = new FormData;
    form.append('id',id);
    form.append('nombre',nombre.value);
    form.append('archivo',archivo);
    form.append('fecha',fecha);
    form.append('usuario',usuario.value);
    
    $.ajax({                                         
        url: url,                    
        data: form,
        type: 'POST',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(response){
            console.log(response.data);
		getDescargas();
		 clearForm();
        alert("Datos actualizados correctamente");
        },
        error: function(){
            console.log('Error');
        }
    });  
    
}

//CONFIRM DELETE
const confirmDelete = (id) => {
    event.preventDefault();
  
    let res = confirm("Eliminar dato");
    if (res) deleteDescargas(id);
  }
//DELETE
function deleteDescargas(id){
   axios({
        method:'DELETE',
        url:url+`?id=${id}`,
        responseType:'json',
        
    }).then(res=>{
        console.log(res.data);
        getDescargas();
        clearForm();
        alert("Datos eliminados correctamente");
    }).catch(error=>{
      
        alert("No se eliminaron los datos");
    })
    
}


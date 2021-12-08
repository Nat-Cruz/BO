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
const tipo = document.querySelector('#tipo');

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

//OBTNER DESCARGAS
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
        if(key.tipo== 1){
            var txttipo ="Boletín";
        }else{
            var txttipo ="Formulario";
        }
        
        tbl.innerHTML +=`
        <tr>
            <td>${key.nombre}</td>
            <td>${key.archivo}</td>
            <td>${txttipo}</td>
            <td>${key.fecha}</td>
            <td>
                 <span>
                    <a onclick="autocomplete('${key.id_descargas}',
                                                 '${key.nombre}',
                                                 '${key.archivo}',
                                                 '${key.tipo}',
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
    tipo:tipo.value,
    fecha : txtfecha,
    usuario:idUsuario.value
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
    if(obj.nombre ==="" || obj.archivo==="" || obj.tipo===""){
       return alert;
        
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
const autocomplete = (id,nombre,archivo,type,fecha,usuario) => {
    idDescarga.value = id;
    txtnombre.value = nombre;
   // txtarchivo.value = archivo;
    tipo.value =type;
    txtfecha.value=fecha;
    idUsuario.value=usuario;
 
  }
//ADD
function addDescargas(){
    
    var file = document.getElementById('archivo');
    var archivo = file.files[0];
    var id = 0;
    var nombre=document.getElementById('nombre');
    var tipo=document.getElementById('tipo');
    var usuario=document.getElementById('id_usuario');
    var form = new FormData;
    form.append('id',id);
    form.append('nombre',nombre.value);
    form.append('archivo',archivo);
    form.append('tipo',tipo.value);
    form.append('fecha',fecha);
    form.append('usuario',usuario.value);
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:form
        
    }).then(res=>{
        console.log(res.data);
        getDescargas();
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
function editDescargas(){
  
    var file = document.getElementById('archivo');
    var tipo=document.getElementById('tipo');
    var archivo = file.files[0];
    var id = idDescarga.value;
    var nombre=document.getElementById('nombre');
    var usuario=document.getElementById('id_usuario');
    var form = new FormData;
    form.append('id',id);
    form.append('nombre',nombre.value);
    form.append('archivo',archivo);
    form.append('tipo',tipo.value);
    form.append('fecha',fecha);
    form.append('usuario',usuario.value);
    
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:form
        
    }).then(res=>{
        console.log(res.data);
        getDescargas();
        clearForm();
        Swal.fire({
            title:"Notifación!",
            text: "Datos modificados correctamente",
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
    
   if (sweetConfirm.isConfirmed) deleteDescargas(id);
    
    
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
        Swal.fire({
            title:"Notifación!",
            text: "Datos eliminados correctamente",
            icon: "success",
            button:"Ok",
        })
    }).catch(error=>{
      
        alert("No se eliminaron los datos");
    })
    
}


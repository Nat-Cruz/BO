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
        alert("Dato agregado correctamente");
    }).catch(error=>{
      
        alert("No se pudo registar ");
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
    form.append('tipo',tipo.value);
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
        alert("Dato agregado correctamente");
    }).catch(error=>{
      
        alert("No se pudo registar ");
        console.log(error)
    })  
    
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


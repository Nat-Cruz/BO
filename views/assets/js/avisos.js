//URL
const url='http://10.30.0.28/BO/controller/AvisoController.php';

//TABLE
const tbl=document.querySelector('#tbl');
//INPUT
const txtid=document.querySelector('#id');
const txtnombre=document.querySelector('#nombre');
const txtdescripcion=document.querySelector('#descripcion');
const txtfechaI=document.querySelector('#fechaI');
const txtfechaF=document.querySelector('#fechaF');
const archivo=document.querySelector('#archivo');
const img=document.querySelector('#imagen');
const slcestado=document.querySelector('#estado');
const slctipo=document.querySelector('#tipo');
const txtunidad = document.querySelector('#id_unidad');
const nivel = document.querySelector('#nivel');

const btncerrar = document.querySelector('#cerrar');
//BUTTONS
const add= document.querySelector('#add');
const keyUnidad =txtunidad.value;
console.log(keyUnidad);
console.log(txtid.value);
//OBETER AVISOS
function getAviso(){
    
    axios({
        method:'GET',
        url:url+`?id=`+keyUnidad,
        responseType:'json'
        
    }).then(res=>{
        tbl.innerHTML="";
        const av=res.data;
        console.log(av);
        av.forEach(key => {
            if(key.id_tipo_aviso== 1){
                var txttipo = "Aviso";
            }else{
                var txttipo ="Memorándum";
            }
            if(key.estado== 0){
                var estado = "Urgente";
            }else{
                var estado ="General";
            }
            
            tbl.innerHTML +=`
            <tr>
                <td>${key.id_aviso}</td>
                <td>${key.nombre}</td>
                <td>${key.imagen}</td>
                <td>${key.archivo}</td>
                <td>${key.descripcion}</td>
                <td>${estado}</td> 
                <td>${key.fecha_inicio}</td> 
                <td>${key.fecha_fin}</td> 
                <td>${txttipo}</td> 
                <td>${key.unidad}</td> 
                <td>
                     <span>
                        <a onclick="autocomplete('${key.id_aviso}',
                                                     '${key.nombre}',
                                                     '${key.archivo}',
                                                     '${key.descripcion}',
                                                     '${key.estado}',
                                                     '${key.fecha_inicio}',
                                                     '${key.fecha_fin}',
                                                     '${key.id_tipo_aviso}',
                                                     '${key.unidad}')"
                            href='#' data-toggle='modal' data-target='.bd-example-modal-lg' data-placement='top' title='Editar'>
                            <i class='fa fa-pencil color-primary m-r-5'></i>
                        </a>
                        <a onclick="confirmDelete('${key.id_aviso}')" href="#" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fa fa-close color-danger"></i>
                  </a>
                    </span>
                </td>   
            </tr>
            `
        });
        
    }).catch(erro=>{
        console.log('error al cargar datos'+txtunidad.value);
    });
    }
getAviso();
//GET FORM
function getForm(){
    
    return aviso={
        id : txtid.value,
        nombre : txtnombre.value,
        imagen : img.files[0],
        archivo : archivo.files[0],
        descripcion : txtdescripcion.value,
        estado: slcestado.value,
        fechaI :txtfechaI.value,
        fechaF : txtfechaF.value,
        tipo: slctipo.value,
        unidad: txtunidad.value
       
    
    }
}   
//VALIDATION FORM
function validateForm(aviso){
    if(aviso.nombre ===""||  aviso.descripcion===""){
        return "Todos los campos son obligatorios";
    }
    if(aviso.tipo === "0" || aviso.estado==="0"){
        return "Debe seleccionar una opcion";
    }
    if(aviso.fechaI===""|| aviso.fechaF ===""){
        return "Los campos fechas son obligatorios";
    }
    if(aviso.fechaI > aviso.fechaF ){
        return "Las fechas de fin esta incorrecta";
    }
    if(!aviso.imagen){
        return "Todos los campos son obligatorios";
    }
    if(!aviso.archivo){
        return "Todos los campos son obligatorios";
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
//AUTOCOMPLETE
const autocomplete = (id,nombre,imagen,descripcion,estado,fechaI,fechaF,tipo,unidad) => {
    txtid.value = id;
    txtnombre.value = nombre;
    txtdescripcion.value=descripcion;
    slcestado.value = estado;
    txtfechaI.value=fechaI;
    txtfechaF.value=fechaF;
    slctipo.value=tipo;
    txtunidad.value=unidad;
    img.value = imagen;
    archivo.value = imagen;
  }
  const postAviso = () => {
    event.preventDefault();
  const aviso = getForm();
   const error = validateForm(aviso);
  
    if(error) {
      alert(error);
      return false;
    }
	console.log(aviso.id);  
    (aviso.id === "0") ? addAviso() : editAviso();
  }
//ADD
function addAviso(){
    var doc = document.getElementById('archivo');
    var img = document.getElementById('imagen');
    var imagen = img.files[0];
    var archivo = doc.files[0];
    var id=0;
    var nombre= document.getElementById('nombre');
    var descripcion=document.getElementById('descripcion');
    var estado=document.getElementById('estado');
    var fechaI=document.getElementById('fechaI');
    var fechaF=document.getElementById('fechaF');
    var tipo= document.getElementById('tipo');
    var unidad=document.getElementById('id_unidad');
    
    var form = new FormData();
     form.append('result','result');
     form.append('archivo',archivo);
     form.append('imagen',imagen);
     form.append('id',id);
     form.append('nombre',nombre.value);
     form.append('descripcion',descripcion.value);
     form.append('estado',estado.value);
     form.append('fechaI',fechaI.value);
     form.append('fechaF',fechaF.value);
     form.append('tipo',tipo.value);
     form.append('unidad',unidad.value);
     $.ajax({                                         
        url: url,                    
        data: form,
        type: 'POST',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(response){
            console.log(response.data);
		getAviso();
		clearForm();
        alert("Datos agregado correctamente");
        },
        error: function(){
            console.log('Error');
        }
    });  
 
 }
//EDIT
function editAviso(){
    var doc = document.getElementById('archivo');
    var img = document.getElementById('imagen');
    var imagen = img.files[0];
    var archivo = doc.files[0];
    var id=document.getElementById('id');
    var nombre= document.getElementById('nombre');
    var descripcion=document.getElementById('descripcion');
    var estado=document.getElementById('estado');
    var fechaI=document.getElementById('fechaI');
    var fechaF=document.getElementById('fechaF');
    var tipo= document.getElementById('tipo');
    var unidad=document.getElementById('id_unidad');
     
    var form = new FormData();
    form.append('result','result');
    form.append('archivo',archivo);
    form.append('imagen',imagen);
    form.append('id',id.value);
    form.append('nombre',nombre.value);
    form.append('descripcion',descripcion.value);
    form.append('estado',estado.value);
    form.append('fechaI',fechaI.value);
    form.append('fechaF',fechaF.value);
    form.append('type',archivoType);
    form.append('tipo',tipo.value);
    form.append('unidad',unidad.value);
     $.ajax({                                         
        url: url,                    
        data: form,
        type: 'POST',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(response){
            console.log(response.data);
		getAviso();
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
  
    let res = confirm("¿Desea eliminar aviso?");
    if (res) deleteAviso(id);
  }
//DELETE
function deleteAviso(id){
    axios({
         method:'DELETE',
         url:url+`?id=`+id,
         responseType:'json',
         
     }).then(res=>{
        console.log(res.data);
         getAviso();
         clearForm();
         alert("Datos eliminados correctamente");
     }).catch(error=>{
       
         console.log("No se eliminaron los datos"+error);
     })
     
 }


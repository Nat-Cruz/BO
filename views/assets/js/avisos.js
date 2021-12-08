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
var keyUnidad ="";
keyUnidad =txtunidad.value;
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
    var img = document.getElementById('imagen');
    var imagen = img.files[0];
    alert=Swal.fire({
        title:"Notifación!",
        text: "Todos los datos son requeridos",
        icon: "warning",
        button:"Ok",
    });
    if(aviso.nombre ===""||  aviso.descripcion===""){
        return alert;

    }
    if(aviso.tipo === "" || aviso.estado===""){
        return alert;

    }
    if(aviso.fechaI===""|| aviso.fechaF ===""){
        return alert;

    }
    if(aviso.fechaI > aviso.fechaF ){
        return alert=Swal.fire({
            title:"Notifación!",
            text: "Las fechas de finalización son incorrectas",
            icon: "warning",
            button:"Ok",
        });
    }
    
    if(!aviso.imagen){
        return alert;

    }
    if(!aviso.archivo){
        return alert;

    }
    if(!(/\.(jpg|png|gif)$/i).test(imagen.name)){
        return alert=Swal.fire({
            title:"Notifación!",
            text: "Comprueba la extensión de tus imágenes, recuerda que los formatos aceptados son .gif, .jpeg, .jpg y .png",
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
    axios({
       method:'POST',
       url:url,
       responseType:'json',
       data:form
       
   }).then(res=>{
       console.log(res.data);
       getAviso();
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
    axios({
        method:'POST',
        url:url,
        responseType:'json',
        data:form
        
    }).then(res=>{
        console.log(res.data);
        getAviso();
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
        if (sweetConfirm.isConfirmed) deleteAviso(id);
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


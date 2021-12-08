//URL
const url = "http://10.30.0.28/BO/controller/consultasController.php?unidad=";
//TABLE
const tbl = document.querySelector('#tbl');

//INPUT
const idDescarga= document.querySelector('#id_descarga');
const idUsuario =document.querySelector('#id_usuario');
const txtnombre= document.querySelector('#nombre');
const txtarchivo= document.querySelector('#archivo');
const txtfecha= document.querySelector('#fecha');
const nivel = document.querySelector('#nivel');
const tipo = document.querySelector('#tipo');
const unidad  =document.querySelector('#id_unidad');
const btncerrar = document.querySelector('#cerrar');
const keyUnidad =unidad.value;
function getDescargas(){
    axios({
        method:'GET',
        url:url+keyUnidad,
        responseType:'json'
        
    }).then(res=>{
        tbl.innerHTML="";
        const desc=res.data;
        console.log(desc);
        desc.forEach(key => {
            if(key.tipo == 1){
                var txttipo ="Boletín";
                console.log(key.tipo);
                tbl.innerHTML +=`
                <div class="card mb-3" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-3 mt-0">
                      <img src="./images/44boletin-informativo.png"  class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"> <td>${key.titulo}</td></h5>
                            
                            <p class="card-text"><small class="text-muted"><td>${key.fecha}</td></small></p>
                        </div>
                       
                    </div>
                    <div class="col-md-2" id="btn">
                            <a class='btn btn-success' href='http://10.30.0.28/BO/views/archivos/${key.archivo}' target='_blank' title='ver'><i class="fas fa-eye color-secondary" m-r-5></i></a>
                        </div>
                </div>
            </div>
            
            `
            }else if(key.tipo == 2){
                console.log(key.tipo);
                var txttipo ="Formulario";
                tbl.innerHTML +=`
            <div class="card mb-3" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-3 mt-0">
                      <img src="./images/361formulario.png"  class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"> <td>${key.titulo}</td></h5>
                            
                            <p class="card-text"><small class="text-muted"><td>${key.fecha}</td></small></p>
                        </div>
                       
                    </div>
                    <div class="col-md-2" id="btn">
                            <a class='btn btn-success' href='http://10.30.0.28/BO/views/archivos/${key.archivo}' target='_blank' title='ver'><i class="fas fa-eye color-secondary" m-r-5></i></a>
                        </div>
                </div>
            </div>
            
            `
            }
            
            
        });
        
    }).catch(erro=>{
        console.error('error al cargar datos');
    });
    }
    getDescargas();

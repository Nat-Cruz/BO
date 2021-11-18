//URL
const url='http://10.30.0.28/BO/controller/consultasController.php?';
const av =document.querySelector('#avisos');
const memo =document.querySelector('#memu');
const nombre = document.querySelector('#titulo');
const memu =document.querySelector('#memu');
const modal= document.querySelector('#modal')


//GET TARJETAS
function getAvisos(){
    axios({
        method:'GET',
        url: url+`res=tarjetas`,
        responseType:'json' 
    }).then(res=>{
        
        av.innerHTML="";
        div =res.data;
        console.log(res.data)
        div.forEach(key => {
             if(key.tipoArchivo=="imagen"){
                av.innerHTML+=`
                <div class="card mb-3"  id="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./images/${key.imagen}"  class='card-img-top img-fluid' id="img" alt='Card image cap'>
                        </div>
                        <div class="col-md-6">
                            <h5 class='card-title' id="titulo">${key.nombre}</h5>
                            <p class='card-text'id="descripcion">${key.descripcion}
                            <br><small id="fecha">Inicia : ${key.fecha_inicio} Finaliza : ${key.fecha_fin}</small>
                            </p>
                            
                        </div>
                        <div class="col-md-2 mt-5">
                        <button type="submit" class="btn btn-success" onclick="autocomplete('${key.nombre}',
                        '${key.archivo}','${key.descripcion}','${key.fecha_inicio}','${key.fecha_fin}');" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye color-secondary" m-r-5></i> Ver</button>
                        </div>
                    </div>    
                </div>
                `
             }else{
                av.innerHTML+=`
                <div class="card mb-3"  id="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./images/${key.imagen}"  class='card-img-top img-fluid' id="img" alt='Card image cap'>
                    </div>
                    <div class="card-body">
                        <h5 class='card-title' id="titulo">${key.nombre}</h5>
                        <p class='card-text'id="descripcion">${key.descripcion}
                        <br><small id="fecha">Inicia : ${key.fecha_inicio} Finaliza : ${key.fecha_fin}</small>
                        </p>
                        
                    </div>
                    <div class="col-md-2 mt-5">
                    <button type="submit" class="btn btn-success" onclick="autocompleteArchivo('${key.nombre}',
                    '${key.archivo}','${key.descripcion}','${key.fecha_inicio}','${key.fecha_fin}')" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye color-secondary" m-r-5></i> Ver</button>
                    </div>
                </div>    
            </div>
                `
             }
            
            
        });
    }).catch(error=>{
        console.error(error);});
}
function getMemu(){
    axios({
        method:'GET',
        url: url+`res=memu`,
        responseType:'json' 
    }).then(res=>{
        
        memu.innerHTML="";
        div =res.data;
        console.log(res.data)
        div.forEach(key => {
             if(key.tipoArchivo=="imagen"){
                memu.innerHTML+=`
                <div class="card mb-3"  id="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./images/${key.imagen}"  class='card-img-top img-fluid' id="img" alt='Card image cap'>
                        </div>
                        <div class="col-md-6">
                            <h5 class='card-title' id="titulo">${key.nombre}</h5>
                            <p class='card-text'id="descripcion">${key.descripcion}
                            <br><small id="fecha">Inicia : ${key.fecha_inicio} Finaliza : ${key.fecha_fin}</small>
                            </p>
                            
                        </div>
                        <div class="col-md-2 mt-5">
                        <button type="submit" class="btn btn-success" onclick="autocomplete('${key.nombre}',
                        '${key.archivo}','${key.descripcion}','${key.fecha_inicio}','${key.fecha_fin}');" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye color-secondary" m-r-5></i> Ver</button>
                        </div>
                    </div>    
                </div>
                `
             }else{
                memu.innerHTML+=`
                <div class="card mb-3"  id="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./images/${key.imagen}" class='card-img-top img-fluid' id="img" style='heigth=10rem'; alt='Card image cap'>
                    </div>
                    <div class="col-md-6">
                        <h5 class='card-title' id="titulo">${key.nombre}</h5>
                        <p class='card-text'id="descripcion">${key.descripcion}
                        <br><small id="fecha">Inicia : ${key.fecha_inicio} Finaliza : ${key.fecha_fin}</small>
                        </p>
                    
                     </div>
                    <div class="col-md-2 mt-5">
                    <button type="submit" class="btn btn-success" onclick="autocompleteArchivo('${key.nombre}',
                    '${key.archivo}','${key.descripcion}','${key.fecha_inicio}','${key.fecha_fin}')" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye color-secondary" m-r-5></i> Ver</button>
                    </div>
                </div>    
            </div>
                `
             }
            
            
        });
    }).catch(error=>{
        console.error(error);});
}


getAvisos();
getMemu();
function autocomplete(titulo,archivo,descripcion,fecha_inicio,fecha_fin){
    modal.innerHTML="";
    modal.innerHTML =`
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="fondo">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo">${titulo}</label></h5>
                </div>  
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12" >
                            <h5 class="card-title text-center text-Dark" id="titulo" ></h5>
                            <img src="./images/${archivo}"  class='card-img-top img-fluid' alt='Card image cap'>
                            <p class='card-text' id="descripcion">${descripcion}
                            <br><small id="fecha">Inicia : ${fecha_inicio} Finaliza : ${fecha_fin}</small></p>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>                                                  
                                </div>
                                </div>
                            </div>
                    </div>    
                </div>
            </div>
        </div>
    </div> `;
 
}
function autocompleteArchivo(titulo,archivo,descripcion,fecha_inicio,fecha_fin){
    modal.innerHTML="";
    modal.innerHTML =`
    <div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="fondo">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo">${titulo}</label></h5>
                </div>  
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12" >
                            <div class="card-body">
                            <h5 class="card-title text-center text-Dark" id="titulo" value=""></h5>
                            <p class='card-text'id="descripcion">${descripcion}
                            <iframe src="./archivos/${archivo}" width="100%" height="500" style="border:none;">
                            </iframe>
                            <br><small id="fecha">Inicia : ${fecha_inicio} Finaliza : ${fecha_fin}</small></p>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>                                                  
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    `;
 
}

<div class="content">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table class="table table-border table-hover table-striped">
                                <thead>
                                    <div class="text-md-2 mt-2 mt-md-2">
                                        <ol class="breadcrumb m-3">
                                            <li class="breadcrumb-item"><a href="">Conexion agraria</a></li>
                                            <li class="breadcrumb-item"><a href="">Usuarios</a></li>
                                            <li class="breadcrumb-item active">Administradores</li>
                                        </ol>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-8">
                                                            <form class="d-flex flex-wrap align-items-center">
                                                                <label for="" class="visually-hidden">buscar</label>
                                                                <div class="me-3">
                                                                    <input type="search"
                                                                        class="form-control my-2 my-md-2" id=""
                                                                        placeholder="buscar..."></input>
                                                                    <div class="col-md-4">
                                                                        <div class="text-md-2 mt-2 mt-md-2">
                                                                            <a href="?c=admins&m=create"
                                                                                class="btn btn-dark">Crear administrador</a>                                                                               
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </thead>
                        <tbody>   
                          <div class="table-responsive mt-1 md-1">
                            <table class="table table-border table-hover table-striped">
                                <thead>
                                    <tr >
                                        <th class="text-center">ID</th>
                                        <th class="text-center">NOMBRES APELLIDOS</th>
                                        <th class="text-center">TIPO DE DOCUMENTO</th>
                                        <th class="text-center">No DE DOCUMENTO</th>
                                        <th class="text-center">TELEFONO</th>
                                        <th class="text-center">CORREO</th>   
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">ROLES</th>
                                        <th class="text-center" width="260">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1;$i<2;$i++){   ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td>Diego Forero</td>                     
                                        <td>C.C</td>
                                        <td>080004524</td> 
                                        <td>3104448615</td>
                                        <td>diegoforero@gmail.com</td>                                      
                                        <td>ACTIVO</td>
                                        <td>Desarrollador</td>
                                        <td> 

                                             <a href="?c=admins&m=edit" class="btn btn-sm btn-dark">Editar</a>
                                             <a href="?c=admins&m=show" class="btn btn-sm btn-dark">Detalles</a>   
                                             <button class="btn btn-sm btn-danger mb-1 mt-1" onclick="NotificacionEliminar();">Eliminar</button>
                                        </td>
                                             
                                    </tr>                                      
                                    <?php } ?>
                                    <?php for($i=2;$i<3;$i++){   ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td>Ivan Herrera</td>  
                                        <td>C.C</td>
                                        <td>8044444</td>  
                                        <td>31105502354</td>
                                        <td>ivanherrera@gmail.com</td>
                                        <td>ACTIVO</td>
                                        <td>Administrador</td>
                                        <td> 
                                             <a href="?c=admins&m=edit" class="btn btn-sm btn-dark">Editar</a>                     
                                             <a href="?c=admins&m=show" class="btn btn-sm btn-dark">Detalles</a> 
                                             <button class="btn btn-sm btn-danger mb-1 mt-1" onclick="NotificacionEliminar();">Eliminar</button>  
                                        </td>
                                             
                                    </tr>  
                                    <?php } ?>
                                    <?php for($i=3;$i<4;$i++){   ?>
                                    <tr>
                                    <td><?php echo $i ?></td>
                                        <td>Amaury pinto</td>
                                        <td>C.C</td>
                                        <td>4284634634</td>
                                        <td>1446678432</td>
                                        <td>amaurypinto@gmail.com</td>
                                        <td>ACTIVO</td>
                                        <td>arquitecto</td> 
                                        <td> 
                                             <a href="?c=admins&m=edit" class="btn btn-sm btn-dark">Editar</a>   
                                             <a href="?c=admins&m=show" class="btn btn-sm btn-dark">Detalles</a>
                                             <button class="btn btn-sm btn-danger mb-1 mt-1" onclick="NotificacionEliminar();">Eliminar</button>   
                                        </td>    
                                             
                                    </tr>  
                                    <?php } ?>                                   
                                    <?php for($i=4;$i<5;$i++){   ?>
                                    <tr>
                                    <td><?php echo $i ?></td>
                                        <td>Maira Medina</td>
                                        <td>C.C</td>
                                        <td>5464132486</td>
                                        <td>2415434545</td>
                                        <td>mairamedina@gmail.com</td>
                                        <td>ACTIVO</td>
                                        <td>Desarrollador</td> 
                                        <td> 
                                             <a href="?c=admins&m=edit" class="btn btn-sm btn-dark">Editar</a>      
                                             <a href="?c=admins&m=show" class="btn btn-sm btn-dark">Detalles</a>   
                                             <button class="btn btn-sm btn-danger mb-1 mt-1" onclick="NotificacionEliminar();">Eliminar</button>
                                        </td> 
                                                               
                                            
                                    </tr>
                                    <?php } ?>
                                    <?php for($i=5;$i<6;$i++){   ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td>Ricardo Castro</td>
                                        <td>C.C</td>
                                        <td>80324531</td>
                                        <td>31064411233</td>
                                        <td>ricardocasttro@gmail.com</td>
                                        <td>ACTIVO</td>
                                        <td>administrador</td>
                                        <td> 
                                             <a href="?c=admins&m=edit" class="btn btn-sm btn-dark">Editar</a>  
                                             <a href="?c=admins&m=show" class="btn btn-sm btn-dark">Detalles</a>  
                                             <button class="btn btn-sm btn-danger mb-1 mt-1" onclick="NotificacionEliminar();">Eliminar</button> 
                                        </td>                                          
                                     </tr>   
                                     <?php } ?>
                                </tbody>
                            </table>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-end">
                                            <ul class="pagination pagination-rounded justify-content-end">
                                                <li class="page-item">
                                                    <span aria-hidden="true">«</span>
                                                    <span class="visually-hidden">Previous</span>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>
                            
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Clientes</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Rut</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Direccion</th>
						<th>Comuna</th>
						<th>Ciudad</th>
						<th>Correo</th>
						<th>Telefono</th>
						<th>Creado En</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($clientes as $c){ ?>
                    <tr>
						<td><?php echo $c['rut']; ?></td>
						<td><?php echo $c['nombre']; ?></td>
						<td><?php echo $c['apellido']; ?></td>
						<td><?php echo $c['direccion']; ?></td>
						<td><?php echo $c['comuna']; ?></td>
						<td><?php echo $c['ciudad']; ?></td>
						<td><?php echo $c['correo']; ?></td>
						<td><?php echo $c['telefono']; ?></td>
						<td><?php echo $c['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$c['rut']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('cliente/remove/'.$c['rut']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>

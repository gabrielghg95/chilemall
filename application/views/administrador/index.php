<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Administradores</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('administrador/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
                        <th>Correo</th>
						<th>Creado En</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($administradores as $a){ ?>
                    <tr>
						<td><?php echo $a['nombre']; ?></td>
						<td><?php echo $a['correo']; ?></td>
						<td><?php echo $a['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('administrador/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('administrador/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
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

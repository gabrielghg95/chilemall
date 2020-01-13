<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Ordenes</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('orden/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Producto</th>
						<th>Cliente</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Creado En</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($ordenes as $o){ ?>
                    <tr>
						<td><?php echo $o['producto_fk']; ?></td>
						<td><?php echo $o['cliente_fk']; ?></td>
						<td><?php echo $o['cantidad']; ?></td>
						<td>$<?php echo number_format($o['precio'], 0, ".", "."); ?></td>
						<td><?php echo $o['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('orden/edit/'.$o['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('orden/remove/'.$o['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
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

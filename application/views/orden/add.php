<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Orden</h3>
            </div>
            <?php echo form_open('orden/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="producto_fk" class="control-label">Producto</label>
						<div class="form-group">
							<select name="producto_fk" class="form-control">
								<option value="">select producto</option>
								<?php 
								foreach($all_productos as $producto)
								{
									$selected = ($producto['id'] == $this->input->post('producto_fk')) ? ' selected="selected"' : "";

									echo '<option value="'.$producto['id'].'" '.$selected.'>'.$producto['nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_fk" class="control-label">Cliente</label>
						<div class="form-group">
							<select name="cliente_fk" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['rut'] == $this->input->post('cliente_fk')) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['rut'].'" '.$selected.'>'.$cliente['rut'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cantidad" class="control-label">Cantidad</label>
						<div class="form-group">
							<input type="text" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="precio" class="control-label">Precio</label>
						<div class="form-group">
							<input type="text" name="precio" value="<?php echo $this->input->post('precio'); ?>" class="form-control" id="precio" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i>Guardar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
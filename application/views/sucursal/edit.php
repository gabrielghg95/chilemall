<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Sucursal</h3>
            </div>
			<?php echo form_open_multipart('sucursal/edit/'.$sucursal['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $sucursal['nombre']); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $sucursal['direccion']); ?>" class="form-control" id="direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="local_fk" class="control-label">Local</label>
						<div class="form-group">
							<select name="local_fk" class="form-control">
								<option value="">Seleccionar un Local</option>
								<?php 
								foreach($all_locales as $local)
								{
									$selected = ($local['id'] == $producto['local_fk']) ? ' selected="selected"' : "";

									echo '<option value="'.$local['id'].'" '.$selected.'>'.$local['nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagen" class="control-label">Imagen</label>
						<div class="form-group">
							<input type="file" name="file" value="<?php echo ($this->input->post('imagen') ? $this->input->post('imagen') : $sucursal['imagen']); ?>" class="form-control" id="imagen" />
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
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Cliente</h3>
            </div>
            <?php echo form_open('cliente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="apellido" class="control-label">Apellido</label>
						<div class="form-group">
							<input type="text" name="apellido" value="<?php echo $this->input->post('apellido'); ?>" class="form-control" id="apellido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="direccion" value="<?php echo $this->input->post('direccion'); ?>" class="form-control" id="direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="comuna" class="control-label">Comuna</label>
						<div class="form-group">
							<input type="text" name="comuna" value="<?php echo $this->input->post('comuna'); ?>" class="form-control" id="comuna" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ciudad" class="control-label">Ciudad</label>
						<div class="form-group">
							<input type="text" name="ciudad" value="<?php echo $this->input->post('ciudad'); ?>" class="form-control" id="ciudad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="correo" class="control-label">Correo</label>
						<div class="form-group">
							<input type="text" name="correo" value="<?php echo $this->input->post('correo'); ?>" class="form-control" id="correo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="text" name="telefono" value="<?php echo $this->input->post('telefono'); ?>" class="form-control" id="telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="creado_en" class="control-label">Creado En</label>
						<div class="form-group">
							<input type="text" name="creado_en" value="<?php echo $this->input->post('creado_en'); ?>" class="form-control" id="creado_en" />
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
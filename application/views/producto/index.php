<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Productos</h3>
                <div class="box-tools">
                    <form action="<?php echo site_url('search/search_keyword2'); ?>" method="post">
                        <select name="categoriaseleccionada" style="height: 32px;">
                            <option value="" selected>Todas las categorías</option>
                            <?php
                            if (!empty($all_categorias)) {
                                foreach ($all_categorias as $categoria => $value) {
                                    echo '<option value="' . $all_categorias[$categoria]['nombre'] . '">' . $all_categorias[$categoria]['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <select name="localseleccionado" style="height: 32px;">
                            <option value="" selected>Todas los Locales</option>
                            <?php
                            if (!empty($all_locales)) {
                                foreach ($all_locales as $local => $value) {
                                    echo '<option value="' . $all_locales[$local]['nombre'] . '">' . $all_locales[$local]['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="text" name="keyword" placeholder="Busca aqui">
                        <button type="submit" value="Search"><i style="color: white" class="fa fa-search"></i></button>
                        <a href="<?php echo site_url('producto/add'); ?>" class="btn btn-success btn-sm">Agregar Producto</a>
                    </form>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Local</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Creado En</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($productos as $p) { ?>
                        <tr>
                            <td><?php echo $p['nombre']; ?></td>
                            <td><?php echo $p['descripcion']; ?></td>
                            <td>$<?php echo number_format($p['precio'], 0, ".", "."); ?></td>
                            <td><img src="<?php echo base_url($p['marca']); ?>" height="100" width="150" /></td>
                            <td><?php echo $p['categoria']; ?></td>
                            <td><?php echo $p['local']; ?></td>
                            <td><?php echo $p['stock']; ?></td>
                            <td><img src="<?php echo base_url($p['imagen']); ?>" height="100" width="150" /></td>
                            <td><?php echo $p['creado_en']; ?></td>
                            <td>
                                <a href="<?php echo site_url('producto/edit/' . $p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a>
                                <a href="<?php echo site_url('producto/remove/' . $p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
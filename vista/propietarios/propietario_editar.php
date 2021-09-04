<h1 class="page-header">
    <?php echo $propietario->id != null ? $propietario->nombres: 'Registrar propietario'; ?>
</h1>

<ul>
    <li><a href="?p=propietario">Propietario</a></li>
    <li class="activo"><?php echo $propietario->id != null ? $propietario->nombres: 'Registrar propietario'; ?></li>
</ul>
<form id="frm propietario" action="?p=propietario&a=Guardar" method="post" enctype="multipart/form data">
    <input type="hidden" name="id" value="<?php echo $propietario->id; ?>" />
    <div class="form-group">
        <label>Identificación</label>
        <input type="text" name="doc" value="<?php echo $propietario->identificacion; ?>" class="form-control"
        placeholder="Ingrese su identificación" required>
    </div>
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombre" value="<?php echo $propietario->nombres; ?>" class="form-control"
        placeholder="Ingrese su nombre" required>
    </div>
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellido" value="<?php echo $propietario->apellidos; ?>" class="form-control"
        placeholder="Ingrese sus apellidos" required>
    </div>
    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono" value="<?php echo $propietario->telefono; ?>" class="form-control"
        placeholder="Ingrese su telefono" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="correo" value="<?php echo $propietario->email; ?>" class="form-control"
        placeholder="Ingrese su correo" required>
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?php echo $propietario->direccion; ?>" class="form-control"
        placeholder="Ingrese su direccion" required>
    </div>
    
    <div class="form-group">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('frm-propietario').submit(function(){
            return $(this).validate();
        })
    })
</script>
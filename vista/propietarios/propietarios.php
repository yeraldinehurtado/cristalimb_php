<a class="btn btn-primary pull-right" href="?p=propietario&a=Crud">Registrar propietario</a>

<br><br><br>

<table class="table table-stripped table-hover" id="tabla">
    <thead>
        <tr>
            <th style="width=180px; background-color: #06c2fa; color:#fff">Identificación</th>
            <th style="width=180px; background-color: #06c2fa; color:#fff">Nombres</th>
            <th style="background-color: #06c2fa; color:#fff">Apellidos</th>
            <th style="background-color: #06c2fa; color:#fff">Telefono</th>
            <th style="width=190px; background-color: #06c2fa; color:#fff">Email</th>
            <th style="width=190px; background-color: #06c2fa; color:#fff">Dirección</th>
            <th style="width=60px; background-color: #06c2fa; color:#fff"></th>
            <th style="width=60px; background-color: #06c2fa; color:#fff"></th>

        </tr>
    </thead>
<tbody>
<?php foreach($this->model->Listar() as $r): ?>
<tr>
    <td><?php echo $r->identificacion; ?></td>
    <td><?php echo $r->nombres; ?></td>
    <td><?php echo $r->apellidos; ?></td>
    <td><?php echo $r->telefono; ?></td>
    <td><?php echo $r->email; ?></td>
    <td><?php echo $r->direccion; ?></td>
    <td>
        <a class="btn btn-warning" href="?p=propietario&a=Crud&id=<?php echo  $r->id; ?>">Editar</a>
    </td>
    <td>
        <a class="btn btn-danger" onclick="javascript:return confirm('¿seguro de eliminar este registro'); 
        "href="?p=propietario&a=Eliminar&id=<?php echo  $r->id; ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script src="vista/bootstrap/js/datatable.js"></script>
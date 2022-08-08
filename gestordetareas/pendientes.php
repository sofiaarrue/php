<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Pendientes</title>
</head>

<body>
    <section>
        <?php if (count($aTareas) != 0) : ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea) : ?>
                                <tr>
                                    <td><?php echo $pos; ?></td>
                                    <td><?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="index.php?id=<?php echo $pos ?>&do=editar" class="btn btn-secondary d-inline"><i class="bi bi-pencil-square"></i></a>
                                        <a href="index.php?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger d-inline"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
</body>

</html>
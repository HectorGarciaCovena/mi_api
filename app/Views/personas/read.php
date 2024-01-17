<!-- Views/read.php -->

<h2>Read records</h2>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $record['id'] ?></td>
                <td><?= $record['nombre'] ?></td>
                <td><?= $record['apellido'] ?></td>
                <td><?= $record['edad'] ?></td>
                <td><?= $record['correo'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

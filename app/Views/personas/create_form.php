<h2>Create a new record</h2>

<form action="<?= site_url('rest-personas/create') ?>" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required>
    <br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" required>
    <br>
    <label for="correo">Correo:</label>
    <input type="email" name="correo" required>
    <br>
    <button type="submit">Agregar</button>
</form>

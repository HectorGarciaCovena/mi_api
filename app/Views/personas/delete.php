<!-- Views/delete.php -->

<h2>Delete a record</h2>

<form action="<?= site_url('rest-personas/delete') ?>" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" required>
    <br>
    <button type="submit">Eliminar</button>
</form>

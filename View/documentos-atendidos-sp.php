<?php
    $id_dir = $_POST['id_dir'];


?>
<script src="../js/table-at.js"></script>

<div id="contenedor">
    <link rel="stylesheet" href="../css/m-tabla.css">
    <div>
        <input type="text" value="<?php echo $id_dir ?>" id="id_dir" disabled>
    </div>
    <div id="m-tabla">
        <table id="table-at-dir" class="table table-sm table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>No. Oficio</th>
                <th>Folio</th>
                <th>Folio respuesta</th>
                <th>Fecha respuesta</th>
                <th></th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
</div>
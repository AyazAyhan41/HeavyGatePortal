<table class="table datatable-colvis-group">
    <thead>
    <tr>
        <th>SITE</th>
        <th>STOK KODU</th>
        <th>STOK ACIKLAMA</th>
        <th>EMNIYET STOK</th>
        <th>ELDEKI MIKTAR</th>
        <th>REZERVE MIKTAR</th>
        <th>KULLANILABILIR MIKTAR</th>
        <th>MIN LOT BUYUKLUGU</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = oci_fetch_array($veri, OCI_BOTH+OCI_ASSOC+OCI_RETURN_LOBS)) {
    ?>
    <tr>
        <td><?= $row['SITE'] ?></td>
        <td><?= $row['STOK_KODU'] ?></td>
        <td><?= $row['STOK_ACIKLAMA'] ?></td>
        <td><?= $row['EMNIYET_STOK'] ?></td>
        <td><?= $row['ELDEKI_MIKTAR'] ?></td>
        <td><?= $row['REZERVE_MIKTAR'] ?></td>
        <td><?= $row['KULLANILABILIR_MIK'] ?></td>
        <td><?= $row['MIN_LOT_BUYUKLUGU'] ?></td>

    </tr>
    <?php } ?>
    </tbody>
</table>
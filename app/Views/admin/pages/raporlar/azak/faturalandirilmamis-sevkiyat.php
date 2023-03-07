<table class="table datatable-colvis-group">
    <thead>
    <tr>
        <th>SEVK NO</th>
        <th>FIILI SEVK TARIHI</th>
        <th>IRSALIYE TARIHI</th>
        <th>MUSTERI NO</th>
        <th>MUSTERI ADI</th>
        <th>MATBU İRSALIYE NO</th>
        <th>TUTAR BILGISI</th>
        <th>PARA BIRIMI</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = oci_fetch_array($veri, OCI_BOTH+OCI_ASSOC+OCI_RETURN_LOBS)) {
        ?>
        <tr>
            <td><?= $row['SEVK_NO'] ?></td>
            <td><?= $row['FIILI_SEVK_TARIHI'] ?></td>
            <td><?= $row['IRSALIYE_TARIHI'] ?></td>
            <td><?= $row['MUSTERI_NO'] ?></td>
            <td><?= $row['MUSTERI_ADI'] ?></td>
            <td><?= $row['MATBU_IRSALIYE_NO'] ?></td>
            <td><?= $row['TUTAR_BILGISI'] ?></td>
            <td><?= $row['PARA_BIRIMI'] ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>
<table class="table datatable-colvis-group">
    <thead>
    <tr>
        <th>SITE</th>
        <th>IS EMRI NO</th>
        <th>IS EMRI MIKTAR</th>
        <th>STOK KODU</th>
        <th>STOK ACIKLAMA</th>
        <th>OLUSTURMA_TARIH</th>
        <th>ilk_tuketim</th>
        <th>son_uretim</th>
        <th>OPERASYON</th>
        <th class="text-center">GIRIS_MIKTAR</th>
        <th class="text-center">HURDA_MIKTAR</th>
        <th class="text-center">CIKIS_MIKTAR</th>
        <th class="text-center">FARK</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = oci_fetch_array($veri, OCI_BOTH+OCI_ASSOC+OCI_RETURN_LOBS)) {
        ?>
        <tr>

            <td><?= $row['SIRKET_KODU'] ?></td>
            <td><?= $row['IS_EMRI_NO'] ?></td>
            <td><?= $row['IS_EMRI_MIKTAR'] ?></td>
            <td><?= $row['STOK_KODU'] ?></td>
            <td><?= $row['STOK_ACIKLAMA'] ?></td>
            <td><?= $row['OLUSTURMA_TARIH'] ?></td>
            <td><?= $row['ILK_TUKETIM'] ?></td>
            <td><?= $row['SON_URETIM'] ?></td>
            <td><?= $row['OPERASYON'] ?></td>
            <td class="text-center"><?= $row['GIRIS_MIKTAR'] ?></td>
            <td class="text-center"><?= $row['HURDA_MIKTAR'] ?></td>
            <td class="text-center"><?= $row['CIKIS_MIKTAR'] ?></td>
            <td class="text-center"><?= $row['FARK'] ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>
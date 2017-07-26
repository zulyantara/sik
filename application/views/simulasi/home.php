<table id="table_data" class="display cell-border compact hover nowrap order-column stripe">
    <thead>
        <tr>
            <th style="width: 5px;">No</th>
            <th>Nama Siswa</th>
            <th style="width: 15px;">Option</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td>No</td>
            <td>Nama Siswa</td>
            <td>Option</td>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $no = 1;
        foreach($qry_siswa as $row_siswa)
        {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row_siswa->siswa_nama; ?></td>
                <td><a href="<?php echo base_url("simulasi/detail/".$row_siswa->siswa_id); ?>" class="uk-button">Simulasi</a></td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table_data').DataTable({
            "order": [[ 1, "asc" ]],
            "columnDefs": [{
                "targets": [0,2], "orderable": false,
            }]
        });
    });
</script>

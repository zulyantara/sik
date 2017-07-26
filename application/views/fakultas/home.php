<?php
if(isset($message))
{
    $alert_open = ($flag_simpan === 1) ? "<div class=\"uk-alert uk-alert-success\">" : "<div class=\"uk-alert uk-alert-danger\">";
    echo $alert_open.$message."</div>";
}
?>

<div class="uk-overflow-container">
    <table id="table_data" class="display cell-border compact hover nowrap order-column stripe">
        <thead>
            <tr>
                <th>Program Studi</th>
                <th>Universitas</th>
                <th>Peminat Tahun Lalu</th>
                <th>Jurusan</th>
                <th>Daya Tampung</th>
                <th>Rata Rapor Atas</th>
                <th>Rata Rapor Bawah</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Program Studi</th>
                <th>Universitas</th>
                <th>Peminat Tahun Lalu</th>
                <th>Jurusan</th>
                <th>Daya Tampung</th>
                <th>Rata Rapor Atas</th>
                <th>Rata Rapor Bawah</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if(isset($qry_fakultas) && $qry_fakultas != 0)
            {
                $no = 1+$this->uri->segment(3);
                foreach($qry_fakultas as $key_fakultas => $row_fakultas)
                {
                    ?>
                    <tr>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("fakultas/edit/".$row_fakultas->uf_id); ?>"><?php echo $row_fakultas->uf_deskripsi; ?></a></td>
                        <td><a href="<?php echo base_url("fakultas/edit/".$row_fakultas->uf_id); ?>"><?php echo $row_fakultas->universitas_deskripsi; ?></a></td>
                        <td><?php echo $row_fakultas->uf_peminat_thn_lalu; ?></td>
                        <td><?php echo $row_fakultas->jurusan_deskripsi; ?></td>
                        <td><?php echo $row_fakultas->uf_daya_tampung; ?></td>
                        <td><?php echo $row_fakultas->uf_rata_rapor_atas; ?></td>
                        <td><?php echo $row_fakultas->uf_rata_rapor_bawah; ?></td>
                        <td><a href="<?php echo base_url("fakultas/hapus/".$row_fakultas->uf_id); ?>" class="uk-button" onclick="return confirm('Sumpe lo mau hapus datanya?')">Hapus</a></td>
                    </tr>
                    <?php
                    $no++;
                }
            }
            else
            {
                ?>
                <tr>
                    <th colspan="7"><span class="uk-text-bold uk-text-large uk-text-danger">Data Kosong</span></th>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // Setup - add a text input to each footer cell
        $('#table_data tfoot th').each( function () {
            var title = $('#table_data thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );
        
        $('#table_data').DataTable({
            "order": [[ 1, "asc" ]]
        });
        
        var table = $('#table_data').DataTable();
        
        table.columns().eq( 0 ).each( function ( colIdx ) {
            $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                table
                    .column( colIdx )
                    .search( this.value )
                    .draw();
            } );
        } );
    });
</script>
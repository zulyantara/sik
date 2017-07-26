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
                <th class="uk-text-top">Nama Sekolah</th>
                <th class="uk-text-center uk-text-top">Akreditasi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="uk-text-top">Nama Sekolah</th>
                <th class="uk-text-center uk-text-top">Akreditasi</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if(isset($qry_sekolah) && $qry_sekolah != 0)
            {
                foreach($qry_sekolah as $key_sekolah => $row_sekolah)
                {
                    ?>
                    <tr>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("sekolah/edit/".$row_sekolah->sekolah_id); ?>"><?php echo $row_sekolah->sekolah_deskripsi; ?></a></td>
                        <td class="uk-text-center"><?php echo $row_sekolah->sekolah_akreditasi; ?></td>
                    </tr>
                    <?php
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
        $('#table_data').DataTable({
        });
    });
</script>
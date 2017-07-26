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
                <th class="uk-text-top">Jurusan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="uk-text-top">Jurusan</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if(isset($qry_jurusan) && $qry_jurusan != 0)
            {
                foreach($qry_jurusan as $key_jurusan => $row_jurusan)
                {
                    ?>
                    <tr>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("jurusan/edit/".$row_jurusan->jurusan_id); ?>"><?php echo $row_jurusan->jurusan_deskripsi; ?></a></td>
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
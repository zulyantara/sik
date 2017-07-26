<?php
if(isset($message))
{
    $alert_open = ($flag_simpan === 1) ? "<div class=\"uk-alert uk-alert-success\">" : "<div class=\"uk-alert uk-alert-danger\">";
    echo $alert_open.$message."</div>";
}
?>

    <table id="table_data" class="display cell-border compact hover nowrap order-column stripe">
        <thead>
            <tr>
                <th>Universitas</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Universitas</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if(isset($qry_universitas) && $qry_universitas != 0)
            {
                foreach($qry_universitas as $key_universitas => $row_universitas)
                {
                    ?>
                    <tr>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("universitas/edit/".$row_universitas->universitas_id); ?>"><?php echo $row_universitas->universitas_deskripsi; ?></a></td>
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

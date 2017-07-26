<?php
if(isset($message))
{
    $alert_open = ($flag_simpan === 1) ? "<div class=\"uk-alert uk-alert-success\">" : "<div class=\"uk-alert uk-alert-danger\">";
    echo $alert_open.$message."</div>";
}
?>

<table id="table_data" class="display cell-border compact hover nowrap order-column stripe">
    <?php
    if(isset($qry_cabang) && $qry_cabang != 0)
    {
        ?>
        <thead>
            <tr>
                <th style="width: 75px;">ID</th>
                <th>Cabang</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Cabang</th>
            </tr>
        </tfoot>
        <?php
    }
    else
    {
        ?>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
            </tr>
        </tfoot>
        <?php
    }
    ?>
    <tbody>
        <?php
        if(isset($qry_cabang) && $qry_cabang != 0)
        {
            foreach($qry_cabang as $key_cabang => $row_cabang)
            {
                ?>
                <tr>
                    <td class="uk-margin-large-right dt-body-center"><a href="<?php echo base_url("cabang/edit/".$row_cabang->cabang_id); ?>"><?php echo $row_cabang->cabang_id; ?></a></td>
                    <td class="uk-margin-large-right"><a href="<?php echo base_url("cabang/edit/".$row_cabang->cabang_id); ?>"><?php echo $row_cabang->cabang_deskripsi; ?></a></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <th><span class="uk-text-bold uk-text-large uk-text-danger">Data Kosong</span></th>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table_data').DataTable({
            "order": [[ 0, "asc" ]]
        });
    });
</script>

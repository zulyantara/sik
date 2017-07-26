<?php
if(isset($message))
{
    $alert_open = ($flag_simpan === 1) ? "<div class=\"uk-alert uk-alert-success\">" : "<div class=\"uk-alert uk-alert-danger\">";
    echo $alert_open.$message."</div>";
}
?>

<div class="uk-overflow-container">
    <table id="table_data" class="display cell-border compact hover nowrap order-column stripe">
        <?php
        if(isset($qry_siswa_nilai) && $qry_siswa_nilai != 0)
        {
            ?>
            <thead>
                <tr>
                    <th class="uk-text-top">Nama Siswa</th>
                    <th class="uk-text-top">Rata UN</th>
                    <th class="uk-text-top">Semester</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="uk-text-top">Nama Siswa</th>
                    <th class="uk-text-top">Rata UN</th>
                    <th class="uk-text-top">Semester</th>
                </tr>
            </tfoot>
            <?php
        }
        else
        {
            ?>
            <thead>
                <tr>
                    <th class="uk-text-top"></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="uk-text-top"></th>
                </tr>
            </tfoot>
            <?php
        }
        ?>
        <tbody>
            <?php
            if(isset($qry_siswa_nilai) && $qry_siswa_nilai != 0)
            {
                foreach($qry_siswa_nilai as $key_siswa_nilai => $row_siswa_nilai)
                {
                    ?>
                    <tr>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("siswa_nilai/edit/".$row_siswa_nilai->snr_id); ?>"><?php echo $row_siswa_nilai->siswa_nama; ?></a></td>
                        <td class="uk-text-center"><?php echo $row_siswa_nilai->snr_rata_un; ?></td>
                        <td class="uk-text-center"><?php echo $row_siswa_nilai->snr_semester; ?></td>
                        <td><a href="<?php echo base_url("siswa_nilai/edit/".$row_siswa_nilai->siswa_id); ?>">Edit</a></td>
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
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table_data').DataTable({
        });
    });
</script>
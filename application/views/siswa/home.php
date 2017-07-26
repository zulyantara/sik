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
                <th class="uk-text-center" style="width: 1px;">No</th>
                <th class="uk-text-top">Nama Siswa</th>
                <th class="uk-text-top" style="width: 250px;">Sekolah</th>
                <th class="uk-text-top" style="width: 70px;">Jurusan</th>
                <th class="uk-text-top" style="width: 100px;">Jenis Kelas</th>
                <th class="uk-text-top" style="width: 25px;">Cabang</th>
                <th style="width: 10px;">Option</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="uk-text-top">Nama Siswa</th>
                <th class="uk-text-top">Sekolah</th>
                <th class="uk-text-top">Jurusan</th>
                <th class="uk-text-top">Jenis Kelas</th>
                <th class="uk-text-top">Cabang</th>
                <th>option</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if(isset($qry_siswa) && $qry_siswa != 0)
            {
                $no=1;
                foreach($qry_siswa as $key_siswa => $row_siswa)
                {
                    ?>
                    <tr>
                        <td style=><?php echo $no; ?></td>
                        <td class="uk-margin-large-right"><a href="<?php echo base_url("siswa/edit/".$row_siswa->siswa_id); ?>"><?php echo $row_siswa->siswa_nama; ?></a></td>
                        <td><?php echo $row_siswa->sekolah_deskripsi; ?></td>
                        <td class="uk-text-center"><?php echo $row_siswa->jurusan_deskripsi; ?></td>
                        <td class="uk-text-center"><?php echo ($row_siswa->siswa_jenis_kelas==="1") ? "Reguler" : ($row_siswa->siswa_jenis_kelas==="2") ? "Akselerasi" : ($row_siswa->siswa_jenis_kelas==="3") ? "Internasional" : ""; ?></td>
                        <td><?php echo strtoupper(ucwords($row_siswa->cabang_deskripsi)); ?></td>
                        <td><a href="<?php echo base_url("siswa_nilai/edit/".$row_siswa->siswa_id); ?>" class="uk-button">Daftar Nilai</a></td>
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
        $('#table_data').DataTable({
            "order": [[ 1, "asc" ]],
            "columnDefs": [{
                "targets": [0,6], "orderable": false,
            }]
        });
    });
</script>
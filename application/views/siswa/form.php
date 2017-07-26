<?php
$siswa_id = (isset($qry_siswa)) ? $qry_siswa->siswa_id : "";
$siswa_nama = (isset($qry_siswa)) ? $qry_siswa->siswa_nama : "";
$siswa_sekolah = (isset($qry_siswa)) ? $qry_siswa->siswa_sekolah : "";
$siswa_jurusan = (isset($qry_siswa)) ? $qry_siswa->siswa_jurusan : "";
$siswa_jenis_kelas = (isset($qry_siswa)) ? $qry_siswa->siswa_jenis_kelas : "";
$siswa_cabang = (isset($qry_siswa)) ? $qry_siswa->siswa_cabang : "";
$siswa_ta = (isset($qry_siswa)) ? $qry_siswa->siswa_ta : "";
$siswa_htm = (isset($qry_siswa)) ? $qry_siswa->siswa_hasil_tes_minat : "";
//var_dump($qry_siswa);
$jenis_kelas = array(1=>"Reguler",2=>"Akselerasi",3=>"Internasional");

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("siswa/form"); ?>" method="post">
    <input type="hidden" name="txt_siswa_id" id="txt_siswa_id" value="<?php echo $siswa_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_siswa_nama">Nama Siswa</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_siswa_nama" id="txt_siswa_nama" placeholder="Nama Siswa" value="<?php echo $siswa_nama; ?>" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_siswa_sekolah">Sekolah</label>
        <div class="uk-form-controls">
            <select name="opt_siswa_sekolah">
                <?php
                foreach($qry_sekolah as $key_sekolah => $row_sekolah)
                {
                    $selected = ($siswa_sekolah === $row_sekolah->sekolah_id) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $row_sekolah->sekolah_id; ?>" <?php echo $selected; ?>><?php echo $row_sekolah->sekolah_deskripsi; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_siswa_jurusan">Jurusan</label>
        <div class="uk-form-controls">
            <select name="opt_siswa_jurusan">
                <?php
                foreach($qry_jurusan as $key_jurusan => $row_jurusan)
                {
                    $selected = ($siswa_jurusan === $row_jurusan->jurusan_id) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $row_jurusan->jurusan_id; ?>" <?php echo $selected; ?>><?php echo $row_jurusan->jurusan_deskripsi; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_siswa_jenis_kelas">Jenis Kelas</label>
        <div class="uk-form-controls">
            <select name="opt_siswa_jenis_kelas">
                <?php
                foreach($jenis_kelas as $key_jenis_kelas => $row_jenis_kelas)
                {
                    $selected = ($siswa_jenis_kelas === $key_jenis_kelas) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $key_jenis_kelas; ?>" <?php echo $selected; ?>><?php echo $row_jenis_kelas; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_siswa_cabang">Cabang</label>
        <div class="uk-form-controls">
            <select name="opt_siswa_cabang">
                <?php
                foreach($qry_cabang as $key_cabang => $row_cabang)
                {
                    $selected = ($siswa_cabang === $row_cabang->cabang_id) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $row_cabang->cabang_id; ?>" <?php echo $selected; ?>><?php echo $row_cabang->cabang_deskripsi; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_siswa_ta">Tahun Ajaran</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_siswa_ta" placeholder="Tahun Ajaran" value="<?php echo $siswa_ta; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_siswa_htm">Hasil Tes Minat Bakat BP</label>
        <div class="uk-form-controls">
            <textarea name="txt_siswa_htm" placeholder="Hasil Tes Minat Bakat BP"><?php echo $siswa_htm; ?></textarea>
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_siswa))
            {
                ?>
                <button type="submit" name="btn_simpan" id="btn_simpan" value="btn_update" class="uk-button uk-button-primary">Simpan</button>
                <?php
            }
            else
            {
                ?>
                <button type="submit" name="btn_simpan" id="btn_simpan" value="btn_simpan" class="uk-button uk-button-primary">Simpan</button>
                <?php
            }
            ?>
            <a href="<?php echo base_url("siswa"); ?>" class="uk-button uk-button-primary">List Siswa</a>
        </div>
    </div>
</form>

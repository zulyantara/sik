<?php
$jurusan_id = (isset($qry_jurusan)) ? $qry_jurusan->jurusan_id : "";
$jurusan_deskripsi = (isset($qry_jurusan)) ? $qry_jurusan->jurusan_deskripsi : "";

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("jurusan/form"); ?>" method="post">
    <input type="hidden" name="txt_jurusan_id" id="txt_jurusan_id" value="<?php echo $jurusan_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_jurusan_deskripsi">Jurusan</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_jurusan_deskripsi" id="txt_jurusan_deskripsi" placeholder="Jurusan" value="<?php echo $jurusan_deskripsi; ?>" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_jurusan))
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
            <a href="<?php echo base_url("jurusan"); ?>" class="uk-button uk-button-primary">List Jurusan</a>
        </div>
    </div>
</form>
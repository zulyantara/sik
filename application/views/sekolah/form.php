<?php
$sekolah_id = (isset($qry_sekolah)) ? $qry_sekolah->sekolah_id : "";
$sekolah_deskripsi = (isset($qry_sekolah)) ? $qry_sekolah->sekolah_deskripsi : "";
$sekolah_akreditasi = (isset($qry_sekolah)) ? $qry_sekolah->sekolah_akreditasi : "";

$akreditasi = array("A"=>"A","B"=>"B","C"=>"C");

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("sekolah/form"); ?>" method="post">
    <input type="hidden" name="txt_sekolah_id" id="txt_sekolah_id" value="<?php echo $sekolah_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_sekolah_deskripsi">Nama Sekolah</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_sekolah_deskripsi" id="txt_sekolah_deskripsi" placeholder="Nama Sekolah" value="<?php echo $sekolah_deskripsi; ?>" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_sekolah_akreditasi">Akreditasi</label>
        <div class="uk-form-controls">
            <select name="opt_sekolah_akreditasi">
                <?php
                foreach($akreditasi as $key_akreditasi => $row_akreditasi)
                {
                    $selected = ($sekolah_akreditasi === $row_akreditasi) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $key_akreditasi; ?>" <?php echo $selected; ?>><?php echo $row_akreditasi; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_sekolah))
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
            <a href="<?php echo base_url("sekolah"); ?>" class="uk-button uk-button-primary">List Sekolah</a>
        </div>
    </div>
</form>
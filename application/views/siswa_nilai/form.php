<?php
$snr_siswa = ($this->uri->segment(3)) ? $this->uri->segment(3) : (isset($qry_snr) ? $qry_snr->snr_siswa : "");
$snr_rataan_semester_1 = (isset($qry_snr)) ? $qry_snr->snr_rataan_semester_1 : "";
$snr_rataan_semester_2 = (isset($qry_snr)) ? $qry_snr->snr_rataan_semester_2 : "";
$snr_rataan_semester_3 = (isset($qry_snr)) ? $qry_snr->snr_rataan_semester_3 : "";
$snr_rataan_semester_4 = (isset($qry_snr)) ? $qry_snr->snr_rataan_semester_4 : "";
$snr_rataan_semester_5 = (isset($qry_snr)) ? $qry_snr->snr_rataan_semester_5 : "";

$disabled = ($snr_siswa != "") ? "disabled=\"disabled\"" : "";

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("siswa_nilai/form"); ?>" method="post">
    <input type="hidden" name="txt_snr_siswa" id="txt_snr_siswa" value="<?php echo $snr_siswa; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_snr_siswa">Nama Siswa</label>
        <div class="uk-form-controls">
            <select name="opt_snr_siswa" <?php echo $disabled; ?> autofocus="autofocus">
                <?php
                foreach($qry_siswa as $key_siswa => $row_siswa)
                {
                    $selected = ($snr_siswa == $row_siswa->siswa_id) ? "selected=\"selected\"" : "";
                    ?>
                    <option value="<?php echo $row_siswa->siswa_id; ?>" <?php echo $selected; ?>><?php echo $row_siswa->siswa_nama; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_snr_rataan_semester_1">Rataan Semester 1</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_snr_rataan_semester_1" id="txt_snr_rataan_semester_1" value="<?php echo $snr_rataan_semester_1; ?>" class="uk-form-width-small" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_snr_rataan_semester_2">Rataan Semester 2</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_snr_rataan_semester_2" id="txt_snr_rataan_semester_2" value="<?php echo $snr_rataan_semester_2; ?>" class="uk-form-width-small">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_snr_rataan_semester_3">Rataan Semester 3</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_snr_rataan_semester_3" id="txt_snr_rataan_semester_3" value="<?php echo $snr_rataan_semester_3; ?>" class="uk-form-width-small">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_snr_rataan_semester_4">Rataan Semester 4</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_snr_rataan_semester_4" id="txt_snr_rataan_semester_4" value="<?php echo $snr_rataan_semester_4; ?>" class="uk-form-width-small">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_snr_rataan_semester_5">Rataan Semester 5</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_snr_rataan_semester_5" id="txt_snr_rataan_semester_5" value="<?php echo $snr_rataan_semester_5; ?>" class="uk-form-width-small">
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <button type="submit" name="btn_simpan" id="btn_simpan" value="btn_simpan" class="uk-button uk-button-primary">Simpan</button>
            <a href="<?php echo base_url("siswa"); ?>" class="uk-button uk-button-primary">List Siswa</a>
        </div>
    </div>
</form>
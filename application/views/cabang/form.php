<?php
$cabang_id = (isset($qry_cabang)) ? $qry_cabang->cabang_id : "";
$cabang_deskripsi = (isset($qry_cabang)) ? $qry_cabang->cabang_deskripsi : "";

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("cabang/form"); ?>" method="post">
    <input type="hidden" name="txt_cabang_id" id="txt_cabang_id" value="<?php echo $cabang_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_cabang_deskripsi">Cabang</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_cabang_deskripsi" id="txt_cabang_deskripsi" placeholder="Cabang" value="<?php echo $cabang_deskripsi; ?>" class="uk-form-width-large" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_cabang))
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
            <a href="<?php echo base_url("cabang"); ?>" class="uk-button uk-button-primary">List Cabang</a>
        </div>
    </div>
</form>

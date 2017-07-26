<?php
$universitas_id = (isset($qry_universitas)) ? $qry_universitas->universitas_id : "";
$universitas_deskripsi = (isset($qry_universitas)) ? $qry_universitas->universitas_deskripsi : "";

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("universitas/form"); ?>" method="post">
    <input type="hidden" name="txt_universitas_id" id="txt_universitas_id" value="<?php echo $universitas_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_universitas_deskripsi">Universitas</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_universitas_deskripsi" id="txt_universitas_deskripsi" placeholder="Universitas" value="<?php echo $universitas_deskripsi; ?>" class="uk-form-width-large" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_universitas))
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
            <a href="<?php echo base_url("universitas"); ?>" class="uk-button uk-button-primary">List Universitas</a>
        </div>
    </div>
</form>
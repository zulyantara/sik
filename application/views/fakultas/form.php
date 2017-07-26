<?php
$fakultas_id = (isset($qry_fakultas)) ? $qry_fakultas->uf_id : "";
$fakultas_universitas = (isset($qry_fakultas)) ? $qry_fakultas->uf_universitas : "";
$fakultas_peminat_thn_lalu = (isset($qry_fakultas)) ? $qry_fakultas->uf_peminat_thn_lalu : "";
$fakultas_jurusan = (isset($qry_fakultas)) ? $qry_fakultas->uf_jurusan : "";
$fakultas_deskripsi = (isset($qry_fakultas)) ? $qry_fakultas->uf_deskripsi : "";
$fakultas_daya_tampung = (isset($qry_fakultas)) ? $qry_fakultas->uf_daya_tampung : "";
$fakultas_rata_rapor_atas = (isset($qry_fakultas)) ? $qry_fakultas->uf_rata_rapor_atas : "";
$fakultas_rata_rapor_bawah = (isset($qry_fakultas)) ? $qry_fakultas->uf_rata_rapor_bawah : "";
$fakultas_jabar = (isset($qry_fakultas)) ? $qry_fakultas->uf_jabar : "";
$fakultas_jakarta = (isset($qry_fakultas)) ? $qry_fakultas->uf_jakarta : "";
$fakultas_banten = (isset($qry_fakultas)) ? $qry_fakultas->uf_banten : "";

if(isset($message))
{
    echo "<div class=\"uk-alert uk-alert-danger\">".$message."</div>";
}
?>

<form class="uk-form uk-form-horizontal" action="<?php echo base_url("fakultas/form"); ?>" method="post">
    <input type="hidden" name="txt_fakultas_id" id="txt_fakultas_id" value="<?php echo $fakultas_id; ?>">
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_deskripsi">Program Studi</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_deskripsi" id="txt_fakultas_deskripsi" placeholder="Program Studi" value="<?php echo $fakultas_deskripsi; ?>" class="uk-form-width-large" autofocus="autofocus">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_fakultas_universitas">Universitas</label>
        <div class="uk-form-controls">
            <select name="opt_fakultas_universitas">
                <?php
                if(isset($qry_universitas))
                {
                    foreach($qry_universitas as $key_universitas => $row_universitas)
                    {
                        $selected = ($fakultas_universitas === $row_universitas->universitas_id) ? "selected=\"selected\"" : "";
                        ?>
                        <option value="<?php echo $row_universitas->universitas_id; ?>" <?php echo $selected; ?>><?php echo $row_universitas->universitas_deskripsi; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="opt_fakultas_jurusan">Jurusan</label>
        <div class="uk-form-controls">
            <select name="opt_fakultas_jurusan">
                <?php
                if(isset($qry_jurusan))
                {
                    foreach($qry_jurusan as $key_jurusan => $row_jurusan)
                    {
                        $selected = ($fakultas_jurusan === $row_jurusan->jurusan_id) ? "selected=\"selected\"" : "";
                        ?>
                        <option value="<?php echo $row_jurusan->jurusan_id; ?>" <?php echo $selected; ?>><?php echo $row_jurusan->jurusan_deskripsi; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_peminat_thn_lalu">Jumlah Peminat Tahun Lalu</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_peminat_thn_lalu" id="txt_fakultas_peminat_thn_lalu" value="<?php echo $fakultas_peminat_thn_lalu; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_daya_tampung">Daya Tampung</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_daya_tampung" id="txt_fakultas_daya_tampung" value="<?php echo $fakultas_daya_tampung; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_rata_rapor_atas">Rata Rapor Atas</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_rata_rapor_atas" id="txt_fakultas_rata_rapor_atas" value="<?php echo $fakultas_rata_rapor_atas; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_rata_rapor_bawah">Rata Rapor Bawah</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_rata_rapor_bawah" id="txt_fakultas_rata_rapor_bawah" value="<?php echo $fakultas_rata_rapor_bawah; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_jabar">Penerimaan Jabar</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_jabar" id="txt_fakultas_jabar" value="<?php echo $fakultas_jabar; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_jakarta">Penerimaan Jakarta</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_jakarta" id="txt_fakultas_jakarta" value="<?php echo $fakultas_jakarta; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="txt_fakultas_banten">Penerimaan Banten</label>
        <div class="uk-form-controls">
            <input type="text" name="txt_fakultas_banten" id="txt_fakultas_banten" value="<?php echo $fakultas_banten; ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <?php
            if(isset($qry_fakultas))
            {
                ?>
                <button type="submit" name="btn_simpan" id="btn_simpan" value="btn_update" class="uk-button uk-button-primary">Simpan</button>
                <a href="<?php echo base_url("fakultas/search/".$fakultas_universitas); ?>" class="uk-button uk-button-primary">List Program Studi</a>
                <?php
            }
            else
            {
                ?>
                <button type="submit" name="btn_simpan" id="btn_simpan" value="btn_simpan" class="uk-button uk-button-primary">Simpan</button>
                <a href="<?php echo base_url("fakultas"); ?>" class="uk-button uk-button-primary">List Program Studi</a>
                <?php
            }
            ?>
        </div>
    </div>
</form>

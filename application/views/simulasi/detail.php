<?php
$siswa_id = (isset($qry_siswa)) ? $qry_siswa->siswa_id : "";
$siswa_nama = (isset($qry_siswa)) ? $qry_siswa->siswa_nama : "";
$siswa_sekolah = (isset($qry_siswa)) ? $qry_siswa->sekolah_deskripsi : "";
$siswa_sekolah_akreditas = (isset($qry_siswa)) ? $qry_siswa->sekolah_akreditasi : "";
$siswa_jurusan = (isset($qry_siswa)) ? $qry_siswa->jurusan_deskripsi : "";
$siswa_jenis_kelas = (isset($qry_siswa)) ? ($qry_siswa->siswa_jenis_kelas === "1" ? "Reguler" : ($qry_siswa->siswa_jenis_kelas === "2" ? "Akselerasi" : ($qry_siswa->siswa_jenis_kelas === "3" ? "Internasional" : ""))) : "";
$siswa_cabang = (isset($qry_siswa)) ? $qry_siswa->cabang_deskripsi : "";

$simulasi_peringkat_reguler_sekolah = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_peringkat_reguler_sekolah;
$simulasi_peringkat_prodi_1 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_peringkat_prodi_1;
$simulasi_peringkat_prodi_2 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_peringkat_prodi_2;
$simulasi_jml_terima_thn_lalu = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_jml_terima_thn_lalu;
$simulasi_jml_terima_pilihan_1 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_jml_terima_pilihan_1;
$simulasi_jml_terima_pilihan_2 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_jml_terima_pilihan_2;
$simulasi_peminatan_1 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_peminatan_1;
$simulasi_peminatan_2 = ($qry_simulasi === FALSE) ? "" : $qry_simulasi->simulasi_peminatan_2;

$qry_fakultas_1 = ($simulasi_peminatan_1 === "") ? "" : $this->simod->get_fakultas_by_id($simulasi_peminatan_1);
$qry_fakultas_2 = ($simulasi_peminatan_2 === "") ? "" : $this->simod->get_fakultas_by_id($simulasi_peminatan_2);

$qry_snr = $this->simod->get_siswa_nilai_by_id($siswa_id);
?>

<article class="uk-comment">
    <header class="uk-comment-header">
        <img class="uk-comment-avatar" src="<?php echo base_url("assets/images/placeholder_avatar.svg"); ?>" alt="">
        <h4 class="uk-comment-title"><?php echo $siswa_nama; ?></h4>
        <div class="uk-comment-meta"><?php echo $siswa_sekolah." [".$siswa_sekolah_akreditas."] | ".$siswa_jurusan." | ".$siswa_jenis_kelas." | ".$siswa_cabang; ?></div>
    </header>
    <div class="uk-comment-body">
        <form class="uk-form uk-form-horizontal" method="post" action="<?php echo base_url("simulasi/analisa"); ?>">
        <input type="hidden" name="txt_siswa_id" value="<?php echo $siswa_id; ?>">
            <legend>Nilai Rapor</legend>
            <?php
            if($qry_snr != FALSE)
            {
                $jml_rataan = 0;
                foreach($qry_snr as $row_snr)
                {
                    $jml_rataan = $row_snr->snr_rataan_semester_1+$row_snr->snr_rataan_semester_2+$row_snr->snr_rataan_semester_3+$row_snr->snr_rataan_semester_4+$row_snr->snr_rataan_semester_5;
                    $rata = $jml_rataan/5;
                    ?>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label for="txt_rataan_semester_1" class="uk-form-label">Rataan Semester 1</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rataan_semester_1" value="<?php echo $row_snr->snr_rataan_semester_1; ?>" class="uk-form-width-small uk-form-success" readonly="readonly">
                            </div>
                            <label for="txt_rataan_semester_2" class="uk-form-label">Rataan Semester 2</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rataan_semester_2" value="<?php echo $row_snr->snr_rataan_semester_2; ?>" class="uk-form-width-small uk-form-success" readonly="readonly">
                            </div>
                            <label for="txt_rataan_semester_3" class="uk-form-label">Rataan Semester 3</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rataan_semester_3" value="<?php echo $row_snr->snr_rataan_semester_3; ?>" class="uk-form-width-small uk-form-success" readonly="readonly">
                            </div>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="txt_rataan_semester_4" class="uk-form-label">Rataan Semester 4</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rataan_semester_4" value="<?php echo $row_snr->snr_rataan_semester_4; ?>" class="uk-form-width-small uk-form-success" readonly="readonly">
                            </div>
                            <label for="txt_rataan_semester_5" class="uk-form-label">Rataan Semester 5</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rataan_semester_5" value="<?php echo $row_snr->snr_rataan_semester_5; ?>" class="uk-form-width-small uk-form-success" readonly="readonly">
                            </div>
                            <label for="txt_rata_rata" class="uk-form-label"><span class="uk-text-danger uk-text-bold">Rata-Rata</span></label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <input type="text" name="txt_rata_rata" value="<?php echo $rata; ?>" class="uk-form-width-small uk-form-danger" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <legend>Data Sekolah</legend>
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <label for="txt_peringkat_reguler_sekolah" class="uk-form-label">Peringkat Reguler Di Sekolah</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_peringkat_reguler_sekolah" class="uk-form-width-small" value="<?php echo $simulasi_peringkat_reguler_sekolah; ?>" autofocus="autofocus">
                    </div>
                    <label for="txt_peringkat_prodi_1" class="uk-form-label">Peringkat Reguler Di Prodi 1</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_peringkat_prodi_1" class="uk-form-width-small" value="<?php echo $simulasi_peringkat_prodi_1; ?>">
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <label for="txt_jml_terima_thn_lalu" class="uk-form-label uk-form-label-tara">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Di Sekolah</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_jml_terima_thn_lalu" class="uk-form-width-small" value="<?php echo $simulasi_jml_terima_thn_lalu; ?>">
                    </div>
                    <label for="txt_jml_terima_pilihan_1" class="uk-form-label uk-form-label-tara">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 1</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_jml_terima_pilihan_1" class="uk-form-width-small" value="<?php echo $simulasi_jml_terima_pilihan_1; ?>">
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <label for="txt_peringkat_prodi_2" class="uk-form-label">Peringkat Reguler Di Prodi 2</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_peringkat_prodi_2" class="uk-form-width-small" value="<?php echo $simulasi_peringkat_prodi_2; ?>">
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <label for="txt_jml_terima_pilihan_2" class="uk-form-label uk-form-label-tara">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 2</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="text" name="txt_jml_terima_pilihan_2" class="uk-form-width-small" value="<?php echo $simulasi_jml_terima_pilihan_2; ?>">
                    </div>
                </div>
            </div>

            <legend>Data Universitas</legend>
            <div data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}" class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-fade">
                <label for="txt_peringkat_reguler_jurusan" class="uk-form-label">Peminatan 1</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <select name="opt_universitas_1" id="opt_universitas_1">
                        <option>Pilih Universitas</option>
                        <?php
                        if(isset($qry_universitas))
                        {
                            foreach($qry_universitas as $row_universitas_1)
                            {
                                ?>
                                <option value="<?php echo $row_universitas_1->universitas_id; ?>"><?php echo $row_universitas_1->universitas_deskripsi; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <span class="uk-form-help-inline"><?php echo ($simulasi_peminatan_1===""?"" : $qry_fakultas_1->universitas_deskripsi); ?></span>
                </div>
                <div class="uk-form-controls uk-form-controls-text">
                    <select name="opt_peminatan_1" id="opt_peminatan_1">
                        <option value="">Pilih Prodi</option>
                    </select>
                    <span class="uk-form-help-inline"><?php echo ($simulasi_peminatan_1===""?"":$qry_fakultas_1->uf_deskripsi); ?></span>
                    <div id="test"></div>
                </div>
                <label for="txt_peringkat_reguler_jurusan" class="uk-form-label">Peminatan 2</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <select name="opt_universitas_2" id="opt_universitas_2">
                        <option>Pilih Universitas</option>
                        <?php
                        if(isset($qry_universitas))
                        {
                            foreach($qry_universitas as $row_universitas_2)
                            {
                                ?>
                                <option value="<?php echo $row_universitas_2->universitas_id; ?>"><?php echo $row_universitas_2->universitas_deskripsi; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <span class="uk-form-help-inline"><?php echo ($simulasi_peminatan_2===""?"":$qry_fakultas_2->universitas_deskripsi); ?></span>
                </div>
                <div class="uk-form-controls uk-form-controls-text">
                    <select name="opt_peminatan_2" id="opt_peminatan_2">
                        <option>Pilih Prodi</option>
                    </select>
                    <span class="uk-form-help-inline"><?php echo ($simulasi_peminatan_2===""?"":$qry_fakultas_2->uf_deskripsi); ?></span>
                </div>

                <div class="uk-form-controls uk-form-controls-text">
                    <button type="submit" name="btn_analisa" class="uk-button" value="btn_analisa">Analisa</button>
                </div>
            </div>
        </form>
    </div>
</article>

<script type="text/javascript">
$(document).ready(function(){
    $('#opt_universitas_1').change(function(){
        $.post("<?php echo base_url();?>simulasi/list_fakultas/"+$('#opt_universitas_1').val(),{},function(obj){
            $('#opt_peminatan_1').html(obj);
        });
    });
    $('#opt_universitas_2').change(function(){
        $.post("<?php echo base_url();?>simulasi/list_fakultas/"+$('#opt_universitas_2').val(),{},function(obj){
            $('#opt_peminatan_2').html(obj);
        });
    });
});
</script>

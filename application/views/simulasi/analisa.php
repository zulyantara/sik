<?php
/* siswa */
$siswa_id = (isset($qry_siswa)) ? $qry_siswa->siswa_id : "";
$siswa_nama = (isset($qry_siswa)) ? $qry_siswa->siswa_nama : "";
$siswa_sekolah = (isset($qry_siswa)) ? $qry_siswa->sekolah_deskripsi : "";
$siswa_sekolah_akreditas = (isset($qry_siswa)) ? $qry_siswa->sekolah_akreditasi : "";
$siswa_jurusan = (isset($qry_siswa)) ? $qry_siswa->jurusan_deskripsi : "";
$siswa_jenis_kelas = (isset($qry_siswa)) ? ($qry_siswa->siswa_jenis_kelas === "1" ? "Reguler" : ($qry_siswa->siswa_jenis_kelas === "2" ? "Akselerasi" : ($qry_siswa->siswa_jenis_kelas === "3" ? "Internasional" : ""))) : "";
$siswa_cabang = (isset($qry_siswa)) ? $qry_siswa->cabang_deskripsi : "";
$siswa_ta = (isset($qry_siswa)) ? $qry_siswa->siswa_ta : "";
$siswa_hasil_tes_minat = (isset($qry_siswa)) ? $qry_siswa->siswa_hasil_tes_minat : "";

/* universitas dan prodi */
$universitas_deskripsi_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->universitas_deskripsi : "";
$universitas_prodi_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_deskripsi : "";
$universitas_peminat_thn_lalu_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_peminat_thn_lalu : "";
$universitas_daya_tampung_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_daya_tampung : "";
$universitas_rata_rapor_atas_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_rata_rapor_atas : "";
$universitas_rata_rapor_bawah_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_rata_rapor_bawah : "";
$universitas_jabar_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_jabar : "";
$universitas_jakarta_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_jakarta : "";
$universitas_banten_1 = (isset($qry_prodi_1)) ? $qry_prodi_1->uf_banten : "";
$universitas_deskripsi_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->universitas_deskripsi : "";
$universitas_prodi_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_deskripsi : "";
$universitas_peminat_thn_lalu_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_peminat_thn_lalu : "";
$universitas_daya_tampung_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_daya_tampung : "";
$universitas_rata_rapor_atas_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_rata_rapor_atas : "";
$universitas_rata_rapor_bawah_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_rata_rapor_bawah : "";
$universitas_rata_rapor_bawah_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_rata_rapor_bawah : "";
$universitas_jabar_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_jabar : "";
$universitas_jakarta_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_jakarta : "";
$universitas_banten_2 = (isset($qry_prodi_2)) ? $qry_prodi_2->uf_banten : "";

$analisa_peringkat_reguler_sekolah = ($txt_peringkat_reguler_sekolah < $txt_jml_terima_thn_lalu) ? "Memiliki peluang masuk PTN lewat jalur undangan" : "Belum dapat teridentifikasi peluangnya";
$analisa_peringkat_peminatan_prodi_1 = ($txt_peringkat_prodi_1 < $txt_jml_terima_pilihan_1) ? "Memiliki peluang masuk PTN lewat jalur undangan" : "Belum dapat teridentifikasi peluangnya";
$analisa_peringkat_peminatan_prodi_2 = ($txt_peringkat_prodi_2 < $txt_jml_terima_pilihan_2) ? "Memiliki peluang masuk PTN lewat jalur undangan" : "Belum dapat teridentifikasi peluangnya";

$tingkat_keketatan_1 = ceil($universitas_daya_tampung_1/$universitas_peminat_thn_lalu_1*100);
if($tingkat_keketatan_1 <= 2.5)
{
    $interpretasi_1 = "Tinggi";
}
elseif($tingkat_keketatan_1 > 2.5 and $tingkat_keketatan_1 <= 3.5)
{
    $interpretasi_1 = "Sedang - Tinggi";
}
elseif($tingkat_keketatan_1 > 3.5 and $tingkat_keketatan_1 <= 6)
{
    $interpretasi_1 = "Sedang";
}
elseif($tingkat_keketatan_1 > 6 and $tingkat_keketatan_1 <= 8.5)
{
    $interpretasi_1 = "Sedang - Rendah";
}
elseif($tingkat_keketatan_1 > 8.5 and $tingkat_keketatan_1 <= 10)
{
    $interpretasi_1 = "Rendah";
}
$tingkat_keketatan_2 = ceil($universitas_daya_tampung_2/$universitas_peminat_thn_lalu_2*100);
if($tingkat_keketatan_2 <= 2.5)
{
    $interpretasi_2 = "Tinggi";
}
elseif($tingkat_keketatan_2 > 2.5 and $tingkat_keketatan_2 <= 3.5)
{
    $interpretasi_2 = "Sedang - Tinggi";
}
elseif($tingkat_keketatan_2 > 3.5 and $tingkat_keketatan_2 <= 6)
{
    $interpretasi_2 = "Sedang";
}
elseif($tingkat_keketatan_2 > 6 and $tingkat_keketatan_2 <= 8.5)
{
    $interpretasi_2 = "Sedang - Rendah";
}
elseif($tingkat_keketatan_2 > 8.5 and $tingkat_keketatan_2 <= 10)
{
    $interpretasi_2 = "Rendah";
}
$perbandingan_keketatan_1 = ceil($universitas_peminat_thn_lalu_1/$universitas_daya_tampung_1);
$perbandingan_keketatan_2 = ceil($universitas_peminat_thn_lalu_2/$universitas_daya_tampung_2);

$analisa_persaingan_prodi_thn_lalu = ($tingkat_keketatan_1 > $tingkat_keketatan_2) ? "Peminatan 1" : "Peminatan 2";

$peluang_nilai_rapor_1 = $txt_rata_rata/$universitas_rata_rapor_atas_1*45;
$peluang_nilai_rapor_2 = $txt_rata_rata/$universitas_rata_rapor_atas_2*45;

if($txt_rata_rata > $universitas_rata_rapor_atas_1)
{
    // $analisa_peluang_rapor_1 = "PELUANG TINGGI INSYA ALLAH, BISA DICOBA";
    $analisa_peluang_rapor_1 = "Melebihi rataan nilai raport masuk prodi 1 tahun lalu";
}
elseif($txt_rata_rata < $universitas_rata_rapor_atas_1)
{
    // $analisa_peluang_rapor_1 = "PELUANG RENDAH, SILAHKAN DIPERTIMBANGKAN KEMBALI JURUSAN YANG DIINGINKAN";
    $analisa_peluang_rapor_1 = "Dibawah rataan nilai raport masuk prodi 1 tahun lalu";
}
else
{
    // $analisa_peluang_rapor_1 = "PELUANG SEDANG, DIKEMBALIKAN KEPADA ANAK DAN KEBIJAKSANAAN BIKON";
    $analisa_peluang_rapor_1 = "PELUANG SEDANG, Berada dalam rataan nilai raport masuk prodi 1";
}

if($txt_rata_rata > $universitas_rata_rapor_atas_2)
{
    // $analisa_peluang_rapor_1 = "PELUANG TINGGI INSYA ALLAH, BISA DICOBA";
    $analisa_peluang_rapor_2 = "Melebihi rataan nilai raport masuk prodi 2 tahun lalu";
}
elseif($txt_rata_rata < $universitas_rata_rapor_atas_2)
{
    // $analisa_peluang_rapor_1 = "PELUANG RENDAH, SILAHKAN DIPERTIMBANGKAN KEMBALI JURUSAN YANG DIINGINKAN";
    $analisa_peluang_rapor_2 = "Dibawah rataan nilai raport masuk prodi 2 tahun lalu";
}
else
{
    // $analisa_peluang_rapor_1 = "PELUANG SEDANG, DIKEMBALIKAN KEPADA ANAK DAN KEBIJAKSANAAN BIKON";
    $analisa_peluang_rapor_2 = "PELUANG SEDANG, Berada dalam rataan nilai raport masuk prodi 2";
}

/* untuk menghitung prediksi peluang total */
$nilai_peringkat_reguler_sekolah = ($txt_peringkat_reguler_sekolah < $txt_jml_terima_thn_lalu) ? 18 : 5;
$nilai_peringkat_peminatan_prodi_1 = ($txt_peringkat_prodi_1 < $txt_jml_terima_pilihan_1) ? 20 : 7;
$nilai_peringkat_peminatan_prodi_2 = ($txt_peringkat_prodi_2 < $txt_jml_terima_pilihan_2) ? 20 : 7;

$nilai_prediksi_peluang_total_1 = $nilai_peringkat_reguler_sekolah + $nilai_peringkat_peminatan_prodi_1 + $peluang_nilai_rapor_1;
$nilai_prediksi_peluang_total_2 = $nilai_peringkat_reguler_sekolah + $nilai_peringkat_peminatan_prodi_2 + $peluang_nilai_rapor_2;

if($nilai_prediksi_peluang_total_1 >= 90)
{
    $str_prediksi_peluang_total_1 = "Peluang tinggi";
}
elseif($nilai_prediksi_peluang_total_1 >= 83 and $nilai_prediksi_peluang_total_1 < 90)
{
    $str_prediksi_peluang_total_1 = "Peluang sedang-tinggi";
}
elseif($nilai_prediksi_peluang_total_1 >= 60 and $nilai_prediksi_peluang_total_1 < 83)
{
    $str_prediksi_peluang_total_1 = "Peluang sedang";
}
elseif($nilai_prediksi_peluang_total_1 >= 50 and $nilai_prediksi_peluang_total_1 < 60)
{
    $str_prediksi_peluang_total_1 = "Peluang sedang-rendah";
}
elseif($nilai_prediksi_peluang_total_1 < 50)
{
    $str_prediksi_peluang_total_1 = "Peluang rendah";
}

if($nilai_prediksi_peluang_total_2 >= 90)
{
    $str_prediksi_peluang_total_2 = "Peluang tinggi";
}
elseif($nilai_prediksi_peluang_total_2 >= 83 and $nilai_prediksi_peluang_total_2 < 90)
{
    $str_prediksi_peluang_total_2 = "Peluang sedang-tinggi";
}
elseif($nilai_prediksi_peluang_total_2 >= 60 and $nilai_prediksi_peluang_total_2 < 83)
{
    $str_prediksi_peluang_total_2 = "Peluang sedang";
}
elseif($nilai_prediksi_peluang_total_2 >= 50 and $nilai_prediksi_peluang_total_2 < 60)
{
    $str_prediksi_peluang_total_2 = "Peluang sedang-rendah";
}
elseif($nilai_prediksi_peluang_total_2 < 50)
{
    $str_prediksi_peluang_total_2 = "Peluang rendah";
}

$qry_snr = $this->simod->get_siswa_nilai_by_id($siswa_id);
?>

<article class="uk-comment">
    <header class="uk-comment-header">
        <img class="uk-comment-avatar" src="<?php echo base_url("assets/images/placeholder_avatar.svg"); ?>" alt="">
        <h4 class="uk-comment-title">HASIL SIMULASI SNMPTN <?php echo $siswa_ta." ".$siswa_nama; ?><br>Sistem Informasi Penjurusan Kuliah - Bintang Pelajar</h4>
        <div class="uk-comment-meta"><?php echo $siswa_jurusan." | ".$siswa_cabang." | ".$txt_rata_rata; ?></div>
    </header>
    <div class="uk-comment-body">
        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                <div class="uk-panel uk-panel-box uk-panel-box-primary">
                    <h3 class="uk-panel-title"><i class="uk-icon-building"></i> Data Sekolah</h3>
                    <table class="uk-table">
                        <tr>
                            <td style="width: 50%">Nama Sekolah</td>
                            <td>:</td>
                            <td><?php echo $siswa_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Akreditasi</td>
                            <td>:</td>
                            <td><?php echo $siswa_sekolah_akreditas; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Peringkat Reguler Sekolah</td>
                            <td>:</td>
                            <td><?php echo $txt_peringkat_reguler_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Di Sekolah</td>
                            <td>:</td>
                            <td><?php echo $txt_jml_terima_thn_lalu; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Peringkat Reguler Di Prodi 1</td>
                            <td>:</td>
                            <td><?php echo $txt_peringkat_prodi_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 1</td>
                            <td>:</td>
                            <td><?php echo $txt_jml_terima_pilihan_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Peringkat Reguler Di Prodi 2</td>
                            <td>:</td>
                            <td><?php echo $txt_peringkat_prodi_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 2</td>
                            <td>:</td>
                            <td><?php echo $txt_jml_terima_pilihan_2; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-panel uk-panel-box uk-panel-box-primary">
                    <h3 class="uk-panel-title"><i class="uk-icon-building-o"></i> Data Universitas</h3>
                    <table class="uk-table">
                        <caption>Pilihan 1</caption>
                        <tr>
                            <td style="width: 40%;">Universitas</td>
                            <td>:</td>
                            <td><?php echo $universitas_deskripsi_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Prodi</td>
                            <td>:</td>
                            <td><?php echo $universitas_prodi_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tren Jumlah Pendaftar Selama 3 Tahun</td>
                            <td>:</td>
                            <td><?php echo $universitas_peminat_thn_lalu_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tren Jumlah yang Diterima Selama 3 Tahun</td>
                            <td>:</td>
                            <td><?php echo $universitas_daya_tampung_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tingkat Keketatan Prodi</td>
                            <td>:</td>
                            <td><?php echo $tingkat_keketatan_1; ?> % | 1 : <?php echo $perbandingan_keketatan_1; ?> | <?php echo $interpretasi_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Rata Atas</td>
                            <td>:</td>
                            <td><?php echo $universitas_rata_rapor_atas_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Rata Bawah</td>
                            <td>:</td>
                            <td><?php echo $universitas_rata_rapor_bawah_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Penerimaan Jabar | Jakarta | Banten</td>
                            <td>:</td>
                            <td><?php echo $universitas_jabar_1." | ".$universitas_jakarta_1." | ".$universitas_banten_1; ?></td>
                        </tr>
                    </table>
                    <table class="uk-table">
                        <caption>Pilihan 2</caption>
                        <tr>
                            <td style="width: 40%;">Universitas</td>
                            <td>:</td>
                            <td><?php echo $universitas_deskripsi_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Prodi</td>
                            <td>:</td>
                            <td><?php echo $universitas_prodi_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tren Jumlah Pendaftar Selama 3 Tahun</td>
                            <td>:</td>
                            <td><?php echo $universitas_peminat_thn_lalu_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tren Jumlah yang Diterima Selama 3 Tahun</td>
                            <td>:</td>
                            <td><?php echo $universitas_daya_tampung_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Tingkat Keketatan Prodi</td>
                            <td>:</td>
                            <td><?php echo $tingkat_keketatan_2; ?> % | 1 : <?php echo $perbandingan_keketatan_2; ?> | <?php echo $interpretasi_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Rata Atas</td>
                            <td>:</td>
                            <td><?php echo $universitas_rata_rapor_atas_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Rata Bawah</td>
                            <td>:</td>
                            <td><?php echo $universitas_rata_rapor_bawah_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">Penerimaan Jabar | Jakarta | Banten</td>
                            <td>:</td>
                            <td><?php echo $universitas_jabar_2." | ".$universitas_jakarta_2." | ".$universitas_banten_2; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed" style="border: 1px solid;">
            <thead>
                <tr>
                    <th>ASUMSI</th>
                    <th>NO</th>
                    <th>KETERANGAN</th>
                    <th colspan="2">ANALISA KUALITATIF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th rowspan="3">PERSAINGAN DI SEKOLAH</th>
                    <td>1</td>
                    <td>Berdasarkan analisa peringkat reguler sekolah, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="2"><?php echo $analisa_peringkat_reguler_sekolah; ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Berdasarkan analisa peringkat peminatan prodi 1, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="2"><?php echo $analisa_peringkat_peminatan_prodi_1; ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Berdasarkan analisa peringkat peminatan prodi 2, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="2"><?php echo $analisa_peringkat_peminatan_prodi_2; ?></td>
                </tr>
                <tr>
                    <th>PERSAINGAN PRODI PADA TAHUN LALU</th>
                    <td>4</td>
                    <td>Berdasarkan tingkat keketatan jurusan, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> sebaiknya memilih</td>
                    <td colspan="2"><?php echo $analisa_persaingan_prodi_thn_lalu; ?></td>
                </tr>
                <tr>
                    <th rowspan="2">NILAI RAPOR</th>
                    <td>5</td>
                    <td>Berdasarkan nilai rapor, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> memiliki peluang pada pilihan 1</td>
                    <!-- <td><?php echo number_format($peluang_nilai_rapor_1,2); ?>%</td> -->
                    <td><?php echo ucwords(strtolower($analisa_peluang_rapor_1)); ?></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Berdasarkan nilai rapor, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> memiliki peluang pada pilihan 2</td>
                    <!-- <td><?php echo number_format($peluang_nilai_rapor_2,2); ?>%</td> -->
                    <td><?php echo ucwords(strtolower($analisa_peluang_rapor_2)); ?></td>
                </tr>
                <tr>
                    <th rowspan="2">PREDIKSI PELUANG TOTAL</th>
                    <td></td>
                    <td style="font-weight: bold;">Pada Program Studi 1</td>
                    <td style="font-weight: bold;"><?php echo number_format($nilai_prediksi_peluang_total_1,2); ?>% (<?php echo ucwords($str_prediksi_peluang_total_1); ?>)</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bold;">Pada Program Studi 2</td>
                    <td style="font-weight: bold;"><?php echo number_format($nilai_prediksi_peluang_total_2,2); ?>% (<?php echo ucwords($str_prediksi_peluang_total_2); ?>)</td>
                </tr>
            </tbody>
        </table>
        <form class="uk-form uk-form-stacked" method="post" action="<?php echo base_url("simulasi/simpan"); ?>">
            <input type="hidden" name="txt_siswa_id" value="<?php echo $siswa_id; ?>">
            <input type="hidden" name="txt_siswa_nama" value="<?php echo $siswa_nama; ?>">
            <input type="hidden" name="txt_siswa_jurusan" value="<?php echo $siswa_jurusan; ?>">
            <input type="hidden" name="txt_siswa_cabang" value="<?php echo $siswa_cabang; ?>">
            <input type="hidden" name="txt_rata_rata" value="<?php echo $txt_rata_rata; ?>">
            <input type="hidden" name="txt_siswa_sekolah" value="<?php echo $siswa_sekolah; ?>">
            <input type="hidden" name="txt_siswa_sekolah_akreditas" value="<?php echo $siswa_sekolah_akreditas; ?>">
            <input type="hidden" name="txt_siswa_ta" value="<?php echo $siswa_ta; ?>">
            <input type="hidden" name="txt_siswa_hasil_tes_minat" value="<?php echo $siswa_hasil_tes_minat; ?>">

            <input type="hidden" name="txt_peringkat_reguler_sekolah" value="<?php echo $txt_peringkat_reguler_sekolah; ?>">
            <input type="hidden" name="txt_jml_terima_thn_lalu" value="<?php echo $txt_jml_terima_thn_lalu; ?>">

            <input type="hidden" name="txt_peringkat_prodi_1" value="<?php echo $txt_peringkat_prodi_1; ?>">
            <input type="hidden" name="txt_terima_pilihan_1" value="<?php echo $txt_jml_terima_pilihan_1; ?>">

            <input type="hidden" name="txt_peringkat_prodi_2" value="<?php echo $txt_peringkat_prodi_2; ?>">
            <input type="hidden" name="txt_terima_pilihan_2" value="<?php echo $txt_jml_terima_pilihan_2; ?>">

            <input type="hidden" name="txt_universitas_deskripsi_1" value="<?php echo $universitas_deskripsi_1; ?>">
            <input type="hidden" name="txt_universitas_prodi_1" value="<?php echo $universitas_prodi_1; ?>">
            <input type="hidden" name="txt_universitas_peminat_thn_lalu_1" value="<?php echo $universitas_peminat_thn_lalu_1; ?>">
            <input type="hidden" name="txt_universitas_daya_tampung_1" value="<?php echo $universitas_daya_tampung_1; ?>">
            <input type="hidden" name="txt_tingkat_keketatan_1" value="<?php echo $tingkat_keketatan_1; ?>">
            <input type="hidden" name="txt_perbandingan_keketatan_1" value="<?php echo $perbandingan_keketatan_1; ?>">
            <input type="hidden" name="txt_universitas_rata_rapor_atas_1" value="<?php echo $universitas_rata_rapor_atas_1; ?>">
            <input type="hidden" name="txt_universitas_rata_rapor_bawah_1" value="<?php echo $universitas_rata_rapor_bawah_1; ?>">
            <input type="hidden" name="txt_universitas_jabar_1" value="<?php echo $universitas_jabar_1; ?>">
            <input type="hidden" name="txt_universitas_jakarta_1" value="<?php echo $universitas_jakarta_1; ?>">
            <input type="hidden" name="txt_universitas_banten_1" value="<?php echo $universitas_banten_1; ?>">

            <input type="hidden" name="txt_universitas_deskripsi_2" value="<?php echo $universitas_deskripsi_2; ?>">
            <input type="hidden" name="txt_universitas_prodi_2" value="<?php echo $universitas_prodi_2; ?>">
            <input type="hidden" name="txt_universitas_peminat_thn_lalu_2" value="<?php echo $universitas_peminat_thn_lalu_2; ?>">
            <input type="hidden" name="txt_universitas_daya_tampung_2" value="<?php echo $universitas_daya_tampung_2; ?>">
            <input type="hidden" name="txt_tingkat_keketatan_2" value="<?php echo $tingkat_keketatan_2; ?>">
            <input type="hidden" name="txt_perbandingan_keketatan_2" value="<?php echo $perbandingan_keketatan_2; ?>">
            <input type="hidden" name="txt_universitas_rata_rapor_atas_2" value="<?php echo $universitas_rata_rapor_atas_2; ?>">
            <input type="hidden" name="txt_universitas_rata_rapor_bawah_2" value="<?php echo $universitas_rata_rapor_bawah_2; ?>">
            <input type="hidden" name="txt_universitas_jabar_2" value="<?php echo $universitas_jabar_2; ?>">
            <input type="hidden" name="txt_universitas_jakarta_2" value="<?php echo $universitas_jakarta_2; ?>">
            <input type="hidden" name="txt_universitas_banten_2" value="<?php echo $universitas_banten_2; ?>">

            <input type="hidden" name="txt_analisa_peringkat_reguler_sekolah" value="<?php echo $analisa_peringkat_reguler_sekolah; ?>">
            <input type="hidden" name="txt_analisa_peringkat_peminatan_prodi_1" value="<?php echo $analisa_peringkat_peminatan_prodi_1; ?>">
            <input type="hidden" name="txt_analisa_peringkat_peminatan_prodi_2" value="<?php echo $analisa_peringkat_peminatan_prodi_2; ?>">
            <input type="hidden" name="txt_analisa_persaingan_prodi_thn_lalu" value="<?php echo $analisa_persaingan_prodi_thn_lalu; ?>">
            <input type="hidden" name="txt_peluang_nilai_rapor_1" value="<?php echo $peluang_nilai_rapor_1; ?>">
            <input type="hidden" name="txt_analisa_peluang_rapor_1" value="<?php echo $analisa_peluang_rapor_1; ?>">
            <input type="hidden" name="txt_peluang_nilai_rapor_2" value="<?php echo $peluang_nilai_rapor_2; ?>">
            <input type="hidden" name="txt_analisa_peluang_rapor_2" value="<?php echo $analisa_peluang_rapor_2; ?>">

            <input type="hidden" name="opt_peminatan_1" value="<?php echo $opt_peminatan_1; ?>">
            <input type="hidden" name="opt_peminatan_2" value="<?php echo $opt_peminatan_2; ?>">

            <input type="hidden" name="txt_nilai_prediksi_peluang_total_1" value="<?php echo $nilai_prediksi_peluang_total_1; ?>">
            <input type="hidden" name="txt_nilai_prediksi_peluang_total_2" value="<?php echo $nilai_prediksi_peluang_total_2; ?>">
            <input type="hidden" name="txt_prediksi_peluang_total_1" value="<?php echo $str_prediksi_peluang_total_1; ?>">
            <input type="hidden" name="txt_prediksi_peluang_total_2" value="<?php echo $str_prediksi_peluang_total_2; ?>">

            <label for="txt_catatan_bikon" class="uk-form-label">Catatan Bikon: (Lihat informasi regional sekolah - PTN, analisa potensi diri, alternatif PTN lain jika dibutuhkan)</label>
            <textarea name="txt_catatan_bikon" cols="100" rows="5"></textarea>
            <button type="submit" name="btn_simpan" value="btn_simpan" class="uk-button">Simpan</button>
        </form>
    </div>
</article>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ucwords(APPS_TITLE); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/print.css"); ?>">
    </head>
    <body>
        <div class="uk-panel uk-panel-header">
            <h3 class="uk-panel-title" style="text-align:center;">HASIL SIMULASI SNMPTN <?php echo $siswa_ta; ?><br>
            <span style="font-size:10px;">Sistem Informasi Penjurusan Kuliah - Bintang Pelajar</span></h3>
            <table class="uk-table uk-table-condensed">
                <tr>
                    <td style="width: 150px;">Nama</td>
                    <td style="width: 5px;">:</td>
                    <td><?php echo $siswa_nama; ?></td>
                    <td>Jurusan Hasil Tes Minat Bakat BP :</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jurusan</td>
                    <td style="width: 5px;">:</td>
                    <td><?php echo $siswa_jurusan; ?></td>
                </tr>
                <tr>
                    <td>Cabang</td>
                    <td>:</td>
                    <td><?php echo $siswa_cabang; ?></td>
                    <td rowspan="3"><?php echo $siswa_hasil_tes_minat; ?></td>
                </tr>
                <tr>
                    <td>Nilai Rataan Sm 1 sd 5</td>
                    <td>:</td>
                    <td><?php echo $rata_rata; ?></td>
                </tr>
            </table>
        </div>

        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title">Data Sekolah</h3>
                    <table class="uk-table uk-table-condensed">
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
                            <td><?php echo $peringkat_reguler_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Di Sekolah</td>
                            <td>:</td>
                            <td><?php echo $jml_terima_thn_lalu; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Peringkat Reguler Di Prodi 1</td>
                            <td>:</td>
                            <td><?php echo $peringkat_prodi_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 1</td>
                            <td>:</td>
                            <td><?php echo $jml_terima_pilihan_1; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Peringkat Reguler Di Prodi 2</td>
                            <td>:</td>
                            <td><?php echo $peringkat_prodi_2; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Jumlah Siswa Yang Diterima SMPTN Tahun Lalu Prodi 2</td>
                            <td>:</td>
                            <td><?php echo $jml_terima_pilihan_2; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title">Data Universitas</h3>
                    <table class="uk-table uk-table-condensed">
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

        <table class="uk-table uk-table-condensed uk-table-border">
            <thead>
                <tr>
                    <th>ASUMSI</th>
                    <th>KETERANGAN</th>
                    <th colspan="2">ANALISA KUALITATIF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th rowspan="3" style="vertical-align: text-top;">PERSAINGAN DI SEKOLAH</th>
                    <td>Berdasarkan analisa peringkat reguler sekolah, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="3"><?php echo $analisa_peringkat_reguler_sekolah; ?></td>
                </tr>
                <tr>
                    <td>Berdasarkan analisa peringkat peminatan prodi 1, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="3"><?php echo $analisa_peringkat_peminatan_prodi_1; ?></td>
                </tr>
                <tr>
                    <td>Berdasarkan analisa peringkat peminatan prodi 2, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span></td>
                    <td colspan="3"><?php echo $analisa_peringkat_peminatan_prodi_2; ?></td>
                </tr>
                <tr>
                    <th>PERSAINGAN PRODI PADA TAHUN LALU</th>
                    <td>Berdasarkan tingkat keketatan jurusan, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> sebaiknya memilih</td>
                    <td colspan="3"><?php echo $analisa_persaingan_prodi_thn_lalu; ?></td>
                </tr>
                <tr>
                    <th rowspan="2" style="vertical-align: text-top;">NILAI RAPOR</th>
                    <td colspan="2">Berdasarkan nilai rapor, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> memiliki peluang pada pilihan 1</td>
                    <!-- <td><?php echo number_format($peluang_nilai_rapor_1,2); ?></td> -->
                    <td><?php echo ucwords($analisa_peluang_rapor_1); ?></td>
                </tr>
                <tr>
                    <td colspan="2">Berdasarkan nilai rapor, maka <span class="uk-text-bold"><?php echo $siswa_nama; ?></span> memiliki peluang pada pilihan 2</td>
                    <!-- <td><?php echo number_format($peluang_nilai_rapor_2,2); ?></td> -->
                    <td><?php echo ucwords($analisa_peluang_rapor_2); ?></td>
                </tr>
                <tr>
                    <th rowspan="2" style="vertical-align: text-top;">PREDIKSI PELUANG TOTAL</th>
                    <td>Pada Program Studi 1</td>
                    <td><?php echo number_format($nilai_prediksi_peluang_total_1,2); ?>%</td>
                    <td><?php echo ucwords(strtolower($prediksi_peluang_total_1)); ?></td>
                </tr>
                <tr>
                    <td>Pada Program Studi 2</td>
                    <td><?php echo number_format($nilai_prediksi_peluang_total_2,2); ?>%</td>
                    <td><?php echo ucwords(strtolower($prediksi_peluang_total_2)); ?></td>
                </tr>
                <tr>
                    <th>Catatan Bikon: (Lihat informasi regional sekolah - PTN, analisa potensi diri, alternatif PTN lain jika dibutuhkan)</th>
                    <td colspan="4"><?php echo $catatan_bikon; ?></td>
                </tr>
            </tbody>
        </table>
        <footer style="position: absolute;bottom: 10px; left: 10px;font-size:9px;">
            Catatan: Semua nilai peluang yang tertera pada simulasi ini memiliki tingkat akurasi 52 - 67%. Hal ini dikarenakan peluang masuk SNMPTN dipengaruhi oleh banyak variabel bebas yang tidak dapat diprediksi seperti: tingkat persaingan (jumlah pendaftar, kuota, nilai rapor pendaftar) hingga kebijakan internal PTN.
        </footer>
    </body>
</html>

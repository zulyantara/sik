                </div> <!-- end tara-body -->
            </div> <!-- end uk-panel -->
        </div> <!-- end uk-container -->

        <div id="canvas-master" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul data-uk-nav="" class="uk-nav uk-nav-offcanvas uk-nav-parent-icon">
                    <li class="uk-nav-header">Menu Master</li>
                    <li id="cabang"><a href="<?php echo base_url("cabang"); ?>">Cabang</a></li>
                    <li class="uk-parent">
                        <a href="#">Sekolah</a>
                        <ul class="uk-nav-sub">
                            <li id="sekolah"><a href="<?php echo base_url("sekolah"); ?>">Sekolah</a></li>
                            <li id="jurusan"><a href="<?php echo base_url("jurusan"); ?>">Jurusan</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="#">Universitas</a>
                        <ul class="uk-nav-sub">
                            <li id="universitas"><a href="<?php echo base_url("universitas"); ?>">Universitas</a></li>
                            <li id="fakultas"><a href="<?php echo base_url("fakultas"); ?>">Program Studi</a></li>
                        </ul>
                    </li>
                    <li id="siswa"><a href="<?php echo base_url("siswa"); ?>">Siswa</a></li>
<!--                    <li class="uk-parent">
                        <a href="#">Siswa</a>
                        <ul class="uk-nav-sub">
                            <li id="siswa"><a href="<?php echo base_url("siswa"); ?>">Siswa</a></li>
                            <li id="siswa_nilai"><a href="<?php echo base_url("siswa_nilai"); ?>">Nilai Rapor</a></li>
                        </ul>
                    </li>
-->                </ul>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#<?php echo $title; ?>").addClass("uk-active");
        });
        </script>
    </body>
</html>

<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$defaultRoute = "/people3/" . $user . "/";

if ($_SERVER['SERVER_ADDR'] === '127.0.0.1') {
    $defaultRoute = "/people3/" . $user . "/";
}
?>
<div class="navigasyon">
    <nav  id="nav1" class="navbar navbar-inverse border-radius-0">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $defaultRoute; ?>"><img src="<?php echo base_url('assets/resimler/logo2.png'); ?>"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li <?php
                    if (false) {
                        echo 'class="active"';
                    }
                    ?>><a href="<?php echo $defaultRoute; ?>"><i class="fa fa-home fa-2x"></i> <span>Anasayfa </span></a></li>
                    <li <?php
                    if (false) {
                        echo 'class="active"';
                    }
                    ?>><a href="<?php echo $defaultRoute; ?>hakkinda"><i class="fa fa-user fa-2x"></i> <span>Hakkında</span></a></li>
                    <li <?php
                        if (false) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo $defaultRoute; ?>akademik"><i class="fa fa-university fa-2x"></i> <span>Akademik</span></a></li>
                    <li <?php
                    if (false) {
                        echo 'class="active"';
                    }
                    ?>><a href="<?php echo $defaultRoute; ?>yayinlar"><i class="fa fa-book fa-2x"></i> <span>Yayınlar</span></a></li>
                    <li <?php
                        if (false) {
                            echo 'class="active"';
                        }
                    ?>><a href="<?php echo $defaultRoute; ?>egitimekatki"><i class="fa fa-pencil fa-2x"></i> <span>Eğitime Katkı</span></a></li>
                    <li <?php
                    if (false) {
                        echo 'class="active"';
                    }
                    ?>><a href="<?php echo $defaultRoute; ?>duyurular/" title="<?php echo $navigasyon[0]->duyuruSayisi ?> etkin duyuru"><i class="fa fa-bell fa-2x"></i> Duyurular 
                    <?php if ($navigasyon[0]->duyuruSayisi > 0): ?>
                                <span class="badge"><?php echo $navigasyon[0]->duyuruSayisi ?></span>
                        <?php endif; ?>
                        </a></li>
                    <li <?php
                        if (false) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo $defaultRoute; ?>iletisim"><i class="fa fa-envelope fa-2x"></i> <span>İletişim</span></a></li>

<?php if (!$this->session->userdata('oturum')): ?>


                        <li <?php
    if (false) {
        echo 'class="active"';
    }
    ?>><a href="<?php echo base_url(); ?>"><i class="fa fa-sign-in fa-2x"></i> <span>Personel Giriş</span></a></li>
<?php endif; ?>     
                </ul>
            </div> 
        </div>
    </nav>
</div>

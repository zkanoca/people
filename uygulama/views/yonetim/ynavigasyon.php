<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$menu = array(
    'profil' => array(
        'text' => 'Profil Bilgileri',
        'renk' => 'info',
        'parent' => 'profil',
        'ogeler' => array(
            array('fa' => 'user', 'label' => 'Özgeçmiş', 'url' => 'ozgecmis'),
            array('fa' => 'flask', 'label' => 'Uzmanlık Alanları', 'url' => 'uzmanlik-alanlari'),
            array('fa' => 'ship', 'label' => 'Araştırma Alanları', 'url' => 'arastirma-alanlari'),
            array('fa' => 'phone', 'label' => 'İletişim Bilgileri', 'url' => 'iletisim-bilgileri'),
            array('fa' => 'camera', 'label' => 'Fotoğraf', 'url' => 'fotograf')
        )
    ),
    'akademik' => array(
        'text' => 'Akademik',
        'renk' => 'success',
        'parent' => 'akademik',
        'ogeler' => array(
            array('fa' => 'cogs', 'label' => 'Bilimsel Etkinlikler', 'url' => 'bilimsel-etkinlikler'),
            array('fa' => 'pencil', 'label' => 'Editörlükler', 'url' => 'editorlukler'),
            array('fa' => 'align-justify', 'label' => 'Hakemlikler', 'url' => 'hakemlikler'),
            array('fa' => 'tasks', 'label' => 'İdari Görevler', 'url' => 'idari-gorevler'),
            array('fa' => 'gift', 'label' => 'Ödüller', 'url' => 'oduller'),
            array('fa' => 'university', 'label' => 'Öğrenim Bilgileri', 'url' => 'ogrenim-bilgileri'),
            array('fa' => 'lightbulb-o', 'label' => 'Projeler', 'url' => 'projeler'),
            array('fa' => 'users', 'label' => 'Üyelikler', 'url' => 'uyelikler'),
        )
    ),
    'egitime-katki' => array(
        'text' => 'Eğitime Katkı',
        'parent' => 'egitime-katki',
        'renk' => 'warning',
        'ogeler' => array(
            array('fa' => 'book', 'label' => 'Dersler', 'url' => 'dersler'),
            //array('fa' => 'book', 'label' => 'Önceki Dersler', 'url' => 'onceki-dersler'),
            array('fa' => 'pencil-square', 'label' => 'Yönetilen Tezler', 'url' => 'tezler'),
        )
    ),
    'yayinlar' => array(
        'text' => 'Yayınlar',
        'renk' => 'danger',
        'parent' => 'yayinlar',
        'ogeler' => array(
            array('fa' => 'file-powerpoint-o', 'label' => 'Bildiriler', 'url' => 'bildiriler'),
            array('fa' => 'file-text', 'label' => 'Bilimsel Raporlar', 'url' => 'bilimsel-raporlar'),
            array('fa' => 'book', 'label' => 'Kitaplar', 'url' => 'kitaplar'),
            array('fa' => 'files-o', 'label' => 'Makaleler', 'url' => 'makaleler'),
            array('fa' => 'briefcase', 'label' => 'Patentler', 'url' => 'patentler'),
            array('fa' => 'paint-brush', 'label' => 'Sanat Etkinlikleri', 'url' => 'sanat-etkinlikleri'),
            array('fa' => 'futbol-o', 'label' => 'Spor Etkinlikleri', 'url' => 'spor-etkinlikleri'),
        )
    ),
//    'duyurular' => array(
//        'text' => 'Duyurular',
//        'renk' => 'info',
//        'ogeler' => array(
//            array('fa' => 'bullhorn', 'label' => 'Güncel Duyurular'),
//            array('fa' => 'clock-o', 'label' => 'Önceki Duyurular')
//        )
//    )
);
?>


<div class="row">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() . $user; ?>/yonetim">Uzm. Özkan ÖZLÜ | Yönetim Paneli</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php foreach ($menu as $m): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $m['text'] ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach ($m['ogeler'] as $mm): ?>
                                        <li><a href="<?php echo base_url() . $user; ?>/yonetim/<?php echo $mm['url']; ?>"><i class="fa fa-<?php echo $mm['fa']; ?>"></i> <?php echo $mm['label'] ?></a></li>
                                    <?php endforeach; ?>

                                </ul>
                            </li>
                        <?php endforeach; ?>
                        <li><a  href="<?php echo base_url() . $user; ?>/yonetim/duyurular" target="_blank" title="Duyurular"><i class="fa fa-bullhorn"></i> Duyurular</a></li>
                        <li><a  href="<?php echo base_url() . $user; ?>" target="_blank" title="Sayfa önizlemesi"><i class="fa fa-eye"></i> Önizleme</a></li>
                        <li><a  href="cikis" title="Oturumu kapat"><i class="fa fa-sign-out"></i> Çıkış</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>





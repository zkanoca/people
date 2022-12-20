


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-bildiri" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Bildiri</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Bildiri Başlığı</th>
            <th>Etkinlik Adı</th>
            <th>Tarih</th>
            <th>Atıf Sayısı</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bildiriler as $b): ?>

            <tr id="bildiri-<?php echo $b->bildiriid; ?>">
                <td><?php echo $b->baslik; ?></td>
                <td><?php echo $b->etkinlik_adi; ?></td>
                <td><?php echo date('d.m.Y', strtotime($b->etkinlik_bitis_tarihi)); ?> - <?php
                    echo date('d.m.Y', strtotime($b->etkinlik_bitis_tarihi));
                    ?></td>
                <td class="text-center">
                    <a href="#" id="bildiri-guncelle-<?php echo $b->bildiriid; ?>" data-id="<?php echo $b->bildiriid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="bildiri-sil-<?php echo $b->bildiriid; ?>" data-id="<?php echo $b->bildiriid; ?>" data-baslik="<?php echo $b->baslik; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="bildiri-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bildiri Güncelle</h4>
            </div>
            <div class="modal-body" id="bildiri_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="bildiri-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bildiri Sil</h4>
            </div>
            <div class="modal-body" id="bildiri_silme_formu">

                <h4>Gerçekten bu bildiriyi silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_bildiri_adi"></p>
                <input type="hidden" id="silinecek_bildiri_id" name="silinecek_bildiri_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade modal-lg" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="bildiri-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Bildiri Ekle</h4>
            </div>
            <div class="modal-body" id="bildiri_ekleme_formu">
                <?php
                foreach ($bildiri_kategorileri as $bk) {
                    $data_bk[$bk->bildiri_kategoriid] = $bk->bildiri_kategorisi;
                }

                foreach ($basim_turleri as $bt) {
                    $data_bt[$bt->basim_turid] = $bt->basim_turu;
                }

                foreach ($bildiri_yayin_durumlari as $byd) {
                    $data_byd[$byd->bildiri_yayin_durumid] = $byd->bildiri_yayin_durumu;
                }

                foreach ($diller as $di) {
                    $data_di[$di->dilid] = $di->dil;
                }

                foreach ($ulkeler as $u) {
                    $data_u[$u->ulkeid] = $u->ulke;
                }

                $yazarlar = array(
                    'class' => 'form-control',
                    'rows' => '2',
                    'id' => 'yazarlar',
                    'name' => 'yazarlar'
                );

                $yazar_sayisi = array(
                    'type' => 'number',
                    'id' => 'yazar_sayisi',
                    'name' => 'yazar_sayisi',
                    'class' => 'form-control',
                    'value' => '1'
                );

                $yazar_siralamasi = array(
                    'type' => 'number',
                    'id' => 'yazar_siralamasi',
                    'name' => 'yazar_siralamasi',
                    'class' => 'form-control',
                    'value' => '1'
                );

                $baslik = array(
                    'type' => 'text',
                    'name' => 'baslik',
                    'id' => 'baslik',
                    'value' => '',
                    'class' => 'form-control'
                );

                $etkinlik_adi = array(
                    'type' => 'text',
                    'name' => 'etkinlik_adi',
                    'id' => 'etkinlik_adi',
                    'value' => '',
                    'class' => 'form-control'
                );

                $sehir = array(
                    'type' => 'text',
                    'id' => 'sehir',
                    'name' => 'sehir',
                    'class' => 'form-control'
                );

                $alan_bilgisi = array(
                    'rows' => '2',
                    'id' => 'alan_bilgisi',
                    'name' => 'alan_bilgisi',
                    'class' => 'form-control'
                );

                $etkinlik_baslangic_tarihi = array(
                    'type' => 'text',
                    'id' => 'etkinlik_baslangic_tarihi',
                    'name' => 'etkinlik_baslangic_tarihi',
                    'class' => 'form-control',
                    'value' => date('Y-m-d')
                );

                $etkinlik_bitis_tarihi = array(
                    'type' => 'text',
                    'id' => 'etkinlik_bitis_tarihi',
                    'name' => 'etkinlik_bitis_tarihi',
                    'class' => 'form-control',
                    'value' => date('Y-m-d')
                );

                $basim_tarihi = array(
                    'type' => 'text',
                    'id' => 'basim_tarihi',
                    'name' => 'basim_tarihi',
                    'class' => 'form-control',
                    'value' => date('Y-m-d')
                );

                $cilt = array(
                    'type' => 'text',
                    'id' => 'cilt',
                    'name' => 'cilt',
                    'class' => 'form-control'
                );

                $sayi = array(
                    'type' => 'text',
                    'id' => 'sayi',
                    'name' => 'sayi',
                    'class' => 'form-control'
                );

                $ozel_sayi = array('0' => 'Hayır', '1' => 'Evet');

                $ilk_sayfa = array(
                    'type' => 'number',
                    'id' => 'ilk_sayfa',
                    'name' => 'ilk_sayfa',
                    'class' => 'form-control',
                    'value' => '1',
                );

                $son_sayfa = array(
                    'type' => 'number',
                    'id' => 'son_sayfa',
                    'name' => 'son_sayfa',
                    'class' => 'form-control',
                    'value' => '10',
                );

                $doi = array(
                    'type' => 'text',
                    'id' => 'doi',
                    'name' => 'doi',
                    'class' => 'form-control'
                );

                $isbn = array(
                    'type' => 'text',
                    'id' => 'isbn',
                    'name' => 'isbn',
                    'class' => 'form-control'
                );

                $issn = array(
                    'type' => 'text',
                    'id' => 'issn',
                    'name' => 'issn',
                    'class' => 'form-control'
                );

                $sponsor = array('0' => 'Hayır', '1' => 'Evet');

                $toplam_atif_sayisi = array(
                    'type' => 'number',
                    'id' => 'toplam_atif_sayisi',
                    'name' => 'toplam_atif_sayisi',
                    'class' => 'form-control'
                );

                $form_url = $user . '/yonetim/bildiri-ekle-islem';
                echo form_open($form_url,
                        array('class' => 'form-signin well well-lg', 'id' => 'form_bildiri_ekle'));
                ?>
                <div class="form-group">
                    <label for="baslik">Bildiri Başlığı</label>
                    <?php echo form_input($baslik); ?>
                </div>
                <div class="form-group">
                    <label for="etkinlik_adi">Etkinlik Adı</label>
                    <?php echo form_input($etkinlik_adi); ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="etkinlik_baslangic_tarihi">Başlangıç Tarihi</label>
                        <?php echo form_input($etkinlik_baslangic_tarihi); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="etkinlik_baslangic_tarihi">Başlangıç Tarihi</label>
                        <?php echo form_input($etkinlik_bitis_tarihi); ?>
                    </div>
                </div>
                <?php
                echo form_hidden('eposta', $this->session->userdata('eposta'));
                ?>
                <?php echo form_close(); ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-success" id="kaydetBtn">Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>$(function() {
        $("a[id^='bildiri-guncelle-']").click(
                function() {
                    $.get("bildiri-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#bilimsel_etkinlik_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "bildiri-guncelle-islem/" + $("input[name='bilimsel_etkinlikid']").val(),
                data: $("form#form_bilimsel_etkinlik_guncelle").serialize(),
                success: function(data)
                {
                    $("#bilimsel_etkinlik_guncelleme_formu").html(data);
                    $("#bilimsel_etkinlik_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#bilimsel_etkinlik_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='bildiri-sil-']").click(
                function() {
                    $("p#modal_silinecek_etkinlik_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_etkinlik_id']").val($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "bildiri-sil-islem/" + $("input[name='silinecek_etkinlik_id']").val(),
                data: $("input[name='silinecek_etkinlik_id']").val(),
                success: function(data)
                {
                    $("#bilimsel_etkinlik_silme_formu").html(data);
                    $("#bilimsel_etkinlik_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#bilimsel_etkinlik_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "bildiri-ekle-islem",
                data: $("form#form_bilimsel_etkinlik_ekle").serialize(),
                success: function(data)
                {
                    $("#bilimsel_etkinlik_ekleme_formu").html(data);
                    $("#bilimsel_etkinlik_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#bilimsel_etkinlik_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
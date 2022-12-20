


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-hakemlik" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Hakemlik</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Yayın Adı</th>
            <th>Yayınevi</th>
            <th>Hakemlik Türü</th>
            <th>DOI Numarası</th>
            <th>Yıl</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hakemlikler as $h): ?>

            <tr id="hakemlik-<?php echo $h->hakemlikid; ?>">
                <td><?php echo $h->yayin_adi; ?></td>
                <td><?php echo $h->yayinevi; ?></td>
                <td><?php echo $h->hakemlik_turu; ?></td>
                <td><?php echo $h->doi; ?></td>
                <td><?php echo $h->yil; ?></td>
                <td class="text-center">
                    <a href="#" id="hakemlik-guncelle-<?php echo $h->hakemlikid; ?>" data-id="<?php echo $h->hakemlikid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="hakemlik-sil-<?php echo $h->hakemlikid; ?>" data-id="<?php echo $h->hakemlikid; ?>" data-baslik="<?php echo $h->yayin_adi; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="hakemlik-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hakemlik Güncelle</h4>
            </div>
            <div class="modal-body" id="hakemlik_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="hakemlik-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hakemlik Sil</h4>
            </div>
            <div class="modal-body" id="hakemlik_silme_formu">

                <h4>Gerçekten bu hakemlik bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_hakemlik_adi"></p>
                <input type="hidden" id="silinecek_hakemlik_id" name="silinecek_hakemlik_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="hakemlik-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Hakemlik Ekle</h4>
            </div>
            <div class="modal-body" id="hakemlik_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('hakemlik-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_hakemlik_ekle'));
                ?>
                <div class="form-group row">
                    <label for="yayin_adi">Yayın Adı</label>
                    <?php
                    $yayin_adi = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'yayin_adi',
                        'name' => 'yayin_adi',
                        'value' => ''
                    );
                    echo form_input($yayin_adi);
                    ?>

                    <label for="yayinevi">Yayınevi</label>
                    <?php
                    $yayinevi = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'yayinevi',
                        'name' => 'yayinevi',
                        'value' => ''
                    );
                    echo form_input($yayinevi);
                    ?>


                    <label for="alan_bilgisi">Alan Bilgisi</label>
                    <?php
                    $alan_bilgisi = array(
                        'rows' => '3',
                        'class' => 'form-control',
                        'id' => 'alan_bilgisi',
                        'name' => 'alan_bilgisi'
                    );
                    echo form_textarea($alan_bilgisi);
                    ?>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="hakemlik_turid">Hakemlik Türü</label>
                        <?php
                        foreach ($hakemlik_turleri as $ht) {
                            $data_ht[$ht->hakemlik_turid] = $ht->hakemlik_turu;
                        }

                        echo form_dropdown('hakemlik_turid', $data_ht, NULL,
                                'class="form-control"');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="makale_indeksid">Makale İndeksi</label>
                        <?php
                        foreach ($makale_indeksleri as $mi) {
                            $data_mi[$mi->makale_indeksid] = $mi->makale_indeks;
                        }

                        echo form_dropdown('makale_indeksid', $data_mi, NULL,
                                'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="yayin_kapsamid">Yayın Kapsamı</label>
                        <?php
                        foreach ($yayin_kapsamlari as $yk) {
                            $data_yk[$yk->yayin_kapsamid] = $yk->yayin_kapsami;
                        }

                        echo form_dropdown('yayin_kapsamid', $data_yk,
                                $h->yayin_kapsamid,
                                array('class' => 'form-control'));
//echo form_dropdown('yayin_kapsamid', array('1' => 'Uluslararası', '2' => 'Ulusal'), NULL, 'class="form-control"'); 
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="basim_turid">Basım Türü</label>
                        <?php
                        foreach ($basim_turleri as $bt) {
                            $data_bt[$bt->basim_turid] = $bt->basim_turu;
                        }

                        echo form_dropdown('basim_turid', $data_bt, NULL,
                                'class="form-control"');
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="dilid">Dil</label>
                        <?php
                        foreach ($diller as $d) {
                            $data_d[$d->dilid] = $d->dil;
                        }
                        echo form_dropdown('dilid', $data_d, NULL,
                                'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="ulkeid">Ülke</label>
                        <?php
                        foreach ($ulkeler as $u) {
                            $data_u[$u->ulkeid] = $u->ulke;
                        }

                        echo form_dropdown('ulkeid', $data_u, NULL,
                                'class="form-control"');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="sehir">Şehir</label>
                        <?php
                        $sehir = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'sehir',
                            'name' => 'sehir',
                            'value' => ''
                        );
                        echo form_input($sehir);
                        ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="doi">DOI numarası</label>
                        <?php
                        $doi = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'doi',
                            'name' => 'doi',
                            'value' => ''
                        );
                        echo form_input($doi);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="yil">Yıl</label>
                        <?php
                        $yil = array(
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'yil',
                            'name' => 'yil',
                            'value' => date('Y')
                        );
                        echo form_input($yil);
                        ?>
                    </div>
                </div>
                <?php
                echo form_close();
                /*                 * **************** */
                ?>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">İptal</button>
                <button type = "button" class = "btn btn-success" id = "kaydetBtn">Kaydet</button>
            </div>
        </div><!--/.modal-content -->
    </div><!--/.modal-dialog -->
</div><!--/.modal -->

<script>$(function() {
        $("a[id^='hakemlik-guncelle-']").click(
                function() {
                    $.get("hakemlik-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#hakemlik_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "hakemlik-guncelle-islem/" + $("input[name='hakemlikid']").val(),
                data: $("form#form_hakemlik_guncelle").serialize(),
                success: function(data)
                {
                    $("#hakemlik_guncelleme_formu").html(data);
                    $("#hakemlik_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#hakemlik_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='hakemlik-sil-']").click(
                function() {
                    $("p#modal_silinecek_hakemlik_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_hakemlik_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_hakemlik_id']").val());
            $.ajax({
                type: "POST",
                url: "hakemlik-sil-islem/" + $("input[name='silinecek_hakemlik_id']").val(),
                data: $("input[name='silinecek_hakemlik_id']").val(),
                success: function(data)
                {
                    $("#hakemlik_silme_formu").html(data);
                    $("#hakemlik_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#hakemlik_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "hakemlik-ekle-islem",
                data: $("form#form_hakemlik_ekle").serialize(),
                success: function(data)
                {
                    $("#hakemlik_ekleme_formu").html(data);
                    $("#hakemlik_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#hakemlik_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
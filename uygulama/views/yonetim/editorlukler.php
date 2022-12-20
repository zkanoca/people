


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-editorluk" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Editörlük</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Yayın Adı</th>

            <th>Editörlük Görevi</th>
            <th>Yayınevi</th>
            <th>DOI Numarası</th>
            <th>Yıl</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($editorlukler as $e): ?>

            <tr id="editorluk-<?php echo $e->editorlukid; ?>">
                <td><?php echo $e->yayin_adi; ?></td>

                <td><?php echo $e->editorluk_gorevi; ?></td>
                <td><?php echo $e->yayinevi; ?></td>
                <td><?php echo $e->doi; ?></td>
                <td><?php echo $e->yil; ?></td>
                <td class="text-center">
                    <a href="#" id="editorluk-guncelle-<?php echo $e->editorlukid; ?>" data-id="<?php echo $e->editorlukid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="editorluk-sil-<?php echo $e->editorlukid; ?>" data-id="<?php echo $e->editorlukid; ?>" data-baslik="<?php echo $e->yayin_adi; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="editorluk-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editörlük Güncelle</h4>
            </div>
            <div class="modal-body" id="editorluk_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="editorluk-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editörlük Sil</h4>
            </div>
            <div class="modal-body" id="editorluk_silme_formu">

                <h4>Gerçekten bu editörlük bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_editorluk_adi"></p>
                <input type="hidden" id="silinecek_editorluk_id" name="silinecek_editorluk_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="editorluk-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Editörlük Ekle</h4>
            </div>
            <div class="modal-body" id="editorluk_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('editorluk-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_editorluk_ekle'));
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
                    ?>
                    <?php echo form_input($yayin_adi); ?>

                    <label for="yayinevi">Yayınevi</label>
                    <?php
                    $yayinevi = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'yayinevi',
                        'name' => 'yayinevi',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($yayinevi); ?>


                    <label for="alan_bilgisi">Alan Bilgisi</label>
                    <?php
                    $alan_bilgisi = array(
                        'rows' => '3',
                        'class' => 'form-control',
                        'id' => 'alan_bilgisi',
                        'name' => 'alan_bilgisi'
                    );
                    ?>
                    <?php echo form_textarea($alan_bilgisi); ?>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="editorluk_turid">Editörlük Türü</label>
                        <?php
                        foreach ($editorluk_turleri as $et) {
                            $data_et[$et->editorluk_turid] = $et->editorluk_turu;
                        }
                        ?>
                        <?php echo form_dropdown('editorluk_turid', $data_et,
                                NULL, 'class="form-control"');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="editorluk_gorevid">Editörlük Görevi</label>
                        <?php
                        foreach ($editorluk_gorevleri as $eg) {
                            $data_eg[$eg->editorluk_gorevid] = $eg->editorluk_gorevi;
                        }
                        ?>
                        <?php echo form_dropdown('editorluk_gorevid', $data_eg,
                                NULL, 'class="form-control"');
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
                                $e->yayin_kapsamid,
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
                        ?>
<?php echo form_dropdown('basim_turid', $data_bt, NULL,
        'class="form-control"');
?>
                    </div>
                    <div class="col-md-4">
                        <label for="dilid">Dil</label>
                        <?php
                        foreach ($diller as $d) {
                            $data_d[$d->dilid] = $d->dil;
                        }
                        ?>
<?php echo form_dropdown('dilid', $data_d, NULL,
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
                        ?>
                        <?php echo form_dropdown('ulkeid',
                                $data_u, NULL, 'class="form-control"');
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
                        ?>
                        <?php echo form_input($sehir); ?>
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
                        ?>
                        <?php echo form_input($doi); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="yil">Yıl</label>
                        <?php
                        $yil = array(
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'yil',
                            'name' => 'yil',
                            'value' => ''
                        );
                        ?>
                <?php echo form_input($yil); ?>
                    </div>
                </div>
<?php
echo form_close();
/* * **************** */
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
        $("a[id^='editorluk-guncelle-']").click(
                function() {
                    $.get("editorluk-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#editorluk_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "editorluk-guncelle-islem/" + $("input[name='editorlukid']").val(),
                data: $("form#form_editorluk_guncelle").serialize(),
                success: function(data)
                {
                    $("#editorluk_guncelleme_formu").html(data);
                    $("#editorluk_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#editorluk_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='editorluk-sil-']").click(
                function() {
                    $("p#modal_silinecek_editorluk_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_editorluk_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_editorluk_id']").val());
            $.ajax({
                type: "POST",
                url: "editorluk-sil-islem/" + $("input[name='silinecek_editorluk_id']").val(),
                data: $("input[name='silinecek_editorluk_id']").val(),
                success: function(data)
                {
                    $("#editorluk_silme_formu").html(data);
                    $("#editorluk_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#editorluk_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "editorluk-ekle-islem",
                data: $("form#form_editorluk_ekle").serialize(),
                success: function(data)
                {
                    $("#editorluk_ekleme_formu").html(data);
                    $("#editorluk_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#editorluk_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
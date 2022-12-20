


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-odul" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Ödül</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Ödül</th>
            <th>Veren Taraf</th>
            <th>Tarih</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($oduller as $o): ?>

            <tr id="odul-<?php echo $o->odulid; ?>">
                <td><?php echo $o->odul; ?></td>
                <td><?php echo $o->veren; ?></td>
                <td><?php echo $o->tarih; ?></td>
                <td class="text-center">
                    <a href="#" id="odul-guncelle-<?php echo $o->odulid; ?>" data-id="<?php echo $o->odulid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="odul-sil-<?php echo $o->odulid; ?>" data-id="<?php echo $o->odulid; ?>" data-baslik="<?php echo $o->odul; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="odul-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ödül Güncelle</h4>
            </div>
            <div class="modal-body" id="odul_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="odul-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ödül Sil</h4>
            </div>
            <div class="modal-body" id="odul_silme_formu">

                <h4>Gerçekten bu ödül bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_odul_adi"></p>
                <input type="hidden" id="silinecek_odul_id" name="silinecek_odul_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="odul-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Ödül Ekle</h4>
            </div>
            <div class="modal-body" id="odul_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('odul-ekle-islem', array('class' => 'well well-lg', 'id' => 'form_odul_ekle'));
                ?>
                <div class="form-group row">
                    <label for="odul">Ödül</label>
                    <?php
                    $odul = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'odul',
                        'name' => 'odul',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($odul); ?>

                    <label for="veren">Veren</label>
                    <?php
                    $veren = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'veren',
                        'name' => 'veren',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($veren); ?>

                    <label for="aciklama">Açıklama</label>
                    <?php
                    $aciklama = array(
                        'class' => 'form-control',
                        'id' => 'aciklama',
                        'name' => 'aciklama',
                        'rows' => '3'
                    );
                    ?>
                    <?php echo form_textarea($aciklama); ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="odul_kurulus_turid">Ödül Veren Kurum/Kuruluş Türü</label>
                        <?php
                        foreach ($odul_kurulus_turleri as $okt) {
                            $data_okt[$okt->odul_kurulus_turid] = $okt->odul_kurulus_turu;
                        }
                        ?>
                        <?php echo form_dropdown('odul_kurulus_turid', $data_okt, NULL, array('class' => 'form-control')); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="tarih">Ödül Veriliş Tarihi</label>
                        <?php
                        $tarih = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'tarih',
                            'name' => 'tarih',
                            'value' => date('Y-m-d')
                        );
                        ?>
                        <?php echo form_input($tarih); ?>

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

<script>$(function () {
        $("a[id^='odul-guncelle-']").click(
                function () {
                    $.get("odul-guncelle/" + $(this).data("id"), function (form_data) {
                        $("div#odul_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "odul-guncelle-islem/" + $("input[name='odulid']").val(),
                data: $("form#form_odul_guncelle").serialize(),
                success: function (data)
                {
                    $("#odul_guncelleme_formu").html(data);
                    $("#odul_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#odul_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='odul-sil-']").click(
                function () {
                    $("p#modal_silinecek_odul_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_odul_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function () {
            console.log($("input[name='silinecek_odul_id']").val());
            $.ajax({
                type: "POST",
                url: "odul-sil-islem/" + $("input[name='silinecek_odul_id']").val(),
                data: $("input[name='silinecek_odul_id']").val(),
                success: function (data)
                {
                    $("#odul_silme_formu").html(data);
                    $("#odul_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#odul_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "odul-ekle-islem",
                data: $("form#form_odul_ekle").serialize(),
                success: function (data)
                {
                    $("#odul_ekleme_formu").html(data);
                    $("#odul_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#odul_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-tez" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Tez</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Başlık</th>
            <th>Yazar</th>
            <th>Tez Türü</th>
            <th>Yıl</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tezler as $t): ?>

            <tr id="tez-<?php echo $t->tezid; ?>">
                <td><?php echo $t->baslik; ?></td>
                <td><?php echo $t->yazar; ?></td>
                <td><?php echo $t->tez_turu; ?></td>
                <td><?php echo $t->yil; ?></td>
                <td class="text-center">
                    <a href="#" id="tez-guncelle-<?php echo $t->tezid; ?>" data-id="<?php echo $t->tezid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="tez-sil-<?php echo $t->tezid; ?>" data-id="<?php echo $t->tezid; ?>" data-baslik="<?php echo $t->baslik; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="tez-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ders Güncelle</h4>
            </div>
            <div class="modal-body" id="tez_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="tez-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tez Sil</h4>
            </div>
            <div class="modal-body" id="tez_silme_formu">

                <h4>Gerçekten bu tez bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_tez_adi"></p>
                <input type="hidden" id="silinecek_tez_id" name="silinecek_tez_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="tez-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Tez Ekle</h4>
            </div>
            <div class="modal-body" id="tez_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('tez-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_tez_ekle'));
                ?>

                <div class="form-group">
                    <label for="baslik">Tez Başlığı</label>
                    <?php
                    $baslik = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'baslik',
                        'name' => 'baslik',
                    );

                    echo form_input($baslik);
                    ?>
                    <label for="yazar">Yazar</label>
                    <?php
                    $yazar = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'yazar',
                        'name' => 'yazar',
                    );

                    echo form_input($yazar);
                    ?>

                    <label for="universite">Üniversite</label>
                    <?php
                    $universite = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'universite',
                        'name' => 'universite',
                    );

                    echo form_input($universite);
                    ?>

                    <label for="enstitu">Enstitü</label>
                    <?php
                    $enstitu = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'enstitu',
                        'name' => 'enstitu',
                    );

                    echo form_input($enstitu);
                    ?>

                    <label for="abd">Anabilim Dalı</label>
                    <?php
                    $abd = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'abd',
                        'name' => 'abd',
                    );

                    echo form_input($abd);
                    ?>
                    <label for="konu">Tez Konusu</label>
                    <?php
                    $konu = array(
                        'rows' => '2',
                        'class' => 'form-control',
                        'id' => 'konu',
                        'name' => 'konu',
                    );

                    echo form_textarea($konu);
                    ?>



                </div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="tez_turid">Tez Türü</label>
                        <?php
                        foreach ($tez_turleri as $tt) {
                            $data_tt[$tt->tez_turid] = $tt->tez_turu;
                        }

                        echo form_dropdown('tez_turid', $data_tt, NULL,
                                array('class' => 'form-control'));
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="tez_kurum_turid">Tez Kurum Türü</label>
                        <?php
                        foreach ($tez_kurum_turleri as $tkt) {
                            $data_tkt[$tkt->tez_kurum_turid] = $tkt->tez_kurum_turu;
                        }

                        echo form_dropdown('tez_kurum_turid', $data_tkt, NULL,
                                array('class' => 'form-control'));
                        ?>
                    </div>
                </div>
                <div class="form-group row">
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
                    <div class="col-md-6">
                        <label for="tez_danismanlik_turid">Danışmanlık Türü</label>
                        <?php
                        foreach ($tez_danismanlik_turleri as $tdt) {
                            $data_tdt[$tdt->tez_danismanlik_turid] = $tdt->tez_danismanlik_turu;
                        }

                        echo form_dropdown('tez_danismanlik_turid', $data_tdt,
                                NULL, array('class' => 'form-control'));
                        ?>
                    </div>
                </div>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">İptal</button>
                <button type = "button" class = "btn btn-success" id = "kaydetBtn">Kaydet</button>
            </div>
        </div><!--/.modal-content -->
    </div><!--/.modal-dialog -->
</div><!--/.modal -->

<script>$(function() {
        $("a[id^='tez-guncelle-']").click(
                function() {
                    $.get("tez-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#tez_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "tez-guncelle-islem/" + $("input[name='tezid']").val(),
                data: $("form#form_tez_guncelle").serialize(),
                success: function(data)
                {
                    $("#tez_guncelleme_formu").html(data);
                    $("#tez_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#tez_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='tez-sil-']").click(
                function() {
                    $("p#modal_silinecek_tez_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_tez_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_tez_id']").val());
            $.ajax({
                type: "POST",
                url: "tez-sil-islem/" + $("input[name='silinecek_tez_id']").val(),
                data: $("input[name='silinecek_tez_id']").val(),
                success: function(data)
                {
                    $("#tez_silme_formu").html(data);
                    $("#tez_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#tez_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "tez-ekle-islem",
                data: $("form#form_tez_ekle").serialize(),
                success: function(data)
                {
                    $("#tez_ekleme_formu").html(data);
                    $("#tez_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#tez_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>



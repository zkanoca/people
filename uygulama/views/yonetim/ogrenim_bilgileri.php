


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-ogrenim-bilgisi" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Öğrenim Bilgisi</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Derece</th>
            <th>Üniversite</th>
            <th>Enstitü/Fakülte/Yüksekokul</th>
            <th>Program</th>
            <th>Mezuniyet Tarihi</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ogrenim_bilgileri as $ob): ?>

            <tr id="ogrenim-bilgisi-<?php echo $ob->ogrenim_bilgiid; ?>">
                <td><?php echo $ob->derece; ?></td>
                <td><?php echo $ob->universite; ?></td>
                <td><?php echo $ob->okul; ?></td>
                <td><?php echo $ob->program; ?></td>
                <td><?php echo $ob->mezuniyet_tarihi; ?></td>
                <td class="text-center">
                    <a href="#" id="ogrenim-bilgisi-guncelle-<?php echo $ob->ogrenim_bilgiid; ?>" data-id="<?php echo $ob->ogrenim_bilgiid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="ogrenim-bilgisi-sil-<?php echo $ob->ogrenim_bilgiid; ?>" data-id="<?php echo $ob->ogrenim_bilgiid; ?>" data-baslik="<?php echo $ob->derece; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="ogrenim-bilgisi-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Öğrenim Bilgisi Güncelle</h4>
            </div>
            <div class="modal-body" id="ogrenim_bilgisi_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="ogrenim-bilgisi-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Öğrenim Bilgisi Sil</h4>
            </div>
            <div class="modal-body" id="ogrenim_bilgisi_silme_formu">

                <h4>Gerçekten bu öğrenim bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_derece"></p>
                <input type="hidden" id="silinecek_ogrenim_bilgisi_id" name="silinecek_ogrenim_bilgisi_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="ogrenim-bilgisi-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Öğrenim Bilgisi Ekle</h4>
            </div>
            <div class="modal-body" id="ogrenim_bilgisi_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('ogrenim-bilgisi-ekle-islem', array('class' => 'well well-lg', 'id' => 'form_ogrenim_bilgisi_ekle'));
                ?>
                <div class="form-group row">
                    <label for="universite">Üniversite</label>
                    <?php
                    $universite = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'universite',
                        'name' => 'universite',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($universite); ?>

                    <label for="okul">Enstitü/Fakülte/Yüksekokul</label>
                    <?php
                    $okul = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'okul',
                        'name' => 'okul',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($okul); ?>

                    <label for="program">Program</label>
                    <?php
                    $program = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'program',
                        'name' => 'program',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($program); ?>


                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ogrenim_dereceid">Öğrenim Derecesi</label>
                        <?php
                        foreach ($ogrenim_dereceleri as $od) {
                            $data_od[$od->ogrenim_dereceid] = $od->derece;
                        }
                        ?>
                        <?php echo form_dropdown('ogrenim_dereceid', $data_od, NULL, array('class' => 'form-control')); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="mezuniyet_tarihi">Mezuniyet Tarihi</label>
                        <?php
                        $mezuniyet_tarihi = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'mezuniyet_tarihi',
                            'name' => 'mezuniyet_tarihi',
                            'value' => date('Y-m-d')
                        );
                        ?>
                        <?php echo form_input($mezuniyet_tarihi); ?>

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
        $("a[id^='ogrenim-bilgisi-guncelle-']").click(
                function() {
                    $.get("ogrenim-bilgisi-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#ogrenim_bilgisi_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "ogrenim-bilgisi-guncelle-islem/" + $("input[name='ogrenim_bilgiid']").val(),
                data: $("form#form_ogrenim_bilgisi_guncelle").serialize(),
                success: function(data)
                {
                    $("#ogrenim_bilgisi_guncelleme_formu").html(data);
                    $("#ogrenim_bilgisi_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ogrenim_bilgisi_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='ogrenim-bilgisi-sil-']").click(
                function() {
                    $("p#modal_silinecek_derece_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_ogrenim_bilgisi_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_ogrenim_bilgisi_id']").val());
            $.ajax({
                type: "POST",
                url: "ogrenim-bilgisi-sil-islem/" + $("input[name='silinecek_ogrenim_bilgisi_id']").val(),
                data: $("input[name='silinecek_ogrenim_bilgisi_id']").val(),
                success: function(data)
                {
                    $("#ogrenim_bilgisi_silme_formu").html(data);
                    $("#ogrenim_bilgisi_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ogrenim_bilgisi_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "ogrenim-bilgisi-ekle-islem",
                data: $("form#form_ogrenim_bilgisi_ekle").serialize(),
                success: function(data)
                {
                    $("#ogrenim_bilgisi_ekleme_formu").html(data);
                    $("#ogrenim_bilgisi_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ogrenim_bilgisi_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>



<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-idari-gorev" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni İdari Görev</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Görev</th>
            <th>Birim</th>
            <th>Başlangıç</th>
            <th>Bitiş</th>

            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($idari_gorevler as $ig): ?>

            <tr id="idari-gorev-<?php echo $ig->idari_gorevid; ?>">
                <td><?php echo $ig->gorev; ?></td>
                <td><?php echo $ig->birim; ?></td>
                <td><?php echo $ig->baslangic; ?></td>
                <td><?php echo $ig->bitis; ?></td>

                <td class="text-center">
                    <a href="#" id="idari-gorev-guncelle-<?php echo $ig->idari_gorevid; ?>" data-id="<?php echo $ig->idari_gorevid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="idari-gorev-sil-<?php echo $ig->idari_gorevid; ?>" data-id="<?php echo $ig->idari_gorevid; ?>" data-baslik="<?php echo $ig->gorev; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="idari-gorev-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">İdari Görev Güncelle</h4>
            </div>
            <div class="modal-body" id="idari_gorev_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="idari-gorev-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">İdari Görev Sil</h4>
            </div>
            <div class="modal-body" id="idari_gorev_silme_formu">

                <h4>Gerçekten bu idari görev bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_idari_gorev_adi"></p>
                <input type="hidden" id="silinecek_idari_gorev_id" name="silinecek_idari_gorev_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="idari-gorev-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni İdari Görev Ekle</h4>
            </div>
            <div class="modal-body" id="idari_gorev_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('idari-gorev-ekle-islem', array('class' => 'well well-lg', 'id' => 'form_idari_gorev_ekle'));
                ?>
                <div class="form-group row">
                    <label for="gorev">Görev</label>
                    <?php
                    $gorev = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'gorev',
                        'name' => 'gorev',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($gorev); ?>

                    <label for="birim">Birim</label>
                    <?php
                    $birim = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'birim',
                        'name' => 'birim',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($birim); ?>




                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="baslangic">Başlangıç Tarihi</label>
                        <?php
                        $baslangic = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'baslangic',
                            'name' => 'baslangic',
                            'value' => ''
                        );
                        ?>
                        <?php echo form_input($baslangic); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="bitis">Bitiş Tarihi</label>
                        <?php
                        $bitis = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'bitis',
                            'name' => 'bitis',
                            'value' => ''
                        );
                        ?>
                        <?php echo form_input($bitis); ?>

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
        $("a[id^='idari-gorev-guncelle-']").click(
                function () {
                    $.get("idari-gorev-guncelle/" + $(this).data("id"), function (form_data) {
                        $("div#idari_gorev_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "idari-gorev-guncelle-islem/" + $("input[name='idari_gorevid']").val(),
                data: $("form#form_idari_gorev_guncelle").serialize(),
                success: function (data)
                {
                    $("#idari_gorev_guncelleme_formu").html(data);
                    $("#idari_gorev_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#idari_gorev_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='idari-gorev-sil-']").click(
                function () {
                    $("p#modal_silinecek_idari_gorev_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_idari_gorev_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function () {
            console.log($("input[name='silinecek_idari_gorev_id']").val());
            $.ajax({
                type: "POST",
                url: "idari-gorev-sil-islem/" + $("input[name='silinecek_idari_gorev_id']").val(),
                data: $("input[name='silinecek_idari_gorev_id']").val(),
                success: function (data)
                {
                    $("#idari_gorev_silme_formu").html(data);
                    $("#idari_gorev_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#idari_gorev_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "idari-gorev-ekle-islem",
                data: $("form#form_idari_gorev_ekle").serialize(),
                success: function (data)
                {
                    $("#idari_gorev_ekleme_formu").html(data);
                    $("#idari_gorev_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#idari_gorev_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
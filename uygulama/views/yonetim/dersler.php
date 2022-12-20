


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-ders" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Ders</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Ders</th>
            <th>Derece</th>
            <th>Başlangıç</th>
            <th>Bitiş</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dersler as $d): ?>

            <tr id="ders-<?php echo $d->dersid; ?>">
                <td><?php echo $d->ders; ?></td>
                <td><?php echo $d->ders_derecesi; ?></td>
                <td><?php echo $d->baslangic; ?></td>
                <td><?php echo $d->bitis; ?></td>
                <td class="text-center">
                    <a href="#" id="ders-guncelle-<?php echo $d->dersid; ?>" data-id="<?php echo $d->dersid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="ders-sil-<?php echo $d->dersid; ?>" data-id="<?php echo $d->dersid; ?>" data-baslik="<?php echo $d->ders; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="ders-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ders Güncelle</h4>
            </div>
            <div class="modal-body" id="ders_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="ders-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ders Sil</h4>
            </div>
            <div class="modal-body" id="ders_silme_formu">

                <h4>Gerçekten bu ders bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_ders_adi"></p>
                <input type="hidden" id="silinecek_ders_id" name="silinecek_ders_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="ders-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Ders Ekle</h4>
            </div>
            <div class="modal-body" id="ders_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('ders-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_ders_ekle'));
                ?>

                <div class="form-group">
                    <label for="ders">Ders</label>
                    <?php
                    $ders = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'ders',
                        'name' => 'ders',
                     );

                    echo form_input($ders);
                    ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="ders_kodu">Ders Kodu</label>
                        <?php
                        $ders_kodu = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'ders_kodu',
                            'name' => 'ders_kodu',
                         );

                        echo form_input($ders_kodu);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="ders_dereceid">Derece</label>
                        <?php
                        foreach ($ders_dereceleri as $dd) {
                            $data_dd[$dd->ders_dereceid] = $dd->ders_derecesi;
                        }

                        echo form_dropdown('ders_dereceid', $data_dd, NULL,
                                array('class' => 'form-control'));
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="dilid">Dersin Dili</label>
                        <?php
                        foreach ($diller as $di) {
                            $data_di[$di->dilid] = $di->dil;
                        }

                        echo form_dropdown('dilid', $data_di, NULL,
                                array('class' => 'form-control'));
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="haftalik_ders_saati">Haftalık Ders Saati</label>
                        <?php
                        $haftalik_ders_saati = array(
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'haftalik_ders_saati',
                            'name' => 'haftalik_ders_saati',
                            'value' => '1'
                        );
                        echo form_input($haftalik_ders_saati);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="baslangic">Başlangıç</label>
                        <?php
                        $baslangic = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'baslangic',
                            'name' => 'baslangic',
                            'value' => date('Y-m-d')
                        );
                        echo form_input($baslangic);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="bitis">Bitiş</label>
                        <?php
                        $bitis = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'bitis',
                            'name' => 'bitis',
                            'value' => date('Y-m-d')
                        );
                        echo form_input($bitis);
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
        $("a[id^='ders-guncelle-']").click(
                function() {
                    $.get("ders-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#ders_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "ders-guncelle-islem/" + $("input[name='dersid']").val(),
                data: $("form#form_ders_guncelle").serialize(),
                success: function(data)
                {
                    $("#ders_guncelleme_formu").html(data);
                    $("#ders_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ders_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='ders-sil-']").click(
                function() {
                    $("p#modal_silinecek_ders_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_ders_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_ders_id']").val());
            $.ajax({
                type: "POST",
                url: "ders-sil-islem/" + $("input[name='silinecek_ders_id']").val(),
                data: $("input[name='silinecek_ders_id']").val(),
                success: function(data)
                {
                    $("#ders_silme_formu").html(data);
                    $("#ders_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ders_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "ders-ekle-islem",
                data: $("form#form_ders_ekle").serialize(),
                success: function(data)
                {
                    $("#ders_ekleme_formu").html(data);
                    $("#ders_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#ders_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>



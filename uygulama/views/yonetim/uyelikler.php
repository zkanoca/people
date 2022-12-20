


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-uyelik" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Üyelik</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Topluluk</th>
            <th>Üyelik Türü</th>
            <th>Başlangıç</th>
            <th>Bitiş</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($uyelikler as $u): ?>

            <tr id="uyelik-<?php echo $u->uyelikid; ?>">
                <td><?php echo $u->topluluk; ?></td>
                <td><?php echo $u->uyelik_turu; ?></td>
                <td><?php echo $u->baslangic; ?></td>
                <td><?php echo $u->bitis; ?></td>
                <td class="text-center">
                    <a href="#" id="uyelik-guncelle-<?php echo $u->uyelikid; ?>" data-id="<?php echo $u->uyelikid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="uyelik-sil-<?php echo $u->uyelikid; ?>" data-id="<?php echo $u->uyelikid; ?>" data-baslik="<?php echo $u->topluluk; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="uyelik-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Üyelik Güncelle</h4>
            </div>
            <div class="modal-body" id="uyelik_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="uyelik-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Üyelik Sil</h4>
            </div>
            <div class="modal-body" id="uyelik_silme_formu">

                <h4>Gerçekten bu uyelik bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_uyelik_adi"></p>
                <input type="hidden" id="silinecek_uyelik_id" name="silinecek_uyelik_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="uyelik-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Üyelik Ekle</h4>
            </div>
            <div class="modal-body" id="uyelik_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('uyelik-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_uyelik_ekle'));
                ?>

                <div class="form-group">
                    <label for="topluluk">Topluluk</label>
                    <?php
                    $topluluk = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'topluluk',
                        'name' => 'topluluk',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($topluluk); ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="uyelik_turid">Üyelik Türü</label>
                        <?php
                        foreach ($uyelik_turleri as $ut) {
                            $data_ut[$ut->uyelik_turid] = $ut->uyelik_turu;
                        }

                        echo form_dropdown('uyelik_turid', $data_ut, NULL,
                                array('class' => 'form-control'));
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label for="uyelik_kurulus_turid">Topluluk Türü</label>
                        <?php
                        foreach ($uyelik_kurulus_turleri as $ukt) {
                            $data_ukt[$ukt->uyelik_kurulus_turid] = $ukt->uyelik_kurulus_turu;
                        }

                        echo form_dropdown('uyelik_kurulus_turid', $data_ukt,
                                NULL, array('class' => 'form-control'));
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
        $("a[id^='uyelik-guncelle-']").click(
                function() {
                    $.get("uyelik-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#uyelik_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "uyelik-guncelle-islem/" + $("input[name='uyelikid']").val(),
                data: $("form#form_uyelik_guncelle").serialize(),
                success: function(data)
                {
                    $("#uyelik_guncelleme_formu").html(data);
                    $("#uyelik_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#uyelik_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='uyelik-sil-']").click(
                function() {
                    $("p#modal_silinecek_uyelik_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_uyelik_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_uyelik_id']").val());
            $.ajax({
                type: "POST",
                url: "uyelik-sil-islem/" + $("input[name='silinecek_uyelik_id']").val(),
                data: $("input[name='silinecek_uyelik_id']").val(),
                success: function(data)
                {
                    $("#uyelik_silme_formu").html(data);
                    $("#uyelik_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#uyelik_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "uyelik-ekle-islem",
                data: $("form#form_uyelik_ekle").serialize(),
                success: function(data)
                {
                    $("#uyelik_ekleme_formu").html(data);
                    $("#uyelik_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#uyelik_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>






<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-bilimsel-etkinlik" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Bilimsel Etkinlik</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Etkinlik</th>
            <th>Tarih</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bilimsel_etkinlikler as $be): ?>

            <tr id="bilimsel-etkinlik-<?php echo $be->bilimsel_etkinlikid; ?>">
                <td><?php echo $be->bilimsel_etkinlik; ?></td>
                <td><?php echo date('d.m.Y', strtotime($be->tarih)); ?></td>
                <td class="text-center">
                    <a href="#" id="bilimsel-etkinlik-guncelle-<?php echo $be->bilimsel_etkinlikid; ?>" data-id="<?php echo $be->bilimsel_etkinlikid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="bilimsel-etkinlik-sil-<?php echo $be->bilimsel_etkinlikid; ?>" data-id="<?php echo $be->bilimsel_etkinlikid; ?>" data-baslik="<?php echo $be->bilimsel_etkinlik; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="bilimsel-etkinlik-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bilimsel Etkinlik Güncelle</h4>
            </div>
            <div class="modal-body" id="bilimsel_etkinlik_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="bilimsel-etkinlik-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bilimsel Etkinlik Sil</h4>
            </div>
            <div class="modal-body" id="bilimsel_etkinlik_silme_formu">

                <h4>Gerçekten bu etkinliği silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_etkinlik_adi"></p>
                <input type="hidden" id="silinecek_etkinlik_id" name="silinecek_etkinlik_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="bilimsel-etkinlik-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Bilimsel Etkinlik Ekle</h4>
            </div>
            <div class="modal-body" id="bilimsel_etkinlik_ekleme_formu">
                <?php
                $bilimsel_etkinlik = array(
                    'type' => 'text',
                    'name' => 'bilimsel_etkinlik',
                    'id' => 'bilimsel_etkinlik',
                    'value' => '',
                    'class' => 'form-control'
                );
                $tarih = array(
                    'type' => 'text',
                    'name' => 'tarih',
                    'id' => 'tarih',
                    'value' => '',
                    'class' => 'form-control'
                );

                $form_url = $user . '/yonetim/bilimsel-etkinlik-ekle-islem';
                echo form_open($form_url, array('class' => 'form-signin well well-lg', 'id' => 'form_bilimsel_etkinlik_ekle'));
                ?>
                <div class="form-group">
                    <label for="bilimsel_etkinlik">Bilimsel Etkinlik</label>
                    <?php echo form_input($bilimsel_etkinlik); ?>
                </div>
                <div class="form-group">
                    <label for="tarih">Tarih</label>
                    <?php echo form_input($tarih); ?>
                </div>
                <?php // echo form_input($guncelleBtn);  ?>
                <?php echo form_hidden('eposta', $this->session->userdata('eposta')); ?>
                <?php echo form_close(); ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-success" id="kaydetBtn">Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>$(function () {
        $("a[id^='bilimsel-etkinlik-guncelle-']").click(
                function () {
                    $.get("bilimsel-etkinlik-guncelle/" + $(this).data("id"), function (form_data) {
                        $("div#bilimsel_etkinlik_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "bilimsel-etkinlik-guncelle-islem/" + $("input[name='bilimsel_etkinlikid']").val(),
                data: $("form#form_bilimsel_etkinlik_guncelle").serialize(),
                success: function (data)
                {
                    $("#bilimsel_etkinlik_guncelleme_formu").html(data);
                    $("#bilimsel_etkinlik_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#bilimsel_etkinlik_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='bilimsel-etkinlik-sil-']").click(
                function () {
                    $("p#modal_silinecek_etkinlik_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_etkinlik_id']").val($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "bilimsel-etkinlik-sil-islem/" + $("input[name='silinecek_etkinlik_id']").val(),
                data: $("input[name='silinecek_etkinlik_id']").val(),
                success: function (data)
                {
                    $("#bilimsel_etkinlik_silme_formu").html(data);
                    $("#bilimsel_etkinlik_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#bilimsel_etkinlik_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function () {

            $.ajax({
                type: "POST",
                url: "bilimsel-etkinlik-ekle-islem",
                data: $("form#form_bilimsel_etkinlik_ekle").serialize(),
                success: function (data)
                {
                    $("#bilimsel_etkinlik_ekleme_formu").html(data);
                    $("#bilimsel_etkinlik_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function ()
                {
                    $("#bilimsel_etkinlik_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
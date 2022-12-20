


<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');
?>
<p><a href="#yeni-proje" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ekle_modal"><i class="fa fa-plus"></i> Yeni Proje</a></p>
<table class="table table-bordered table-hover" style="background-color: #ffffff;">
    <thead>
        <tr>
            <th>Başlık</th>
            <th>Kategori</th>
            <th>Başlangıç</th>
            <th>Bitiş</th>
            <th>Sahip</th>
            <th>Rol</th>
            <th>Durum</th>
            <th colspan="2">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projeler as $p): ?>

            <tr id="proje-<?php echo $p->projeid; ?>">
                <td><?php echo $p->baslik; ?></td>
                <td><?php echo $p->proje_kategori; ?></td>
                <td><?php echo $p->baslangic; ?></td>
                <td><?php echo $p->bitis; ?></td>
                <td><?php echo $p->sahip; ?></td>
                <td><?php echo $p->proje_rolu; ?></td>
                <td><?php echo $p->proje_durumu; ?></td>
                <td class="text-center">
                    <a href="#" id="proje-guncelle-<?php echo $p->projeid; ?>" data-id="<?php echo $p->projeid; ?>" class="btn btn-xs btn-info btn-block" title="Düzenle" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#guncelle_modal"><i class="fa fa-pencil"></i></a>
                </td>
                <td class="text-center">
                    <a href="#" id="proje-sil-<?php echo $p->projeid; ?>" data-id="<?php echo $p->projeid; ?>" data-baslik="<?php echo $p->baslik; ?>" class="btn btn-xs btn-danger btn-block" title="Sil" data-toggle="tooltip" data-placement="bottom" data-toggle="modal" data-target="#sil_modal"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<div class="modal fade" id="guncelle_modal" tabindex="-1" role="dialog" aria-labelledby="proje-guncelle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Proje Güncelle</h4>
            </div>
            <div class="modal-body" id="proje_guncelleme_formu">
                <?php //BURAYA DİNAMİK BİLGİ GELECEK   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="guncelleBtn">Güncelle</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="sil_modal" tabindex="-1" role="dialog" aria-labelledby="proje-sil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Proje Sil</h4>
            </div>
            <div class="modal-body" id="proje_silme_formu">

                <h4>Gerçekten bu proje bilgisini silmeyi istiyor musunuz?</h4>
                <p id="modal_silinecek_proje_adi"></p>
                <input type="hidden" id="silinecek_proje_id" name="silinecek_proje_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" id="silBtn">Sil</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="ekle_modal" tabindex="-1" role="dialog" aria-labelledby="proje-ekle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Yeni Proje Ekle</h4>
            </div>
            <div class="modal-body" id="proje_ekleme_formu">

                <?php
                /*                 * **************** */

                echo form_open('proje-ekle-islem',
                        array('class' => 'well well-lg', 'id' => 'form_proje_ekle'));
                ?>
                <div class="form-group row">
                    <label for="baslik">Proje Adı</label>
                    <?php
                    $baslik = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'baslik',
                        'name' => 'baslik',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($baslik); ?>

                    <label for="baslik">Proje Sahibi</label>
                    <?php
                    $sahip = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'sahip',
                        'name' => 'sahip',
                        'value' => ''
                    );
                    ?>
                    <?php echo form_input($sahip); ?>

                    <label for="proje_konusu">Proje Konusu</label>
                    <?php
                    $proje_konusu = array(
                        'class' => 'form-control',
                        'id' => 'proje_konusu',
                        'name' => 'proje_konusu',
                        'rows' => '1'
                    );
                    ?>
                    <?php echo form_textarea($proje_konusu); ?>

                    <label for="katkida_bulunanlar">Katkıda Bulunanlar<br><i class="text-info">Lütfen kişileri yazarken noktalı virgül (;) ile ayırınız.</i></label>
                    <?php
                    $katkida_bulunanlar = array(
                        'class' => 'form-control',
                        'id' => 'katkida_bulunanlar',
                        'name' => 'katkida_bulunanlar',
                        'rows' => '1'
                    );
                    ?>
                    <?php echo form_textarea($katkida_bulunanlar); ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="proje_kategoriid">Proje Kategorisi</label>
                        <?php
                        foreach ($proje_kategorileri as $pk) {
                            $data_pk[$pk->proje_kategoriid] = $pk->proje_kategori;
                        }

                        echo form_dropdown('proje_kategoriid', $data_pk, NULL,
                                array('class' => 'form-control input-sm'));
                        ?>
                    </div>

                    <div class="col-md-4">
                        <label for="proje_durumid">Proje Durumu</label>
                        <?php
                        foreach ($proje_durumlari as $pd) {
                            $data_pd[$pd->proje_durumid] = $pd->proje_durumu;
                        }

                        echo form_dropdown('proje_durumid', $data_pd, NULL,
                                array('class' => 'form-control input-sm'));
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="proje_rolid">Projedeki Rolünüz</label>
                        <?php
                        foreach ($proje_rolleri as $pr) {
                            $data_pr[$pr->proje_rolid] = $pr->proje_rolu;
                        }

                        echo form_dropdown('proje_rolid', $data_pr, NULL,
                                array('class' => 'form-control input-sm'));
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="baslangic">Başlangıç</label>
                        <?php
                        $baslangic = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'baslangic',
                            'name' => 'baslangic',
                            'value' => date('Y-m-d')
                        );
                        ?>
                        <?php echo form_input($baslangic); ?>
                    </div>
                    <div class="col-md-3">
                        <label for="bitis">Bitiş</label>
                        <?php
                        $bitis = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'bitis',
                            'name' => 'bitis',
                            'value' => date('Y-m-d')
                        );
                        ?>
                        <?php echo form_input($bitis); ?>
                    </div>
                    <div class="col-md-3">
                        <label for="sure">Süre (ay)</label>
                        <?php
                        $sure = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'sure',
                            'name' => 'sure',
                            'value' => ''
                        );
                        ?>
                        <?php echo form_input($sure); ?>
                    </div>
                    <div class="col-md-3">
                        <label for="ek_sure">Ek Süre</label>
                        <?php
                        $ek_sure = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'ek_sure',
                            'name' => 'ek_sure',
                            'value' => '0'
                        );
                        ?>
                        <?php echo form_input($ek_sure); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="kod">Proje Kodu</label>
                        <?php
                        $kod = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'kod',
                            'name' => 'kod',
                            'value' => ''
                        );
                        ?>
                        <?php echo form_input($kod); ?>
                    </div>
                    <div class="col-md-5">
                        <label for="butce">Bütçe</label>
                        <?php
                        $butce = array(
                            'type' => 'text',
                            'class' => 'form-control input-sm',
                            'id' => 'butce',
                            'name' => 'butce',
                            'value' => '0'
                        );
                        ?>
                        <?php echo form_input($butce); ?>
                    </div>

                    <div class="col-md-2">
                        <label for="para_birimi">P. Birimi</label>
                        <?php
                        $data_pb = array('TL' => 'TL', '$' => '$', '€' => '€');
                        echo form_dropdown('para_birimi', $data_pb, 'TL',
                                array('class' => 'form-control input-sm'));
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
        $("a[id^='proje-guncelle-']").click(
                function() {
                    $.get("proje-guncelle/" + $(this).data("id"), function(form_data) {
                        $("div#proje_guncelleme_formu").html(form_data);
                    });
                    $("#guncelle_modal").modal();
                });
        $("button#guncelleBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "proje-guncelle-islem/" + $("input[name='projeid']").val(),
                data: $("form#form_proje_guncelle").serialize(),
                success: function(data)
                {
                    $("#proje_guncelleme_formu").html(data);
                    $("#proje_guncelleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#proje_guncelleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("a[id^='proje-sil-']").click(
                function() {
                    $("p#modal_silinecek_proje_adi").text($(this).data("baslik"));
                    $("input[name='silinecek_proje_id']").val($(this).data("id"));
                    console.log($(this).data("id"));

                    $("#sil_modal").modal();
                });

        $("button#silBtn").click(function() {
            console.log($("input[name='silinecek_proje_id']").val());
            $.ajax({
                type: "POST",
                url: "proje-sil-islem/" + $("input[name='silinecek_proje_id']").val(),
                data: $("input[name='silinecek_proje_id']").val(),
                success: function(data)
                {
                    $("#proje_silme_formu").html(data);
                    $("#proje_silme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#proje_silme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });

        });


        $("button#kaydetBtn").click(function() {

            $.ajax({
                type: "POST",
                url: "proje-ekle-islem",
                data: $("form#form_proje_ekle").serialize(),
                success: function(data)
                {
                    $("#proje_ekleme_formu").html(data);
                    $("#proje_ekleme_formu").append("<h4>Lütfen bekleyiniz...</h4>");
                    window.setTimeout('location.reload()', 2000);
                },
                error: function()
                {
                    $("#proje_ekleme_formu").html('<h3 class="text-danger">Bir sorun var... Özür dileriz.</h3>');
                }
            });
        });
    });
</script>
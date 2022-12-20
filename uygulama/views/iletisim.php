<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php

function geriBesleme($durum) {

    $geriBesleme = array('div' => '',
        'span' => '');
    if (validation_errors()) {
        if ($durum) {

            $geriBesleme['div'] = ' has-warning';
            $geriBesleme['span'] = '<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>';
        } else {
            $geriBesleme['div'] = ' has-success';
            $geriBesleme['span'] = '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
        }
    }

    return $geriBesleme;
}
?>





<div class="col-md-9" id="icerik">
    <h3 class="page-header">İletişim</h3>

    <?php
    if (validation_errors()) {
        echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p><strong>Lütfen aşağıdaki uyarılara göre formu gözden geçiriniz.</strong></p><ul>';
    }
    ?>

    <?php echo validation_errors('<li>', '</li>'); ?>

    <?php
    if (validation_errors()) {
        echo '</ul></div>';
    }
    ?>

    <?php echo form_open("$user/iletisim"); ?>

    <div class="form-group has-feedback <?php echo geriBesleme(form_error("adisoyadi"))['div']; ?>">
        <label class="control-label" for="adisoyadi">Adınız Soyadınız:</label>
        <input type="text" name="adisoyadi" value="<?php echo set_value('adisoyadi'); ?>" size="50" class="form-control" placeholder="Lütfen adınızı ve soyadınızı yazınız" />
        <?php echo geriBesleme(form_error("adisoyadi"))['span']; ?>
    </div>

    <div class="form-group has-feedback <?php echo geriBesleme(form_error("eposta"))['div']; ?>">
        <label class="control-label" for="eposta">E-posta Adresiniz:</label>
        <input type="email" name="eposta" value="<?php echo set_value('eposta'); ?>" size="50" class="form-control" placeholder="Lütfen geçerli bir e-posta adresi yazınız"    />
        <?php echo geriBesleme(form_error("eposta"))['span']; ?>
    </div>

    <div class="form-group has-feedback <?php echo geriBesleme(form_error("konu"))['div']; ?>">
        <label class="control-label" for="konu">Mesajın Konusu:</label>
        <input type="text" name="konu" value="<?php echo set_value('konu'); ?>" size="250" class="form-control" placeholder="Lütfen mesaj konusunu yazınız"  />
        <?php echo geriBesleme(form_error("konu"))['span']; ?>
    </div>

    <div class="form-group has-feedback <?php echo geriBesleme(form_error("mesaj"))['div']; ?>">
        <label class="control-label" for="mesaj">Mesajınız:</label>
        <textarea name="mesaj"  placeholder="Lütfen mesajınızı buraya yazınız" class="form-control"  ><?php echo set_value('mesaj'); ?></textarea>
        <?php echo geriBesleme(form_error("mesaj"))['span']; ?>
    </div>

    <?php /* div class="form-group">
      <label for="captcha" class="control-label">Robot Kontrolü</label>
      <div class="g-recaptcha" data-sitekey="6LcWgPkSAAAAAP2EQHUwjZQ0lcmiFWypthpSuTRp"></div>
      </div */ ?>


    <p><span class="captcha"><?php echo $captcha['image']; ?></span> <a href="#" class ="btn btn-lg btn-default refresh"><i class="fa fa-2x fa-refresh" id="ref_symbol" data-toggle="tooltip" data-placement="top" title="Yeni kod için tıklayın" ></i></a></p>


    <div class="form-group has-feedback <?php echo geriBesleme(form_error("guvenlikResmi"))['div']; ?> clearfix">
        <p><input type="text" id="guvenlikResmi" name="guvenlikResmi" value="<?php echo set_value('guvenlikResmi'); ?>" size="6" class="form-control" placeholder="Resimdeki kodu buraya yazınız"  /></p>
        <?php echo geriBesleme(form_error("guvenlikResmi"))['span']; ?>
    </div>

    <div class="form-group"><button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Gönder</button></div>


</div>

<script type="text/javascript" lang="javascript">

// Ajax post for refresh captcha image.
    $(document).ready(function () {
        $("a.refresh").click(function () {
            //jQuery("p.captcha").html('');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>login/captcha_refresh",
                success: function (res) {
                    if (res)
                    {
                        jQuery("span.captcha").html(res);
                    }
                }
            });
        });
    });
</script>
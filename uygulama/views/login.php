<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$this->load->helper('url');

if (!function_exists('geriBesleme')) {

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

}
?>

<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
    }


</style>

<?php
if (validation_errors()) {
    echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p><strong>Lütfen aşağıdaki uyarılara göre formu gözden geçiriniz.</strong></p><ul>';
}
echo validation_errors('<li>', '</li>');
if (validation_errors()) {
    echo '</ul></div>';
}
?>

<div class="container">

    <?php
    //var_dump($_SESSION);
    ?>

    <h2 class="form-signin-heading text-center"><img src="<?php echo base_url(); ?>assets/resimler/logo2.png" /><br>Abant İzzet Baysal Üniversitesi</h2>
    <h3 class="form-signin-heading text-center">Akademik Personel Profil Sayfası</h3>
    <h4 class="form-signin-heading text-center">Giriş Formu</h4>



    <?php echo form_open('login/checkLogin', array('class' => 'form-signin well well-lg', 'id' => 'aibu_apps_giris_formu')); ?>

    <div class="form-group has-feedback <?php echo geriBesleme(form_error('eposta'))['div']; ?>">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope-o fa-fw"></i>
            </div>
            <input id="eposta" name="eposta" class="form-control" placeholder="<?php echo onemliKisiler(); ?>"  autofocus="" type="text" value="<?php echo set_value('eposta'); ?>">
            <div class="input-group-addon">@ibu.edu.tr</div>
        </div>
        <?php echo geriBesleme(form_error('eposta'))['span']; ?>
    </div>


    <div class="form-group has-feedback <?php echo geriBesleme(form_error('parola'))['div']; ?>">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-key fa-fw"></i>
            </div>
            <input id="parola" name="parola" class="form-control" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"  type="password" value="" />

        </div> 
        <?php echo geriBesleme(form_error('parola'))['span']; ?>
    </div>

    <div class="form-group">
        <label for="guvenlikResmi">Robot Kontrolü</label>
        <div class="">
            <div class="col-md-10" id="captcha_container">

                <?php echo $captcha['image']; ?>

            </div>
            <div class="col-md-2">
                <p>
                    <a href="#" class ="btn btn-sm btn-default refresh"><i class="fa fa-refresh" id="ref_symbol" data-toggle="tooltip" data-placement="top" title="Yeni resim yüklemek için tıklayın" ></i></a>
                </p>

            </div>
        </div>
        <?php
        echo form_input(array('name' => 'guvenlikResmi', 'class' => 'form-control input-sm', 'placeholder' => 'Resimdeki kodu buraya yazınız', 'id' => 'guvenlikResmi'));
        ?>
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit">Oturum Aç</button>
    </div> 

</div>

<p class="text-center copyright">Abant İzzet Baysal Üniversitesi &copy; <?php echo date('Y') ?> - Destek: <a href="http://people.ibu.edu.tr/ozkanozlu" target="_blank">Uzman Özkan ÖZLÜ</a></p>


<script type="text/javascript" lang="javascript">

// Ajax post for refresh captcha image.
    $(document).ready(function () {
        $("a.refresh").click(function () {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>login/captcha_refresh",
                success: function (res) {
                    if (res)
                    {
                        $("div#captcha_container").html(res);
                    }
                }
            });
        });
    });
</script>
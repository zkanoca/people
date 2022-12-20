<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
//var_dump($badge);
?>

<script defer src="<?php echo base_url('assets/js/kunyeuzat.js'); ?>"></script>

<div class="col-md-3 jumbotron" id="kunye-container">
    <div class="kunye">
        <div class="container">
            <div class="col-md-12 col-xs-12 col-sm-6">
                <div class="fotograf-cercevesi">
                    <img class="center-block img-rounded badge-fotograf" src="<?php echo $badge[0]->fotograf; ?>" alt="" />
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-6">
                <h4 class="text-center"><?php echo $badge[0]->unvan; ?> <?php echo ($badge[0]->doktora == "1") ? "Dr. " : " "; ?> <strong><?php echo $badge[0]->adi; ?> <?php echo $badge[0]->soyadi; ?></strong></h4>
                <h5 class="text-center"><?php echo $badge[0]->birim; ?> </h5>
                <hr>
                <h6 class="text-center"><i class="fa fa-envelope"></i> <?php echo $badge[0]->eposta; ?>@ibu.edu.tr</h6>
                <h6 class="text-center"><i class="fa fa-phone"></i> <?php echo $badge[0]->telefon; ?> <br>(Dahili: <?php echo $badge[0]->dahili; ?>)</h6>
                <h6 class="text-center"><i class="fa fa-fax"></i> <?php echo $badge[0]->faks; ?></h6>
                <h6 class="text-center"><i class="fa fa-mobile"></i> <?php echo $badge[0]->gsm; ?></h6>
                
            </div>  


        </div>
    </div>
</div>
 
<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

//var_dump($patentler);
$i = 1;
$pbt = '';
$pk = '';
$sections = array('A' => 'primary', 'B' => 'info', 'C' => 'success', 'D' => 'warning', 'E' => 'danger', 'F' => 'default', 'G' => 'primary', 'H' => 'info');
?>
<div id="patentler">
    <?php foreach ($patentler as $p): ?>
        <?php if ($pbt !== $p->patent_basvuru_turu): ?>
            <h4 class="text-success"><?php echo $p->patent_basvuru_turu; ?></h4>
            <?php 
            $pbt = $p->patent_basvuru_turu; 
            $i = 1;
            ?>
        <?php endif; ?>
            <div id="patent-<?php echo $p->patentid ?>" class="clearfix">
            <div class="col-md-8">
                <p> <span class="label label-default"><?php echo $i++ ?></span>
                    
                    <?php echo patentSahipleri($p->basvuru_sahipleri) ?>, "<?php echo $p->patent ?>", Patent <em><?php echo $p->numara ?></em>,  <?php echo date('Y', strtotime($p->yil)) ?>    
                       

                  
                </p>
            </div>
            <div class="col-md-4">
                <span class="label label-<?php echo $sections[$p->patent_section] ?>"><?php echo $p->patent_section ?> - <?php echo $p->patent_kategori ?></span>
                <span class="label label-default"><?php echo $p->patent_dosya_turu ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ibu_ajanda_duyurular
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>

<?php
if (!empty($feed) && is_string($feed)) {
    echo $feed;
} else {
    $lang = JFactory::getLanguage();
    $myrtl = $params->get('rssrtl');
    $direction = " ";

    if ($lang->isRTL() && $myrtl == 0) {
        $direction = " redirect-rtl";
    }

// Feed description
    elseif ($lang->isRTL() && $myrtl == 1) {
        $direction = " redirect-ltr";
    } elseif ($lang->isRTL() && $myrtl == 2) {
        $direction = " redirect-rtl";
    } elseif ($myrtl == 0) {
        $direction = " redirect-ltr";
    } elseif ($myrtl == 1) {
        $direction = " redirect-ltr";
    } elseif ($myrtl == 2) {
        $direction = " redirect-rtl";
    }

    if ($feed != false) {
// Image handling
        $iUrl = isset($feed->image) ? $feed->image : null;
        $iTitle = isset($feed->imagetitle) ? $feed->imagetitle : null;

        $active = 'active';



//        if (isEmpty($iUrl))
        ?>
        <div id="ibuAjandaDuyurular" class="media <?php echo $moduleclass_sfx; ?> ">



            <?php if (!empty($feed)) {
                ?>
                <div id="modIbuAjandaCarousel2" class="carousel slide">

                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < $params->get('rssitems', 5); $i++) :
                            if (!$feed->offsetExists($i)) {
                                break;
                            }
                            ?>
                            <li data-target="#modIbuAjandaCarousel2" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                            <?php $active = ''; ?>
                        <?php endfor;
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $active = 'active';

                        for ($i = 0; $i < $params->get('rssitems', 5); $i++) :
                            if (!$feed->offsetExists($i)) {
                                break;
                            }

                            $uri = (!empty($feed[$i]->uri) || !is_null($feed[$i]->uri)) ? $feed[$i]->uri : $feed[$i]->guid;
                            $uri = substr($uri, 0, 4) != 'http' ? $params->get('rsslink') : $uri;
                            ?>
                            <div id="haberOgeleri-<?php echo $i ?>" class="item <?php echo $active; ?>"  data-src="<?php echo $feed[$i]->resim; ?>" data-alt="<?php echo $feed[$i]->title; ?>">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h2><a href="<?php echo $uri; ?>" target="_blank"><?php echo $feed[$i]->title; ?></a></h2>
                                    </div>
                                </div>
                            </div>
                            <?php $active = ''; ?>
                        <?php endfor; ?>

                    </div>
                    <a class="left carousel-control" href="#modIbuAjandaCarousel2" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#modIbuAjandaCarousel2" data-slide="next">&rsaquo;</a>
                <?php } ?>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php
$document = JFactory::getDocument();
$document->addScriptDeclaration('!function($){$(function(){$("#modIbuAjandaCarousel2").carousel();});}(window.jQuery);/*ozkanozlu*/');

//function is_url_exist($url) {
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_NOBODY, true);
//    curl_exec($ch);
//    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//
//    if ($code == 200) {
//        $status = true;
//    } else {
//        $status = false;
//    }
//    curl_close($ch);
//    return $status;
//}
?>
<script>
    jQuery(function () {
        jQuery("div[id^='haberOgeleri-']").each(function () {

            var r = jQuery(this).attr("data-src");
            var r620 = r.replace(".jpg", "-620x350.jpg");
            var r527 = r.replace(".jpg", "-527x350.jpg");
            var alternatif = jQuery(this).attr("data-alt");

            console.log("Orijinal: " + jQuery.r);

            if (resimVarmi(r620))
            {
                r = r620;
            }
            else if (resimVarmi(r527))
            {
                r = r527;
            }

            jQuery(this).prepend("<img src='" + r + "' alt='" + alternatif + "' />");
            jQuery(this).removeAttr("data-alt");
            jQuery(this).removeAttr("data-src");
        });
    });


    function resimVarmi(url) {
        var img = new Image();
        img.src = url;
        if (img.height !== 0) {
            return false;
        } else {
            return true;
        }
    }





</script>
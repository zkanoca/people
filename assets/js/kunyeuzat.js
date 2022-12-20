/* 
 * Özkan ÖZLÜ
 * İçerik sayfalarında künyenin boyunu yanındaki içeriğe göre uzatan betik
 * 16.03.2015
 */

$(function () {
    ayarla();
    $("#icerik").resize(function () {
        ayarla();
    });

    $('#icerik').bind('DOMNodeInserted DOMNodeRemoved', function () {
        ayarla();
    });
    $("ul[id^='tab_']").children("*").click(function () {
        ayarla();
    });
});

$(window).resize(function () {
    ayarla();
});



function ayarla()
{
    var icerikW = $("div#icerik").width();
    var icerikH = $("div#icerik").height();

    if (icerikW > 750)
    {
        if (icerikH >= 500)
        {
            $("div#kunye-container").css('height', (icerikH) + 'px');
        }
        else if (icerikH < 500)
        {
            $("div#icerik").css('min-height', '600px');
        }

        $("div#kunye-container").css('height', (icerikH) + 'px');
    }
    else if ($(window).width() < 750)
    {
        $("div#kunye-container").css('height', 'auto');
        $("div#icerik").css('height', 'auto');
    }
}
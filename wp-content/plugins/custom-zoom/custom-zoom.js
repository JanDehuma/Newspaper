jQuery(document).ready(function($) {
    // Configura la lupa
    $("body").mouseenter(function() {
        $(".custom-zoom-loupe").show();
    }).mousemove(function(e) {
        var posX = e.pageX;
        var posY = e.pageY;
        var loupeX = posX - 50; // la mitad del ancho de la lupa
        var loupeY = posY - 50; // la mitad del alto de la lupa

        $(".custom-zoom-loupe").css({left: loupeX, top: loupeY});
    }).mouseleave(function() {
        $(".custom-zoom-loupe").hide();
    });
});

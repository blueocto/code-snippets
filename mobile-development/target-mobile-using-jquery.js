// Example code

function hideSlider() {
    // 618px for portrait and landscape on iPhone
    if($(window).width() < 618) {
        //Homepage : Swap the large slider for the mobile one, and vica versa, when screen size changes
        $('#slider').hide();
        $('body').css({'overflow-x': 'hidden'});
        //Services : Swap the large links at the bottom, for smaller ones at the top
        $('.what_we_do').hide();
        //Our Work : Swap the large slider for the mobile one, and vica versa, when screen size changes
        $('#gallery').hide();
        //Homepage
        $('#mobile-slider').show();
        //Services
        $('.what_we_do_mobile').show();
        //Our Work
        $('#mobile-gallery').show();
        
    } else {
        //Homepage
        $('#slider').show();
        //Services
        $('.what_we_do').show();
        //Our Work
        $('#gallery').show();
        //Homepage
        $('#mobile-slider').hide();
        //Services
        $('.what_we_do_mobile').hide();
        //Our Work
        $('#mobile-gallery').hide();
    }
}

hideSlider();


// Swap images out

//swap racecar image based on browser size
function swapImage() {
    if($(window).width() < 650) {
        $("#racecar").attr("src","img/racecar_small.jpg");
    } else {
        $("#racecar").attr("src","img/racecar_big.jpg");
    }
}
swapImage();

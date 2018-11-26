$(function () {
    inView('.galery_container').once('enter', function () {
        $('.lazy').lazy({
            placeholder: "data:img/load.gif;",
            threshold: 0,
            visibleOnly: true
        });
    });
    $('a.gallery').featherlightGallery({
        previousIcon: '«',
        nextIcon: '»',
        galleryFadeIn: 300,

        openSpeed: 300
    });

});


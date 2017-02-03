$.material.init();
$('body').materialScrollTop();
$('.grid').masonry({
    itemSelector: '.col-sm-6',
    columnWidth: '.grid-sizer',
    percentPosition: true
});

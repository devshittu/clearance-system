/*
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}*/

$('.next').click(function () {
    var nextId = $(this).parents('.tab-pane').next().attr("id");
    console.log('nextId:// ', nextId)
    $('a[href=\\#' + nextId + ']').tab('show');
    return false;
})

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //update progress
    var step = $(e.target).data('step');
    var percent = (parseInt(step) / 5) * 100;

    $('.progress-bar').css({width: percent + '%'});
    $('.progress-bar').text("Step " + step + " of 5");
    //e.relatedTarget // previous tab
})

$('.first').click(function () {
    $('#myWizard a:first').tab('show')
})
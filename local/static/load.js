function updateFrameSize() {
    setTimeout(function(){
        $('#card-widget').height($('#card-widget').contents().find('body').outerHeight(true));
    },100);
}
$(function(){
    $('#card-widget').load(updateFrameSize);
    $(window).resize(updateFrameSize);
    setInterval(updateFrameSize, 3000);
});
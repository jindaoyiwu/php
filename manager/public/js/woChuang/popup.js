function surePopup(message,title) {

    title = title ? title : '提示';

    var htmlBox = '<div class="bomb-box prompt2"><div class="bomb-bg"></div><div class="prompt-area"><h3>'+title+'</h3><p class="sure-message">'+message+'</p><ul class="bomb-btn"> <li class="cancel-common">取消</li><li class="to-submit">确定</li></ul></div></div>';

    $('.popup-box').html(htmlBox);

    $('.bomb-bg').on('click',function () {
        $(this).parent().remove();
    });
    $('.cancel-common').bind('click',function () {
        $(this).parents('.bomb-box').remove();
    });
    $('.confirm-common').on('click',function () {
        $(this).parents('.bomb-box').remove();
    });
}
function promptPopup(message,url) {

    var htmlBox2 ='<div class="bomb-box prompt1"><div class="bomb-bg"></div><div class="prompt-area"><p class="prompt-message">'+message+'</p><span class="confirm-common confirm-style">确定</span></div></div>';

    $('.popup-box').html(htmlBox2);

    $('.bomb-bg').on('click',function () {
        $(this).parent().remove();
    });
    $('.cancel-common').bind('click',function () {
        $(this).parents('.bomb-box').remove();
    });
    $('.confirm-common').on('click',function () {
        if(url)
        {
            window.location.href = url;
        }
        $(this).parents('.bomb-box').remove();
    });
}

function successPopup(message) {

    var htmlBox3 = '<div class="bomb-box prompt-success"><div class="bomb-bg"></div><div class="prompt-area"><i></i><p class="success-message">'+message+'!</p></div></div>';

    $('.popup-box').html(htmlBox3);

    $('.bomb-bg').on('click',function () {
        $(this).parent().remove();
    });
    var t = setTimeout(function () {
        $('.prompt-success').remove();
    },1500);
}

function showLoading()
{
    var loadding = $('<div class="loading" id="loading-pop"><div class="loading-bg"></div><div class="loading-area"><img src="/images/loading1.gif" alt="loading..."></div></div>');
    $('body').append(loadding);
    loadding.show();
}

function hideLoading()
{
    $('#loading-pop').remove();
}
function request(url, container, elem, menu, end, hide, hist) {
    NProgress.start();
    $.ajax({
        url: SITE_URL + url,
        beforeSend: function (request) {
            if (hide) {
                request.setRequestHeader("hide", hide);
                if (hist) request.setRequestHeader("history", true);
            }
        },
        success: function (response) {
            if (elem) {
                if ($(elem).data('remove')) {
                    $($(elem).data('remove')).removeClass('active');
                }
            }
            if (elem && menu) {
                $(menu).removeClass('active').filter(elem).addClass('active');
            }
            $(container).html(response);
            if (hist) {
                $('a[href="' + SITE_URL + url + '"]').closest('ul').find('li').removeClass('active');
                $('a[href="' + SITE_URL + url + '"]').parent('li').addClass('active');
            }
            if (end !== true) {
                var data = url + '||' + container;
                if (hide) data += '||' + hide;
                history.pushState(data, null, SITE_URL + url);
            }
            $('.popup').remove();
            $('.full-container').removeClass('passive');
            NProgress.done();
        }
    });
}
/**
 * @author Rizart Dokollari
 * @since 20/12/2015
 */
$(function () {

    PNotify.prototype.options.styling = "fontawesome";

    function pNotifyMessage(notification) {
        new PNotify({
            title: notification.level === 'error' ? 'Error.' : 'Info.',
            text: notification.message,
            type: notification.level,
            animation: "slide",
            animate_speed: "slow",
            hide: 'true',
            shadow: 'true',
            delay: 3000,
            addclass: "stack-topleft"
        });
    }


    if ($('input[name=notifications]').length) {
        var notifications = jQuery.parseJSON($('input[name=notifications]').val());

        $.each(notifications, function (index, value) {
            new pNotifyMessage(value);
        });
    }
});

$.confirmRemove = function(e) {
    e.preventDefault();

    if(confirm($(this).data('confirm-text'))) {
        $(this).off('submit', $.confirmRemove);
        $(this).submit();
    }
};

$.notify = function(config) {
    var defaultConfig = {
        type: 'default',
        message: 'This is notify default message'
    };

    config = $.extend(defaultConfig, config);

    var $notifyWrapper = $('<div/>', {
       class: 'notify-wrapper'
    });

    var $notifyMessage = $('<div/>', {
        class: 'notify-message notify-message--' + defaultConfig.type
    }).appendTo($notifyWrapper);

    var $notifyMessageWrapper = $('<div/>', {
        class: 'notify-message__wrapper'
    }).appendTo($notifyMessage);

    var $notifyMessageText = $('<div/>', {
        class: 'notify-message__text'
    }).html(config.message).appendTo($notifyMessageWrapper);

    var $notifyMessageLink = $('<a/>', {
        class: 'notify-message__link',
        href: '#'
    }).click(function(e) {
        e.preventDefault();

        $notifyWrapper.remove();
    }).appendTo($notifyMessageWrapper);

    var $notifyMessageIcon = $('<div/>', {
        class: 'fa fa-remove'
    }).appendTo($notifyMessageLink);

    $('body').append($notifyWrapper);

    setTimeout(function () {
        $notifyMessage.addClass('notify-message--active');
    }, 1);

    setTimeout(function () {
        $notifyWrapper.remove();
    }, 5000);
};

$.setTabHeight = function ($jqTab, $jqItem) {
    $ckEditor = $jqItem.find('[data-ckeditor]');

    var setTabHeieght = function () {
        $jqTab.css({
            height: $jqItem.outerHeight() + parseInt($jqItem.css('top').replace('px'))
        });
    };

    if(!$ckEditor.length) setTabHeieght();
    else {
        $jqItem.find('[data-ckeditor]').ckeditor(function() {
            setTabHeieght();
        });
    }
};


$(document).ready(function () {
    var $confirmForms = $('[data-submit-confirm]');

    $('.tab').each(function(e) {
        var $tab = $(this),
            $tabItemButtons = $tab.find('.tab__button'),
            $tabItems = $tab.find('.tab__item'),
            $tabItemActive = $tab.find('.tab__item--active');

        $.setTabHeight($tab, $tabItemActive);


        $tabItemButtons.click(function(e) {
            e.preventDefault();

            var $tabButton = $(this),
                $tabButtonIndex = $tabButton.index(),
                $tabIndexItem = $tabItems.eq($tabButtonIndex);

            $tabItemButtons.not($tabButton).removeClass('button--active');
            $tabButton.addClass('button--active');

            $tabItems.not($tabButtonIndex).removeClass('tab__item--active');
            $tabIndexItem.addClass('tab__item--active');

            $.setTabHeight($tab, $tabIndexItem);

            $tabIndexItem.find('[data-ckeditor]').ckeditor();
        });
    });

    $confirmForms.submit($.confirmRemove);

    $('[data-submit-form]').click(function (e) {
        e.preventDefault();

        $('#' + $(this).data('submit-form')).submit();
    });

    $('[data-form-link]').click(function (e) {
        e.preventDefault();

        var $deleteBtn = $(this),
            $deleteWrapper = $deleteBtn.closest('.' + $deleteBtn.data('delete')),
            $tab = $deleteBtn.closest('.tab'),
            url = $deleteBtn.data('delete-action');

        if(confirm($(this).data('confirm-text'))) {
            $.post(url, {}, function(response, status) {
                (response.status || status === "success") && $deleteWrapper.remove();

                ($tab.length) && $.setTabHeight($tab, $tab.find('.tab__item--active'));
            });
        }
    });
});

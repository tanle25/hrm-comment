(function ($) {

    $.fn.emotionTooltip = function (options) {
        var el = $(this);
        $(this).on({
            mouseenter: function () {
                var data = $(this).data();
                var offset = $(this).offset();
                $(options.content).css({
                    top:offset.top -48,
                    left:offset.left
                });
                $('.emotions-container input[name=comment_id]').val(data.comment).change();
                Livewire.emit('reactComment',data.comment);
                $('.emotions-container').removeClass('hidden');
                // document.getElementById("comment-id").dispatchEvent(new Event('input'));
            },
            mouseleave: function () {
                $('.emotions-container').addClass('hidden');
            }
        });
    }


})(jQuery);

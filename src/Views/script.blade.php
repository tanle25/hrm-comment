{{-- <script src="{{ asset('js/emotion-tooltip.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
    <script type="module">
        var input = null;
        const pickerOptions = {
            onEmojiSelect: (e)=>{
                if (input) {
                    $(input).val(function(){
                        return $(this).val() + e.native;
                    })
                    input[0].dispatchEvent(new Event('input'));
                }
            },
            previewPosition:'none'
        }
        const picker = new EmojiMart.Picker(pickerOptions)
        var emojiButton = document.querySelector('.btn-picker');
        $(picker).css({'position':'absolute','display':'none'});
        $(picker).addClass('picker-popup');
        document.body.appendChild(picker)
        $('body').on('click',':not(.picker-popup, .btn-picker)', function(){
            $(picker).css({'display':'none'});
        });
        $(document).on('click', '.btn-picker', function(){
            var offset = $(this).offset();
            var top = offset.top + 40;
            var left = offset.left - $(picker).width();
            input = $(this).parents('form').find('.txt-content');

            $(picker).css({'display':'flex',"top":top,'left':left})
        })
            $(document).on("mouseenter",'.emotion',function(){
                var data = $(this).data();
                var offset = $(this).offset();
                $('.emotions-container').css({
                    top:offset.top -48,
                    left:offset.left
                });
                $('.emotions-container input[name=comment_id]').val(data.comment).change();
                $('.emotions-container').removeClass('hidden');

            });
            $(document).on('mouseleave','.emotion', function(){
                $('.emotions-container').addClass('hidden');
            });
            $(document).on('change','input[name=comment_id]', function(){
                this.dispatchEvent(new Event('input'));
            });

        $(document).on('click','.input-emotion', function(){
            var commentId = $('#comment-id').val();
            @this.reactComment = commentId;
            @this.reaction();
        });
</script> --}}

<div>
    <section class="place-items-center  h-screen py-4 sm:py-8 scroll-smooth ">
        <div
            class="px-2 py-4 bg-white rounded-xl border shadow-xl mx-auto  sm:px-5 hover:border-blue-200 dark:bg-gray-700">
            <form wire:submit.prevent='submit' class="mt-4">
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class=" bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea wire:model='content' wire:key='tttt' id="comment" rows="4"
                            class="px-4 py-2 txt-content w-full rounded-t-lg text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..." required></textarea>
                        <input type="hidden" name="" wire:model='model'>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                             Gửi bình luận
                        </button>
                        <div class="flex pl-0 space-x-1 sm:pl-2">
                            {{-- <button type="button"
                                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Attach file</span>
                            </button> --}}
                            <button type="button"
                                class="btn-picker relative inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="sr-only">Set location</span>
                            </button>
                            {{-- <button type="button"
                                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Upload image</span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </form>
            <div class="my-4">
                <small class="text-base font-bold text-gray-700 ml-1 dark:text-gray-200">{{$model->comments->count()}} comments</small>
                <div class="flex flex-col mt-4">
                    {{-- @dd($model) --}}
                    @foreach ($comments as $comment)
                        <div class="flex flex-row mx-auto justify-between px-1 py-1 w-full">
                            <div class="flex mr-2">
                                <div class="items-center justify-center w-12 h-12 mx-auto">
                                    <img alt="profil"
                                        src="{{asset($comment->author->avatar ?? 'images/comment-avatar-placeholder.jpg')}}"
                                        class="object-cover w-12 h-12 mx-auto rounded-full" />
                                </div>
                            </div>
                            <div class="flex-1 pl-1">
                                <div class="text-base font-semibold text-gray-600 dark:text-gray-300">
                                    {{ $comment->author->name }}<span
                                        class="text-sm font-normal text-gray-500 dark:text-gray-300">- Feb 11,
                                        2022</span>
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $comment->content }}
                                </div>
                                <div class="flex items-center text-sm mt-1 space-x-3">
                                    <a wire:click="showReply({{$comment->id}})" href="#parentReply" class="flex items-center text-blue-500 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-semibold">{{ $comment->comments->count() }} Reply</span>
                                    </a>
                                    <a href="javascript:;"
                                        class="flex emotion items-center text-red-500 hover:text-red-600 group"
                                        data-comment="{{ $comment->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 group-hover:text-red-600 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @if ($comment->reacts->count() > 0)
                                            <span class="font-semibold ">{{ $comment->reacts->count() }}</span>
                                        @endif
                                    </a>
                                    <a href="#" class="flex items-center text-blue-500 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <span class="font-semibold">Share</span>
                                    </a>
                                </div>
                                <div wire:ignore>
                                    <livewire:reply-component :comment="$comment" :key="time() . $comment->id">
                                </div>

                            </div>
                        </div>
                    @endforeach
                    @if ($amount < $model->comments->count())
                        <a wire:click='load' class="text-blue-600" href="javascript:;">Xem thêm bình luận</a>
                    @endif
                    @if ($showReplyForm)
                    <div class="mt-4">
                        <span class=" text-gray-400 text-sm">Đang trả lời bình luận của <b>{{$replyTo->author->name}}</b></span>
                    </div>
                    <form id="parentReply" wire:submit.prevent='reply' class="flex">
                        <div class="relative flex-1">
                            <button type="button" class="absolute right-3 dark:text-white text-2xl h-full btn-picker"><i class="fa-light fa-face-smile"></i></button>
                            <input wire:model='replyContent' type="text" id="last_name" class="txt-content bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="comment" required>
                        </div>
                        <button type="submit" class="text-blue-600 px-5 text-2xl hover:text-black dark:hover:text-white"><i class="fa-light fa-paper-plane"></i></button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <form wire:ignore wire:submit.prevent='reaction'>
        <div class="emotions-container hidden hover:block absolute rounded-xl bg-white">
            <input wire:model='reactComment' type="hidden" id="comment-id" name="comment_id" value="">
            <div class="flex py-2 px-1.5">
                @foreach (config('hrm_comment.emotions') as $key => $emotion)
                    <div class=" text-center relative">
                        <label for="react-{{ $key }}">
                            <img class="transform transition duration-500 hover:scale-150 cursor-pointer w-10 h-10 rounded-md mx-1 block hover:-mb-1"
                                src="{{ asset($emotion) }}" alt="">
                        </label>
                        <input type="radio" wire:model='emotion' value="{{ $key }}"
                            id="react-{{ $key }}" class=" hidden input-emotion">
                    </div>
                @endforeach
            </div>
        </div>
    </form>
    <div wire:ignore class="pickerContainer"></div>
</div>
@push('script')
    {{-- <script src="{{ asset('js/emotion-tooltip.js') }}"></script> --}}
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
            var top = offset.top - ($(picker).height() + 20);
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
</script>
@endpush

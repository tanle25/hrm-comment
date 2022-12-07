<div>

    @foreach ($comments as $reply )

    <div class="flex flex-row mx-auto justify-between mt-4">
        <div class="flex mr-2">
            <div class="items-center justify-center w-10 h-10 mx-auto">
                <img alt="profil"
                    src="{{asset($reply->author->avatar ?? 'images/comment-avatar-placeholder.jpg')}}"
                    class="object-cover w-10 h-10 mx-auto rounded-full" />
            </div>
        </div>
        {{-- {{hrmFormatTime($reply->created_at)}} --}}
        <div class="flex-1">
            <div class="text-base font-semibold text-gray-600 dark:text-gray-300">{{$reply->author->name}} <span
                    class="text-sm font-normal text-gray-500 dark:text-gray-300">- {{hrmFormatTime($reply->created_at)}}</span></div>
            <div class="text-sm text-gray-600 dark:text-gray-300">
                {{$reply->content}}
            </div>
            <div class="flex items-center text-sm mt-1 space-x-3">
                <a wire:click='showReplyForm({{$reply->id}})' href="javascript:;" class="flex items-center text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold">{{$reply->comments->count()}} Reply</span>
                </a>
                <a href="javascript:;" class="flex emotion items-center text-red-500 hover:text-red-600 group" data-comment="{{$reply->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 group-hover:text-red-600 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                    @if ($reply->reacts->count() > 0)
                    <span class="font-semibold ">{{$reply->reacts->count()}}</span>

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
                <livewire:reply-component :comment="$reply" :key="time() . $reply->id">
            </div>
        </div>

    </div>
    @endforeach
    @if ($comment->comments->count() > 0 && $amount < $comment->comments->count())
    <a wire:click='load' class="text-blue-600" href="javascript:;">Xem thêm bình luận</a>
    @endif

    @if ($showForm)
    <div class="mt-3">
        <span class=" text-sm text-gray-400">Trả lời bình luận của <b>{{$replyTo->author->name}}</b></span>
    </div>
    <form wire:submit.prevent='submit' class="flex">
        <div class="relative flex-1">
            <button type="button" class="absolute right-3 dark:text-white text-2xl h-full btn-picker"><i class="fa-light fa-face-smile"></i></button>
            <input wire:model='content' type="text" id="last_name" class="txt-content bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="comment" required>
        </div>
        <button type="submit" class="text-blue-600 px-5 text-2xl hover:text-black dark:hover:text-white"><i class="fa-light fa-paper-plane"></i></button>
    </form>
    @endif
</div>

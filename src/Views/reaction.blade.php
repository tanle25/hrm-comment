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

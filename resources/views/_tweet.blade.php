<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-grey-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->profileLink() }}">
            <img src="{{ $tweet->user->avatar }}"width="40" height="40" class="rounded-full mr-2" alt="User" />
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4"><a href="{{ $tweet->user->profileLink() }}">{{ $tweet->user->name }}</a></h5>
        <p class="text-sm mb-3">{{ $tweet->body }}</p>
        @component('components/like', ['tweet' => $tweet])@endcomponent
    </div>
</div>

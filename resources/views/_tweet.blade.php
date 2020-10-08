<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-grey-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->profileLink() }}">
            <img src="{{ $tweet->user->getAvatarPath() }}"width="40" height="40" class="rounded-full mr-2" alt="User" />
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4"><a href="{{ $tweet->user->profileLink() }}">{{ $tweet->user->name }}</a></h5>
        <div class="flex justify-between">
            <p class="text-sm mb-3 flex-1">{{ $tweet->body }}</p>
            
            @if ($tweet->hasImage())
                <img src="{{ $tweet->getImagePath() }}" alt="{{ $tweet->body }}" class="rounded-lg w-1/6" />
            @endif
        </div>
        @component('components/like', ['tweet' => $tweet])@endcomponent
    </div>
</div>

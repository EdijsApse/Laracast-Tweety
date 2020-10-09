<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-grey-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->profileLink() }}">
            <img src="{{ $tweet->user->getAvatarPath() }}"width="40" height="40" class="rounded-full mr-2" alt="User" />
        </a>
    </div>
    <div class="w-full">
        <div class="flex justify-between items-center mb-4">
            <h5 class="font-bold flex-1"><a href="{{ $tweet->user->profileLink() }}">{{ $tweet->user->name }}</a></h5>

            @can('delete', $tweet)
                <form method="POST" action="/tweets/{{ $tweet->id }}">
                    @method('DELETE')
                    @csrf
                    
                    <button class="rounded-lg shadow bg-red-600 py-2 px-2 text-white text-xs" type="submit">Delete</button>
                </form>
            @endcan

        </div>
        <div class="flex justify-between">
            <p class="text-sm mb-3 flex-1">{{ $tweet->body }}</p>
            
            @if ($tweet->hasImage())
                <img src="{{ $tweet->getImagePath() }}" alt="{{ $tweet->body }}" class="rounded-lg w-1/6" />
            @endif
        </div>
        @component('components/like', ['tweet' => $tweet])@endcomponent
    </div>
</div>

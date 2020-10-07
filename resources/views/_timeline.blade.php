<div class="border border-grey-300 rounded-xl">
    @forelse ($tweets as $tweet)
        @include('_tweet')
    
    @empty
        <p class="p-4">No tweets!</p>
        
    @endforelse

    {{ $tweets->links() }}
</div>
<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @forelse (auth()->user()->follows as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }}">
            <a href="{{ $user->profileLink() }}" class="flex items-center text-sm">
                <img src="{{ $user->avatar }}" width="40" height="40" class="rounded-full mr-2" alt="User" />
                {{ $user->name }}
            </a>
        </li>
    @empty
        <li>No Following Users!</li>
    @endforelse
</ul>

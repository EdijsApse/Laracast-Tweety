@component('components/app')
    <div>
    
        @foreach ($users as $user)
            <a href="{{ $user->profileLink() }}" class="flex items-center mb-5">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="80" class="rounded-full mr-4" />
                <div class="">
                    <h4 class="font-bold">{{ '@'.$user->username }}</h4>
                </div>
            </a>
        @endforeach

        {{$users->links()}}
    </div>
@endcomponent
@component('components/app')
    <div>
        <header class="mb-6">
            <div class="border rounded-xl mb-2 relative flex justify-center">
                <div class="border rounded-xl" style="max-height:200px; overflow:hidden">
                    <img src="/images/profile_banner.jpg" alt="Profile Banners" />
                </div>

                <img src="{{ $user->avatar }}" width="130" style="bottom: -65px" class="rounded-full absolute mr-2" alt="User" />
            </div>

            <div class="flex justify-between items-center mb-6">
                <div style="max-width:270px">
                    <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                    <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>

                <div class="flex">

                    @can('edit', $user)
                        <a href="/profile/{{ $user->username }}/edit" class="rounded-full border border-grey-400 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                    @endcan

                    @component('components/follow-btn', ['user' => $user])
                    @endcomponent
                
                </div>
            </div>

            <p class="text-sm">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with de
            </p>
        
        </header>

        @include('_timeline', [
            'tweets' => $tweets
        ])
    </div>

@endcomponent

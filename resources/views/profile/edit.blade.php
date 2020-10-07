@component('components/app')
    <form method="POST" action="/profile/{{ $user->username }}/edit" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="name" value="{{ $user->name }}" id="name" required />

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="username" value="{{ $user->username }}" id="username" required />

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">Avatar</label>
                
                <div class="flex items-center">
                    <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar" />
                    <img src="{{ $user->avatar }}" alt="{{ $user->username }}" width="50" class="rounded-full ml-6" />
                </div>

                @error('avatar')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email address</label>
            <input class="border border-gray-400 p-2 w-full" type="email" name="email" value="{{ $user->email }}" id="email" required />

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" />

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">Password Confirmation</label>
            <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="password_confirmation" />

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">Update</button>        
            <a href="{{ $user->profileLink() }}" class="hover:underline">Cancel</a>
        </div>

    </form>
@endcomponent
<div class="border border-blue-400 rounded-xl px-8 py-6 mb-8">
    <form action="/tweets" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?" required>{{ old('body') }}</textarea>
        
        <div class="mb-6">
                <div class="flex items-center">
                    <input class="border border-gray-400 p-2 w-full" type="file" name="image" />
                </div>

                @error('banner')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
        </div>

        <hr class="mb-4">
        <footer class="flex justify-between items-center">

            <img src="{{ auth()->user()->getAvatarPath() }}" width="50" height="50" class="rounded-full mr-2" alt="Your avatar" />

            <button class="bg-blue-500 hover:bg-blue-600 rounded-full shadow py-2 px-10 text-sm text-white" type="submit">Publish</button>

        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>

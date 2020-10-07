<ul>

    <li><a href="{{ route('home') }}" class="font-bold text-lg mb-4 block">Home</a></li>
    <li><a href="/explore" class="font-bold text-lg mb-4 block">Explore</a></li>
    <li><a href="" class="font-bold text-lg mb-4 block">Notifications</a></li>
    <li><a href="" class="font-bold text-lg mb-4 block">Messages</a></li>
    <li><a href="" class="font-bold text-lg mb-4 block">Bookmarks</a></li>
    <li><a href="" class="font-bold text-lg mb-4 block">Lists</a></li>
    <li><a href="{{ auth()->user()->profileLink() }}" class="font-bold text-lg mb-4 block">Profile</a></li>
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg mb-4 block" type="submit">Logout</button>
        </form>
<ul>
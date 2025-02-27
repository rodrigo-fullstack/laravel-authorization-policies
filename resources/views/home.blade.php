<x-layouts.app >

    <div>Logged in as {{auth()->user()->role}}</div>
    <a href="{{ route('logout') }}">Logout</a>

    


</x-layouts.app>

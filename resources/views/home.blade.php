<x-layouts.app >

    <div>Logged in as {{auth()->user()->role}}</div>
    <a href="{{ route('logout') }}">Logout</a>

    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($posts as $post)
                    <livewire:post :$post>


                @endforeach
            </div>
        </div>
    </div>


</x-layouts.app>

<x-layouts.app>

    @can('create', \App\Models\Post::class)
        <a href="{{ route('create') }}">Create new Post</a>
    @endcan

    <div>Logged in as {{ auth()->user()->role }}</div>
    <a href="{{ route('logout') }}">Logout</a>

    <div class="container">
        <div class="row">
            <div class="col">

                @foreach ($posts as $post)
                    @can('view', $post)
                        <livewire:post-component :post="$post">
                        @endcan
                @endforeach
            </div>
        </div>
    </div>


</x-layouts.app>

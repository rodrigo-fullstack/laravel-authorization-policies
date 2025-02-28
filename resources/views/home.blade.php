@php
    use App\Policies\PostPolicy;
@endphp


<x-layouts.app >

    <div>Logged in as {{auth()->user()->role}}</div>
    <a href="{{ route('logout') }}">Logout</a>

    <div class="container">
        <div class="row">
            <div class="col">

                @foreach ($posts as $post)
                
                    @can('view', $post)
                    <livewire:post-component :post="$post" :postPolicy="new PostPolicy()">
                        
                    @endcan
                        


                @endforeach
            </div>
        </div>
    </div>


</x-layouts.app>

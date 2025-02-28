<div>
    <div class="row">
        Author: {{$post->user->name}}
        Created at: {{$post->created_at}}
    </div>

    <div class="row">
        <div class="row">Title: {{$post->title}}</div>
        <div class="row">Content: {{$post->content}}</div>
    </div>

    
    @can('update', $post)
        <a class="btn btn-primary" href="#">
            Update
        </a>
    @endcan

    {{-- instance passing is not allowed in livewire --}}
    {{-- @if($postPolicy->update(auth()->user(), $post))
        <a class="btn btn-primary" href="#">
            Update
        </a>
    @endif --}}
</div>

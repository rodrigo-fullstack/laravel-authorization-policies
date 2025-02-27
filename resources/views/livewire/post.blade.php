<div>
    <div class="row">
        Author: {{$post->user->name}}
        Created at: {{$post->created_at}}
    </div>

    <div class="row">
        <div class="row">Title: {{$post->title}}</div>
        <div class="row">Content: {{$post->content}}</div>
    </div>
</div>

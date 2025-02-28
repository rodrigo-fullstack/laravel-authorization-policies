<?php
namespace App\Livewire;

use App\Models\Post;
use App\Policies\PostPolicy;
use Livewire\Component;

class PostComponent extends Component
{
    public Post $post;
    // public PostPolicy $postPolicy;

    public function mount(
        Post $post,
    ) {
        $this->post = $post;
    }

    public function render()
    {
        $postPolicy = new PostPolicy();

        // return view('livewire.post-component', compact('postPolicy'));
        return view('livewire.post-component');

    }
}

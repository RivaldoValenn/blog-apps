<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Reactive;

class Like extends Component
{
    #[Reactive]
    public Post $post;
    protected $refresh = ['post'];

    public function toggleLike(){
        if(auth()->guest()){
            return redirect(route('login'), true);
        }
        $user = auth()->user();
        if ($user->hasLiked($this->post)) {
            // User has already liked, so unlike
            $user->likes()->detach($this->post);
        } else {
            // User hasn't liked, so like
            $user->likes()->attach($this->post);
        }
    
        // Reload the post to get the updated like count
        $this->post->refresh();
    }
    public function render()
    {
        return view('livewire.like');
    }
}
<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public $title;
    public $content;
    public $postId;

    protected $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:5'
    ];

    public function mount($id)
    {
        $post = Post::find($id);
        $this->title = $post->title;
        $this->content = $post->content;
        $this->postId = $post->id;
    }

    public function render()
    {
        return view('livewire.post.edit');
    }

    public function update()
    {
        $this->validate();

        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->title,
            'content' => $this->content
        ]);

        session()->flash('success', 'Post ' . $post->title . ' was updated');
        return redirect('post');
    }
}

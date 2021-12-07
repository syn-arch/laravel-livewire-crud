<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:5'
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function store()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Post ' . $post->title . ' was added');
        return redirect('post');
    }
}

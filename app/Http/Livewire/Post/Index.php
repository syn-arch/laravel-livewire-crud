<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 5;
    public $search;
    public $idDelete;
    public $titleDelete;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => $this->search == null ? Post::latest()->paginate($this->paginate) :
                Post::latest()->where('title', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function setIdDelete($post)
    {
        $this->idDelete = $post['id'];
        $this->titleDelete = $post['title'];
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        session()->flash('success', 'Post ' . $post->title . ' was deleted');
        return redirect('post');
    }
}

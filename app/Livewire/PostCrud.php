<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCrud extends Component
{
    public string $title = '';
    public string $content = '';
    public ?int $post_id = null;
    public bool $isEditing = false;

    protected function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:5',
        ];
    }

    public function store(): void
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetForm();
        session()->flash('message', 'Пост успешно создан.');
    }

    public function edit(int $id): void
    {
        $post = Post::findOrFail($id);

        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->isEditing = true;
    }

    public function update(): void
    {
        $this->validate();

        $post = Post::findOrFail($this->post_id);

        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetForm();
        session()->flash('message', 'Пост обновлён.');
    }

    public function delete(int $id): void
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Пост удалён.');
    }

    public function cancel(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->post_id = null;
        $this->title = '';
        $this->content = '';
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.post-crud', [
            'posts' => Post::latest()->get(),
        ]);
    }
}

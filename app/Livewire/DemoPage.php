<?php

namespace App\Livewire;

use Livewire\Component;

class DemoPage extends Component
{
    public $name = '';
    public $newTask = '';
    public $count = 0;
    public $search = '';

    public $tasks = [
        '1',
        '2',
        '3',
        '4',
    ];

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function addTask()
    {
        $this->validate([
            'newTask' => 'required|min:3',
        ], [
            'newTask.required' => 'Введите задачу',
            'newTask.min' => 'Минимум 3 символа',
        ]);

        $this->tasks[] = $this->newTask;
        $this->newTask = '';

        session()->flash('success', 'Задача добавлена');
    }

    public function removeTask($index)
    {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);

        session()->flash('success', 'Задача удалена');
    }

    public function getFilteredTasksProperty()
    {
        if (!$this->search) {
            return $this->tasks;
        }

        return array_filter($this->tasks, function ($task) {
            return str_contains(mb_strtolower($task), mb_strtolower($this->search));
        });
    }

    public function render()
    {
        return view('livewire.demo-page');
    }
}

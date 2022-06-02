<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Todo extends Component
{
    public $todos = [];
    public $newTodo = '';
    public $total = 0;
    public $completed = 0;

    public function render()
    {
        return view('livewire.todo');
    }

    public function addTodo()
    {
        $this->validate(['newTodo' => 'required']);
        $this->todos[] = [
            'name' => $this->newTodo,
            'completed' => false,
        ];
        $this->newTodo = '';
        $this->total += 1;
        $this->count();
    }

    public function removeTodo($key)
    {
        unset($this->todos[$key]);
        $this->total -= 1;
        $this->count();
    }

    public function changeStatus($key)
    {
        $this->todos[$key]['completed'] = ! $this->todos[$key]['completed'];
        $this->count();
    }

    public function count()
    {
        $this->completed = collect($this->todos)->where('completed', true)->count();
    }
}

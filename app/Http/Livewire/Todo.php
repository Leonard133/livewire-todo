<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Todo extends Component
{
    public $todos = [];
    public $newTodo = '';

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
    }

    public function removeTodo($key)
    {
        unset($this->todos[$key]);
    }

    public function changeStatus($key)
    {
        $this->todos[$key]['completed'] = ! $this->todos[$key]['completed'];
    }
}

<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use App\Models\Todo;
class TodoList extends Component
{
    public $todos;
    public $title = '';
    public $description = '';
    public $date = '';

    /**
     * Load all Todos when loaded in
     *
     * @return void
     */
    public function mount(){
        $this->fetchTodos();
    }

    /**
     * fetch the todos when function is called
     *
     * @return void
     */
    public function fetchTodos()
    {
        $this->todos = Todo::all()->reverse();
    }

    /**
     * Create new Todo in the database when the correct data is available
     *
     * @return void
     */
    public function createTodo()
    {
        if(!empty($this->title) && !empty($this->description) && !empty($this->date)){
            $todo = new Todo();
            $todo->title = $this->title;
            $todo->description = $this->description;
            $todo->date = $this->createDate($this->date);
            $todo->updateTimestamps();
            $todo->save();
            $this->title = '';
            $this->description = '';
            $this->date = '';
            $this->fetchTodos();
        }
    }

    /**
     * Create a date from a string
     * @param string $date
     * @return string
     */
    public function createDate(string $date) {
        $time = strtotime($date);
        $date = date("Y-m-d", $time);
        return $date;
    }

    /**
     * @param Todo $todo
     * @return void
     */
    public function completeTodo(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        $this->fetchTodos();
    }

    /**
     * Delete the todo
     *
     * @param Todo $todo
     * @return void
     */
    function delete(Todo $todo)
    {
        $todo->delete();
        $this->fetchTodos();
    }

    /**
     * Render the blade
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function render()
    {
        return view('livewire.todo-list');
    }
}

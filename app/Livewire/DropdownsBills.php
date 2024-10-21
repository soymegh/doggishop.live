<?php

namespace App\Livewire;

use App\Models\Departments;
use App\Models\Municipalities;
use Livewire\Component;

class DropdownsBills extends Component
{
    public $departments;
    public $municipalities = [];
    public $department_id;
    public $municipalityId;

    public function mount() {
        $this->departments = Departments::all();
        $this->municipalities = collect();
    }

    public function render()
    {
        return view('livewire.dropdowns-bills');
    }

    public function updatedDepartmentId($value) {

        $this->municipalities = Municipalities::where('departments_id', $value)->get();

        $this->municipalityId = collect($this->municipalities)->isNotEmpty() ? collect($this->municipalities)->first()->id : null;
    }
}

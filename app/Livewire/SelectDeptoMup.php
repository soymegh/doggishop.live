<?php

namespace App\Livewire;

use App\Models\Departments;
use App\Models\Municipalities;
use Livewire\Component;

class SelectDeptoMup extends Component
{

    public $departments = [];
    public $municipalities = [];
    public $selectedDepartment = null;
    public $selectedMunicipality = null;


    public function mount() {
        $this->departments = Departments::all();
        $this->municipalities = collect();
    }



    public function updatedSelectedMunicipality($id) {

        $this->selectedMunicipality = null;
    }



    public function render()
    {
        dd($this->selectedDepartment);
        $this->municipalities = Municipalities::where('departments_id', $this->selectedDepartment)->get();
        return view('livewire.select-depto-mup');
    }
}

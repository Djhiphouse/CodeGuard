<?php

namespace App\Livewire;

use App\Models\Variable;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class VariableView extends Component
{

    use WithPagination;
    use LivewireAlert;

    public $mode = 'show';
    public $name;
    public $value;
    public $app_id;


    public function render()
    {
        return view('livewire.variable-view');
    }

    public function changeMode()
    {
        if ($this->mode == 'show')
            $this->mode = 'edit';
        else
            $this->mode = 'show';
    }

    public function deleteVariable($id)
    {
        if (Variable::deleteVariable($id))
        {
            $this->alert('success', 'Variable deleted successfully');
        }
        else
        {
            $this->alert('error', 'Variable deletion failed');
        }
    }

    public function createVariable()
    {
        if (Variable::createVariable($this->name, $this->value, $this->app_id))
        {
            $this->alert('success', 'Variable created successfully');
            $this->mode = 'show';
        }
        else
        {
            $this->alert('error', 'Variable creation failed');
        }
    }

    public function deactivate($id)
    {
        if (Variable::deactivate($id))
        {
            $this->alert('success', 'Variable deactivated successfully');
        }
        else
        {
            $this->alert('error', 'Variable deactivation failed');
        }
    }

    public function activate($id)
    {
        if (Variable::activate($id))
        {
            $this->alert('success', 'Variable activated successfully');
        }
        else
        {
            $this->alert('error', 'Variable activation failed');
        }
    }

}

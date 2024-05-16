<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class ApplicationView extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $mode = "show";
    public $name;

    public function render()
    {
        return view('livewire.application-view');
    }

    public function changeMode()
    {
        if ($this->mode == 'show')
        {
            $this->mode = 'edit';
        }
        else
        {
            $this->mode = 'show';
        }
    }
    public function createApplication()
    {
       if (Application::createApplication($this->name))
       {
           $this->alert('success', 'Application created successfully');
           $this->mode = 'show';
       }
       else
       {
           $this->alert('error', 'Application creation failed');
       }
    }

    public function deactivate($id)
    {
        if (Application::disableApplication($id))
        {
            $this->alert('success', 'Application disabled successfully');
        }
        else
        {
            $this->alert('error', 'Application disabling failed');
        }
    }

    public function activate($id)
    {
        if (Application::enableApplication($id))
        {
            $this->alert('success', 'Application enabled successfully');
        }
        else
        {
            $this->alert('error', 'Application enabling failed');
        }
    }
}

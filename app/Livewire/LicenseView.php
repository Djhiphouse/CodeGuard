<?php

namespace App\Livewire;

use App\Models\License;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class LicenseView extends Component
{
    use LivewireAlert;
    use WithPagination;

    public  $mode = 'show';

    public $current_license;
    public $app_id;
    public $time_in_days;
    public function render()
    {
        return view('livewire.license-view');
    }

    public function changeMode()
    {
        if ($this->mode == 'show')
                $this->mode = 'edit';
        else
         $this->mode = 'show';
    }

    public function deleteLicense($id)
    {
        $license = License::find($id);
        $license->delete();
    }

    public function createLicense()
    {
        if (License::createLicense($this->app_id, $this->time_in_days))
        {
            $this->alert('success', 'License created successfully');
            $this->mode = 'show';
        }
        else
        {
            $this->alert('error', 'License creation failed');
        }
    }

    public function activate($id)
    {
       if (License::activate($id))
       {
           $this->alert('success', 'License activated successfully');
       }
       else
       {
           $this->alert('error', 'License activation failed');
       }
    }

    public function deactivate($id)
    {
       if (License::deactivate($id))
       {
           $this->alert('success', 'License deactivated successfully');
       }
       else
       {
           $this->alert('error', 'License deactivation failed');
       }
    }
}

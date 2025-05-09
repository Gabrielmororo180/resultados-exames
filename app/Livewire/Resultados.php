<?php

namespace App\Livewire;

use Livewire\Component;

class Resultados extends Component
{
  
    public $codigo;

    public function baixar(){
        $file=public_path().'/../uploads/' . $this->codigo.'.pdf';
      
        if (file_exists($file)) {
             return response()->download($file);
             $this->codigo='';
        }
        else
        {
         
            session()->flash('message', 'Exame não encontrado');
        }
    }


    public function render()
    {
        return view('livewire.resultados') ->layout('components.layouts.resultadolayout');;
    }
}

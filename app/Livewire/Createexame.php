<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class Createexame extends Component
{
    public $exame,$nome,$cpf,$codigo,$telefone;
    public $isOpen = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'cpf' => 'nullable|string|max:14',
        'codigo' => 'required|nullable|string|max:255',
        'telefone' => 'required|string|max:255'
    ];
    public function clearFields()
    {
      $this->nome='';
      $this->cpf='';
      $this->codigo='';
      $this->telefone='';
       
    }


   
    public function save(Request $request)
    {
        
        $this->exame['nome']=$this->nome;
        $this->exame['cpf']=$this->cpf;
        $this->exame['codigo']=$this->codigo;
        $this->exame['telefone']=$this->telefone;

        $this->clearFields();
        $this->dispatch('createexame', $this->exame)->to(dashboard::class);
        $this->dispatch('close-modal');
        

    }
    public function render()
    {
        return view('livewire.createexame');
    }
}

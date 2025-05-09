<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Showmodal extends Component
{
   public $idexame;
    protected $listeners = ['openModal'];

    #[On('open-showmodal')]
    public function openModal($id)
    {
        $this->idexame=$id;
    }

    public function confirm()
    {
        $this->dispatch('deleteexame', $this->idexame)->to(dashboard::class);
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
       $message='Deseja Realmente Apagar esse Registro?';
        return view('livewire.showmodal',
        [
            'message' => $message,  // Passa a mensagem diretamente para a view
        ]);
    }
}

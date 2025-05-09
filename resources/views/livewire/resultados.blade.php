
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100g">
   
     <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
         <form wire:submit='baixar'>
             @csrf
             <div>
                <img class="mx-auto h-12 w-auto" src="/build/assets/LOGO.png" alt="Alk Login">
                <h2 class="mt-4 mb-8 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Resultados de Exames</h2>
        
           </div>
         
             <x-validation-errors class="mb-4" />
         
          

             @if (session()->has('message'))
             <div class="bg-red-500 text-white p-4 rounded-md">
                 {{ session('message') }}
             </div>
             @endif
             <div>
                 <x-label for="Nome" value="{{ __('Adicione o Código do Exame') }}" />
                 <x-input wire:model='codigo' id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="username" />
             </div>
 
           
 
             <div class="flex items-center justify-end mt-4">
 
 
                 <x-button class="ms-4">
                     {{ __('Baixar') }}
                 </x-button>
             </div>
         </form>
     </div>
 </div>


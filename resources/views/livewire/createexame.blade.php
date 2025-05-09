<div  x-data = "{ show : false }" x-show = "show" x-on:open-modal.window = "show = true"
x-on:close-modal.window = "show = false" x-on:keydown.escape.window = "show = false" style="display: none;"
class="fixed inset-0 z-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0">
{{-- Background Modal --}}
<div x-on:click = "show = false" class="fixed inset-0 bg-gray-300 opacity-60">

</div>

     
    <div class="flex items-center justify-center min-h-screen">
        
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 z-20">
            <button x-data x-on:click="$dispatch('close-modal')" wire:click="clearFields"
            class="flex justify-end text-xl mb-2 ml-6">x</button>

            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Adicionar Exame
            </h2>

       

            <!-- Formulário para adicionar cliente -->
            <form wire:submit.prevent="save">
                <div class="flex flex-wrap -mx-2  px-8 py-6">
                    <div class="w-2/3 px-2">
                         <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Paciente</label>
                        <div class="relative mt-2">
                            <input  type="text" name="last-name" id="nome"
                                autocomplete="cc-family-name"  wire:model="nome" required 
                                class="uppercase bg-white block w-full rounded-md border-0 px-3 py-1.5 pr-10
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                    
                        </div>
                    </div>
             
                    <div class="w-1/3 px-2">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                       <div class="relative mt-2">
                           <input  type="text" name="last-name" id="cpf"
                               autocomplete="cc-family-name"  wire:model="cpf"
                               class="bg-white block w-full rounded-md border-0 px-3 py-1.5 pr-10
                               text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                   
                       </div>
                   </div>

                </div>

                <div class="flex flex-wrap -mx-2 px-8">
                    <div class="w-1/3 px-2">
                         <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Código</label>
                        <div class="relative mt-2">
                            <input  type="text" name="last-name" id="codigo" required 
                                autocomplete="cc-family-name"  wire:model="codigo"
                                class="bg-white block w-full rounded-md border-0 px-3 py-1.5 pr-10
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                    
                        </div>
                    </div>
             
                    <div class="w-1/3 px-2">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                       <div class="relative mt-2">
                           <input  type="text" name="last-name" id="telefone"
                               autocomplete="cc-family-name"  wire:model="telefone"
                               class="bg-white block w-full rounded-md border-0 px-3 py-1.5 pr-10
                               text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                   
                       </div>
                   </div>

                </div>


            
                <!-- Adicione outros campos aqui -->

                <div class="flex items-center justify-end gap-x-6 py-4  mt-4">
                    <div class="bg-white">
                     
                                <button type="submit"
                                class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white shadow-sm
                                 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                  focus-visible:outline-indigo-600">Salvar</button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

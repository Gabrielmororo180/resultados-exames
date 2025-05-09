<div  x-data="{ show: @entangle('show').defer }" x-show = "show" x-on:open-showmodal.window = "show = true"
x-on:close-modal.window = "show = false" x-on:keydown.escape.window = "show = false" style="display: none;"
class="fixed inset-0 z-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0">
{{-- Background Modal --}}
<div x-on:click = "show = false" class="fixed inset-0 bg-gray-300 opacity-60">

</div>

     
    <div class="flex items-center justify-center min-h-screen">
        
        <div
        class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
   
            <button x-data x-on:click="$dispatch('close-modal')" 
            class="flex justify-end text-xl mb-2 ml-6">x</button>

            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
     
            <h2 class="text-center text-2xl mt-8 font-bold leading-5 tracking-tight text-gray-900">{{$message}}
            </h2>  <!-- Formulário para adicionar cliente -->
          
            <div class="flex items-center justify-end gap-x-6 py-4  mt-4">
                <div class="bg-white">
                 
                            <button wire:click="confirm()"
                            class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white shadow-sm
                             hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                              focus-visible:outline-indigo-600">Sim</button>
                  
                </div>
            </div>
        </div>
    </div>
</div>

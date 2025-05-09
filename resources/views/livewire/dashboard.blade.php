
<div class="max-w-7xl mx-auto p-12 bg-white shadow-md rounded-md mt-10">
   
  
    <div class="mt-6 mb-8 text-right">
        <form action="{{ route('exame.import', 1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="csv_file">Selecione um arquivo CSV:</label>
            <input type="file" name="csv_file" id="csv_file" required>
            <button type="submit" 
            class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-indigo-700">Enviar</button>
    
        
        </form>
    
      
    </div> 

    <div class="mt-6 mb-8 text-right">
        <button type="button" x-data x-on:click="$dispatch('open-modal', { name: 'createexame' })"
            class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-indigo-700">
            Adicionar Exame
        </button>
      
    </div> 
    

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-first mb-4">

                <div class="w-full max-w-xs mr-5">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input wire:model.live="search"
                         wire:keydown.enter="queryExames"
                    
                            class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Pesquisar" type="search">
                    </div>
                </div>

                <!-- Pesquisa por status -->
                <div>
                    <div x-cloak x-data="{ open: false }" @click.away="open = false"
                        class="relative mr-5">
                        @if ($selectedStatus == 'Status')
                            <button @click="open = !open" placeholder="Status"
                                type="button"
                                class="relative w-32 cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                aria-haspopup="listbox" aria-expanded="true"
                                aria-labelledby="listbox-label">
                                <span class="inline-flex w-full truncate">
                                    <span
                                        class="text-gray-400 truncate font-normal">{{ $selectedStatus }}</span>
                                </span>
                                <span
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        @else
                            <div
                                class="relative w-32 space cursor-default rounded-md py-1.5 pl-3 pr-3 text-left bg-indigo-600 text-white shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <div class="flex items-center justify-between">
                                    <button @click="open = !open" placeholder="Status"
                                        type="button" aria-haspopup="listbox"
                                        aria-expanded="true"
                                        aria-labelledby="listbox-label">
                                        <span class="inline-flex w-full truncate">
                                            <span
                                                class="truncate font-semibold">{{ $selectedStatus }}</span>
                                        </span>
                                    </button>
                                    <div class="flex items-end ml-3">
                                        <button wire:click="setStatus('Status')"
                                            type="button">
                                            
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <ul x-show="open"
                            class="z-20 absolute  mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox"
                            aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-3">
                            @foreach (['Pendente', 'Enviado'] as $status)
                                <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                                    id="listbox-option-0" role="option">
                                    <a wire:model="search"
                                    
                                        wire:click="setStatus('{{ $status }}')"
                                        href="#" @click="open = false">
                                        {{ $status }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Pesquisa por palavras -->
               
            </div>
          
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">

                            
                            <div class="border rounded-lg overflow-hidden">
                                
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase">ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Nome</th>
                                           
                                            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 uppercase">
                                               CPF</th>
                                            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 uppercase">
                                                CÓDIGO</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                                                STATUS</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                                                    DATA
                                            </th>    
                                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                                                   </th>
                                             <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                                                </th>           
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($exames as $exame)
                                        <tr>
                                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800">{{ $exame->id
                                                }}</td>
                                            <td class="px-6 py-4  text-center whitespace-nowrap text-sm font-medium text-gray-800">{{ $exame->nome
                                                }}</td>
                                             <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800">{{ $exame->cpf
                                                }}</td>
                                              
                                              <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800 ">{{ $exame->codigo
                                                }}</td>
                                               

                                               <td class="hidden px-3 text-center py-4 text-sm text-gray-500 sm:table-cell">
                                                @switch($exame->status)
                                                    @case(0)
                                                        <span
                                                            class="rounded-md bg-orange-50 px-2 py-2 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-600/10">Pendente
                                                        </span>
                                                    @break
        
                                                    @case(1)
                                                        <span
                                                            class="rounded-md bg-green-50 px-2 py-2 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Enviado
                                                        </span>
                                                    @break
        
                                                  
                                                @endswitch
                                            </td>
                                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ date( 'd/m/Y H:i:s' , strtotime($exame->created_at))}}</td>
                                             <td>  
                                               
                                    
                                                @if($exame->status ==0) 
                                                    <form action="{{ route('exame.upload', $exame->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                            
                                                        <!-- Input de arquivo oculto -->
                                                        <input type="file" name="resultado" id="file-upload-{{ $exame->id }}" style="display:none;" onchange="this.form.submit()">
                                            
                                                        <!-- Botão de upload -->
                                                        <button type="button" onclick="document.getElementById('file-upload-{{ $exame->id }}').click();">
                                                        <i class="ml-5 fa fa-upload"></i> <!-- Ou use seu ícone específico aqui -->
                                                        </button>
                                                    </form>
                                                
                                                @endif        

                                            </td>

                                             <td> 
                                              <button type="button" x-data x-on:click="$dispatch('open-showmodal', {id:'{{$exame->id}}' })"
                                                >
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>   
                                               
                                            </td>
                                        </tr>
            
                                        @endforeach
                                    </tbody>
                                </table>
                              
                            <div class="fi-pagination  bg-white items-center gap-x-3 fi-ta-pagination px-3 py-3 sm:px-6">
                                {{ $exames->links() }}
                            </div>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        @livewire('showmodal')
        @livewire('createexame')
     
</div>

 

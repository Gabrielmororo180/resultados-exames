<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\exames;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{
    use WithPagination;

 
    public $selectedStatus = 'Status';
    public $search,$search1;
    
    #[On('showmodal')]
    #[On('createexame')]
    public function createexame($exame)
    {
      
       Exames::create([
        'nome'=>$exame['nome'],
        'cpf'=>$exame['cpf'],
        'codigo'=>$exame['codigo'],
        'telefone'=>$exame['telefone']
        ]
       );

      
    }

    public function upload(Request $request,$id){
          
        
    $request->validate([
        'resultado' => 'nullable|mimes:pdf|max:2048', 
    ]);



    $exame = Exames::findOrFail($id);

    if ($request->hasFile('resultado')) {

        $file = $request->file('resultado');
        $filename = $exame->codigo .'.pdf';

        if (!Storage::exists('uploads')) {
            Storage::makeDirectory('uploads');
        }

        $file->storeAs('uploads', $filename);

        $exame->status = 1;
        $exame->save();
   
    }


    return redirect()->back()->with('success', 'Arquivo enviado com sucesso!');

    }

    #[On('deleteexame')]
    public function DeleteRegistro($id){

        $exame = Exames::findOrFail($id);
        $exame->delete();
    }
    public function queryExames(){
        $this->search1=$this->search;
    }
    public function setStatus($status){
     
        $this->selectedStatus = $status; 
    }

    public function importcsv(Request $request){
    
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);
    

        $path = $request->file('csv_file')->store('csv_files');
        
        // Abrir o arquivo CSV armazenado
        if (($handle = fopen(storage_path('app/' . $path), 'r')) !== false) {
            stream_filter_append($handle, 'convert.iconv.ISO-8859-1/UTF-8');

            $header = fgetcsv($handle, 1000, ';');
    
            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
                $data = array_combine($header, $row);
                
                Exames::create([
                    'nome'=>$data['NOME'],
                    'codigo'=>$data['CODEXAME'],
                    'cpf'=>$data['CPF']
                    ]
               );
            }
    
            fclose($handle);
        }
    
        return redirect()->back()->with('success', 'CSV importado com sucesso!');
 
    
    }
    


    public function render()
    {
        $status=''; 
        if($this->selectedStatus == 'Pendente')
        $status=0;
        else if ($this->selectedStatus == 'Enviado')
        $status=1;
     
        if($this->search=='')
        $this->search1=$this->search;

            $exames = DB::table('exames')->where
            (function ($query) use ($status){
                    
                        $query->where('nome','like',"%{$this->search1}%")->
                        orwhere('codigo','like',"%{$this->search1}%");
                    

                    
                }          
            )->where('status','like',"%{$status}%")->orderby('id','desc')->paginate(30);

    
      

  
    // Passar   os dados paginados para a view
    return view('livewire.dashboard', [
        'exames' => $exames, // Não atribua isso a uma propriedade pública
    ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno; //IMPORT DO ALUNO

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select * from alunos
      $dados = Aluno::All();  // dados RECEBE aluno // sejam carregados e redirecionados, estamos na view e ela chama a rota e chama o controller e retorna a inofrmação

      return view('aluno.list',
      data: ['dados' => $dados]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluno.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd("teste"); dd - função nativa do laravel utilizada pra debugar do código SÓ PRA TESTE

        $request->validate([
            'nome'=>'required|min:3|max:100', //VALIDAÇÃO DO NOME -> minimo 3 caracteres, maximo 100 caracteres
            'cpf'=>'required|max:14',
            'telefone'=>'nullable|min:10|max:40' //telefone opcional
        ],[
            'nome.required'=>'0 :attribute é obrigatório', //se respondido errado, vai aparecer a msg "atribute(nome nesse caso) é obrigatório"
            'cpf.required'=>'0 :attribute é obrigatório',
        ]);

        $data = [
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'telefone'=>$request->telefone,
        ];

        Aluno::create($data);

        redirect(to:'aluno'); // store - redireciona o aluno

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $dado = Aluno::findFail($id);


        return view(
            'aluno.form',
            ['dado' => $dado]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>'required|min:3|max:100', //VALIDAÇÃO DO NOME -> minimo 3 caracteres, maximo 100 caracteres
            'cpf'=>'required|max:14',
            'telefone'=>'nullable|min:10|max:40' //telefone opcional
        ],[
            'nome.required'=>'0 :attribute é obrigatório', //se respondido errado, vai aparecer a msg "atribute(nome nesse caso) é obrigatório"
            'cpf.required'=>'0 :attribute é obrigatório',
        ]);

        $data = [
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'telefone'=>$request->telefone,
        ];

        Aluno::updateOrcreate(
        ['id' =>$id],
         $data );

        redirect(to:'aluno'); // store - redireciona o aluno

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // dd(vars: "teste");
       $dado = Aluno:: find(id: $id);

       $dado->delete();

       return redirect ('aluno');

    }
    public function search(Request $request)
{
    if (!empty($request->valor)) {
        $dados = Aluno::where(
            $request->tipo,
            'like',
            "%$request->valor%"
        )->get();
    }else{
        $dados = Aluno::all();
    }
    return view(
        'aluno.list',
        ['dados' => $dados]
        );
    }
}

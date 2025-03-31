@extends('base') <!-- oq for colocado abaixo vai ir pra base (conteudo vai lá pra base) -->
@section ('titulo', 'Formulário Aluno')
@section('conteudo')

    <h3>Formulário Aluno</h3>

    @php
    if(!empty($dado->id)){
        $action= route('aluno.update',$dado->id);
    }else{

    $action= route('aluno.store');
    }
    @endphp


    <form action="{{$action}}" method="post">
        @csrf  <!-- criptografia pro formulario, vê se o formulario enviado é da propria aplicação ou ta sendo enviado por terceiros -->

            @if(!empty($dado->id))
                 @method('put')
            @endif



        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{old('nome',$dado->nome ??'')}}"><br>

        <label for="">CPF</label><br>
        <input type="text" name="cpf" value="{{old('cpf',$dado->cpf ??'')}}"><br>

        <label for="">Telefone</label><br>
        <input type="text" name="telefone" value="{{old('telefone',$dado->telefone ??'')}}"><br>

        <button type="submit">Salvar</button><br>
        <a href="{{url('aluno')}}">voltar</a>
    </form>


@stop

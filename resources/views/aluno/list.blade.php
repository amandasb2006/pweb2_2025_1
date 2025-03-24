@extends('base')
@section('titulo', 'Listagem Aluno')
@section('conteudo')

    <h3>Listagem de Alunos</h3>


    <a href="{{url('aluno/create')}}">Nomo</a>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Ação</td>
            </tr>
        </thead>
        <body>

        @foreach ($dados as $item)

            <tr>
                <td><?php echo $item ->id; ?></td>
                <td>{{$item->id }}</td>
                <td>{{$item->nome }}</td>
                <td>{{$item->cpf }}</td>
                <td>{{$item->telefone}}</td>
                <td>
                    <form action="{{route('aluno.destroy'), $item->id)}}" method="post"></form>
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                    onclick="return confirm('Deseja remover o registro?')">Remover</button>
                </td>
            </tr>
            @endforeach
        </body>
    </table>

@stop <!-- fecha conteudo -->

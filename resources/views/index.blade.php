@extends('default')

@section('title')
    Todos os Contatos
@endsection

@section('body')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Todos os contatos</h1>
            <a href="/adicionar-contato" class="btn btn-primary">Adicionar Contato</a>
        </div>

        @foreach ($contacts as $item)
            <div class="card my-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item">Nome: {{ $item->name }}</li>
                                <li class="list-group-item">Sobrenome: {{ $item->last_name }}</li>
                                <li class="list-group-item">Telefone: {{ $item->phone }}</li>
                                <li class="list-group-item">Descrição: {{ $item->description }}</li>
                                <li class="list-group-item">Favorito: {{ $item->favorite != 0 ? 'Sim' : 'Não' }}</li>
                            </ul>
                        </div>
                        <div>
                            <form action="" method="post">
                                <button class="btn btn-danger" name="delete" value="{{ $item->id }}">Deletar Usuário</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('default')

@section('title')
    Todos os Contatos
@endsection

@section('body')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Todos os contatos</h1>
            <a href="{{route('form-create')}}" class="btn btn-primary">Adicionar Contato</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('destroy'))
            <div class="alert alert-danger">
                {{ session('destroy') }}
            </div>
        @endif

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
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $item->id }}">
                                Editar Contato
                            </button>
                            <form action="/{{$item->id}}" method="post" onsubmit="return confirm('Deseja remover este contato?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" name="delete">Deletar Usuário</button>
                            </form>

                            <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Nome</label>
                                                    <input class="form-control" type="text" name="name" placeholder="{{$item->name}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Sobrenome</label>
                                                    <input class="form-control" type="text" name="subname" placeholder="{{$item->last_name}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Telefone</label>
                                                    <input class="form-control" type="text" name="phone1" placeholder="{{$item->phone}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Descrição</label>
                                                    <textarea class="form-control" name="description" cols="30"
                                                        rows="10"></textarea>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" name="favorite" type="checkbox" {{ $item->favorite != 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Favorito
                                                    </label>
                                                </div>
                                                <button class="btn btn-success" type="submit">Adicionar Contato</button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

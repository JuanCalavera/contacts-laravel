@extends('default')

@section('title')
    {{ $contact->name }} {{ $contact->last_name }}
@endsection

@section('body')
    <div class="container my-3">
        <div class="text-center">
            <i class="fas fa-user-circle fa-5x"></i>
            <h1>{{ $contact->name }} {{ $contact->last_name }}</h1>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <ul class="h4"> <i class="fa fa-envelope text-info" aria-hidden="true"></i>
                    <small>Email:</small><br>
                    {{ $contact->email }}
                </ul>
                <ul class="h4"> <i class="fa fa-phone text-info" aria-hidden="true"></i>
                    <small>Telefone:</small><br>
                    {{ $contact->phone }}
                </ul>
                <ul class="h4"> <i class="fas fa-comment text-info"></i> <small>Descrição:</small><br>
                    {{ $contact->description }}</ul>
                <ul class="h4"><i class="fas fa-star text-warning"></i> <small>Favorito:</small><br>
                    {{ $contact->favorite != 0 ? 'Sim' : 'Não' }}</ul>
            </div>
            <div>
                <form action="/{{ $contact->id }}" method="post"
                    onsubmit="return confirm('Deseja mesmo excluir este contato')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg btn-danger text-white mb-3"> <i class="fa fa-trash"
                            aria-hidden="true"></i> Deletar</button>
                </form>
                <a href="{{ route('home') }}" class="btn btn-lg btn-info text-white mb-3"> <i class="fa fa-undo"
                        aria-hidden="true"></i> Voltar</a>
            </div>
        </div>
    </div>
@endsection

@extends('default')

@php
$emails = explode(';', $contact->email);
$phones = explode(';', $contact->phone);
@endphp

@section('title')
    {{ $contact->name }} {{ $contact->last_name }}
@endsection

@section('body')
    <div class="container my-3">
        <div class="text-center">
            @if (!empty($contact->img_profile))
                <img src="{{ url('/storage/app/uploads' . $contact->img_profile) }}" alt="profile">
            @else
                <i class="fas fa-user-circle fa-5x"></i>
            @endif
            <h1>{{ $contact->name }} {{ $contact->last_name }}</h1>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="my-3">
                    <h2 class="h3 mb-3"><i class="fa fa-envelope text-info" aria-hidden="true"></i> Email(s):</h2>
                    <ul class="h4 list-group">
                        @foreach ($emails as $email)
                            <li class="list-group-item list-group-item-dark">{{ $email }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="my-3">
                    <h2 class="h3 mb-3"><i class="fa fa-phone text-info" aria-hidden="true"></i> Telefone(s):</h2>
                    <ul class="h4 list-group">
                        @foreach ($phones as $phone)
                            <li class="list-group-item list-group-item-dark">{{ $phone }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card text-white bg-secondary my-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fa fa-comment" aria-hidden="true"></i> Descrição:</div>
                    <div class="card-body">
                      <p class="card-text">{{$contact->description ? $contact->description : "Não possui descrição"}}</p>
                    </div>
                  </div>
                <h2 class="h4"><i class="fas fa-star text-warning"></i> Favorito:
                    {{ $contact->favorite != 0 ? 'Sim' : 'Não' }}</h2>
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

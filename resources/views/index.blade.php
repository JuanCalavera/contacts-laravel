@extends('default')

@section('title')
    Todos os Contatos
@endsection

@section('body')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1> <i class="fa fa-users" aria-hidden="true"></i> Todos os contatos</h1>
            <a href="{{ route('form-create') }}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i>
                Adicionar Contato</a>
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

        @if (!empty($contacts))
            @foreach ($contacts as $item)
                <div class="card bg-secondary my-2 text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="/contato/{{ $item->slug }}" class="text-white" style="text-decoration: none">
                                    <h2 class="h4"> <i class="fa fa-user text-info" aria-hidden="true"></i>
                                        {{ $item->name }}</h2>
                                    <ul>Sobrenome: {{ $item->last_name }}</ul>
                                    <ul>
                                        @php
                                            $emails = explode(';', $item->email);
                                            $phones = explode(';', $item->phone);
                                        @endphp
                                        <p class="h5"><i class="fa fa-envelope text-info"
                                                aria-hidden="true"></i> {{ count($emails) <= 1 ? 'Email:' : 'Emails:' }}
                                        </p>
                                        @foreach ($emails as $email)
                                            <li>{{ $email }}</li>
                                        @endforeach
                                    </ul>

                                    <ul>
                                        <p class="h5"><i class="fa fa-phone text-info" aria-hidden="true"></i>
                                            {{ $phones <= 1 ? 'Telefone:' : 'Telefones' }}</p>
                                        @foreach ($phones as $phone)
                                            <li>{{ $phone }}</li>
                                        @endforeach
                                    </ul>
                                    <ul> <i class="fa fa-comment text-info" aria-hidden="true"></i> Descrição:
                                        {{ substr($item->description, 0, 40) }}</ul>
                                    <ul> <i class="fa fa-star text-warning" aria-hidden="true"></i> Favorito:
                                        {{ $item->favorite != 0 ? 'Sim' : 'Não' }}</ul>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary text-white mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $item->id }}"> <i class="fas fa-edit    "></i>
                                    Editar Contato
                                </button>
                                <form action="/{{ $item->id }}" method="post"
                                    onsubmit="return confirm('Deseja remover este contato?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" name="delete"> <i class="fa fa-trash"
                                            aria-hidden="true"></i> Deletar Usuário</button>
                                </form>

                                <div class="modal fade text-black" id="modal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Contato</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label class="form-label">Nome</label>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="{{ $item->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Sobrenome</label>
                                                        <input class="form-control" type="text" name="subname"
                                                            placeholder="{{ $item->last_name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <div class="" id="emails">
                                                            @foreach (explode(';', $item->email) as $email)

                                                                <input class="form-control my-2" type="email" name="email"
                                                                    placeholder="{{ $email }}">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <div class="btn btn-outline-success mx-2"><i class="fa fa-plus"
                                                                aria-hidden="true"></i> Adicionar Campo</div>
                                                        <div class="btn btn-outline-danger"><i class="fa fa-minus"
                                                                aria-hidden="true"></i> Remover Campo</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Telefone</label>
                                                        <div id="phones">
                                                            @foreach (explode(';', $item->phone) as $phone)

                                                                <input class="form-control my-2" type="text" name="phone"
                                                                    placeholder="{{ $phone }}">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <div class="btn btn-outline-success mx-2"><i class="fa fa-plus"
                                                                aria-hidden="true"></i> Adicionar Campo</div>
                                                        <div class="btn btn-outline-danger"><i class="fa fa-minus"
                                                                aria-hidden="true"></i> Remover Campo</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Descrição</label>
                                                        <textarea class="form-control" name="description" cols="30"
                                                            rows="10"></textarea>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="favorite" type="checkbox"
                                                            {{ $item->favorite != 0 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Favorito
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Editar Contato</button>
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
        @else
            <h2>Nenhum contato</h2>
        @endif
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection

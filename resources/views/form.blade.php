@extends('default')

@section('title')
    Formulário adicionar Contato
@endsection

@section('body')
    <div class="container my-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Adicionar Contato</h1>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Sobrenome</label>
                <input class="form-control" type="text" name="subname">
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input class="form-control" type="text" name="phone1">
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" name="favorite" type="checkbox">
                <label class="form-check-label" for="flexCheckChecked">
                    Favorito
                </label>
            </div>
            <button class="btn btn-success" type="submit">Adicionar Contato</button>
        </form>
    </div>
@endsection

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
        <form action="" method="post" enctype="multipart/form-data" id="create-form">
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
                <label class="form-label">Email(s)</label>
                <div id="adds-emails">
                    <input class="form-control" type="email" name="email[]" placeholder="1º Email">
                </div>
                <div class="d-flex">
                    <div onclick="addEmail()" class="btn btn-outline-success my-3 text-white mx-3"><i class="fa fa-plus"
                            aria-hidden="true"></i>
                        Adicionar campo</div>
                    <div onclick="removeEmail()" class="btn btn-outline-danger my-3 text-white"><i class="fa fa-minus"
                            aria-hidden="true"></i>
                        Remover campo</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tefone(s)</label>
                <div id="adds-phones">
                    <input class="form-control" type="text" name="phone[]" placeholder="1º Telefone">
                </div>
                <div class="d-flex">
                    <div onclick="addPhone()" class="btn btn-outline-success my-3 text-white mx-3"><i class="fa fa-plus"
                            aria-hidden="true"></i>
                        Adicionar campo</div>
                    <div onclick="removePhone()" class="btn btn-outline-danger my-3 text-white"><i class="fa fa-minus"
                            aria-hidden="true"></i>
                        Remover campo</div>
                </div>
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
            <div class="input-group mb-3">
                <div class="custom-file">
                    <label class="h4" for="inputGroupFile01">Foto do contato:</label><br>
                    <input type="file" class="custom-file-input" name="img_profile" id="inputGroupFile01" accept="image/*">
                </div>
            </div>
            <button class="btn btn-success" type="submit">Adicionar Contato</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function addEmail() {
            let el = document.createElement('input');
            el.className = 'form-control my-3';
            el.name = 'email[]';
            el.type = 'email';
            
            var list = document.getElementById('adds-emails').childElementCount + 1;
            el.placeholder = list + 'º Email';

            let div = document.getElementById('adds-emails');
            div.appendChild(el);
        }

        function removeEmail() {
            var list = document.getElementById('adds-emails');
            if (list != null && list.childElementCount != 1) {
                list.removeChild(list.lastChild);
            }
        }

        function addPhone() {
            let el = document.createElement('input');
            el.className = 'form-control my-3';
            el.name = 'phone[]';
            el.type = 'text';
            
            var list = document.getElementById('adds-phones').childElementCount + 1;
            el.placeholder = list + 'º Telefone';
            
            let div = document.getElementById('adds-phones');
            div.appendChild(el);
        }

        function removePhone() {
            var list = document.getElementById('adds-phones');
            if (list != null && list.childElementCount != 1) {
                list.removeChild(list.lastChild);
            }
        }
    </script>
@endsection

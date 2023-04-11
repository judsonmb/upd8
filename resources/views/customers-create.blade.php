@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><img src='/upd8.jpeg' width="110" height="100"/></div>

        <div class="card-body">
          <div class="card">
            Cadastro Cliente

            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col">
                    CPF: <input type="text" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                    Nome: <input type="text" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                    Data Nascimento: <input type="text" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                    Sexo: <input type="text" class="form-control" placeholder="First name">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    Endereço: <input type="text" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                    Estado: <input type="text" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                    Cidade: <input type="text" class="form-control" placeholder="First name">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

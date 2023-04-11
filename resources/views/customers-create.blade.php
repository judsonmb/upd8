@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><img src='/upd8.jpeg' width="110" height="100"/></div>

        <div class="card-body">
          <a href='/'><button type="button" class="btn btn-success">Consultar</button></a>
          <div class="card">
            Cadastro Cliente

            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col">
                    CPF: <input type="text" id="cpf" class="form-control"  required>
                  </div>
                  <div class="col">
                    Nome: <input type="text" id="name" class="form-control" required>
                  </div>
                  <div class="col">
                    Data Nascimento: <input type="date" id="birth" class="form-control" required>
                  </div>
                  <div class="col">
                    Sexo: 
                    <select name="gender" class="form-select" id="gender" required>
                      <option value="" selected>Selecione</option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    Endereço: <input type="text" id="address" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    Estado: 
                    <select id="states" class="form-select" onChange="populateCitiesSelect();">
                      <option value="" selected>Selecione</option>
                      
                    </select>
                  </div>
                  <div class="col">
                    Cidade: 
                    <select id="cities" class="form-select">
                      <option value="" selected>Selecione um estado primeiro</option>
                      
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button type="button" onClick="callStoreMethod();" class="btn btn-primary">Salvar</button>
                    <button type="button" onClick="emptyFields();" class="btn btn-secondary">Limpar</button>
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
<script>
  function callStoreMethod() 
  {
    body = {
      cpf : $('#cpf').val(),
      name : $('#name').val(),
      birth : $('#birth').val(),
      gender : $('#gender').find(":selected").val(),
      address : $('#address').val(),
      state_id : $('#states').find(":selected").val(),
      city_id : $('#cities').find(":selected").val()
    }

    $.ajax({
      type: 'POST',
      url : '/api/customers/store',
      data : body,
      dataType: 'json',
      success: function(data) 
      {
        alert('cadastrado com sucesso!');
        window.location.href = '/';
      },
      error: function(data)
      {
        $('#status').removeClass("d-none");
        response = JSON.parse(data.responseText);
        $('#status').html(response.message);
      }
    });
  }
</script>
@endsection

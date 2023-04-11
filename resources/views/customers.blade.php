@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><img src='/upd8.jpeg' width="110" height="100"/></div>

                <div class="card-body">
                    <div class="card">
                        Consulta Cliente

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
                                <button type="button" onClick="callSearchMethod();" class="btn btn-primary">Pesquisar</button>
                                <button type="button" onClick="emptyFields();" class="btn btn-secondary">Limpar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                    <div class="card mt-4">
                        Resultado da pesquisa

                        <div class="card-body">
                            <table class="table" id="customerstable">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Data Nasc.</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Sexo</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                              </table>
                              <nav>
                                <ul class="pagination" id="pagination">
                                  
                                </ul>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  
  function makeTable(data)
  {
    var tableHtml = '';
    for (var i = 0; i < data.data.length; i++) {
        tableHtml += '<tr>'+
                    '<td><button type="button" class="btn btn-success">Editar</button></td>' +
                    '<td><button type="button" class="btn btn-danger">Excluir</button></td>' +
                    '<td>' + data.data[i].name + '</td>' +
                    '<td>' + data.data[i].cpf + '</td>' +
                    '<td>' + data.data[i].birth + '</td>' +
                    '<td>' + data.data[i].address.city.state.name + '</td>' +
                    '<td>' + data.data[i].address.city.name + '</td>' +
                    '<td>' + data.data[i].gender + '</td>' +
                '</tr>';
    }   
    $('#customerstable tbody').html(tableHtml);

    var paginationHtml = '';
    //previous button
    var previousButtonLink = data.links[0].url ? data.links[0].url : '#';
    paginationHtml += '<li class="page-item"><a class="page-link" href="'+previousButtonLink+'">'+
                        '<span class="sr-only"> '+data.links[0].label+'</span>'+
                      '</a></li>' 
    
    //pagination numbers links
    for (var i = 1; i < data.links.length-1; i++) {
      paginationHtml += '<li class="page-item">'+
                        '<a class="page-link" href="'+data.links[i].url+'">'+data.links[i].label+''+
                        '</a></li>';
    }   

    //next button
    var nextButtonLink = data.links[data.links.length-1].url ? data.links[data.links.length-1].url : '#';
    paginationHtml += '<li class="page-item"><a class="page-link" href="'+nextButtonLink+'">'+
                        '<span class="sr-only"> '+data.links[data.links.length-1].label+'</span>'+
                      '</a></li>';

    
    $('#pagination').html(paginationHtml);
  }

  function callSearchMethod() 
  {
    $('#customerstable tbody').html('');
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

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
        url : '/api/customers',
        data : body,
        dataType: 'json',
          success:function(data) 
          {
            makeTable(data);
          }
    });
  }


  $(document).ready(function(){   
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        type: 'POST',
        url : '/api/customers',
        data : {},
        dataType: 'json',
          success:function(data) 
          {
            makeTable(data);
          }
    });
  });
</script>
@endsection

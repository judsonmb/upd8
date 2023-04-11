@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><img src='/upd8.jpeg' width="110" height="100"/></div>

                <div class="card-body">
                    <a href='/customers/create'><button type="button" class="btn btn-success">Cadastrar</button></a>
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
                                <button type="button" onClick="emptyFields();callSearchMethod();" class="btn btn-secondary">Limpar</button>
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
        date = new Date(data.data[i].birth);
        birth = (date.getDate()+1) + "/" +  (date.getMonth()+1) + "/" + date.getFullYear();

        tableHtml += '<tr>'+
                    '<td><button type="button" class="btn btn-success">Editar</button></td>' +
                    '<td><a href="#"><button type="button" class="btn btn-danger" onClick="destroy('+data.data[i].id+');">Excluir</button></td>' +
                    '<td>' + data.data[i].name + '</td>' +
                    '<td>' + data.data[i].cpf + '</td>' +
                    '<td>' + birth + '</td>' +
                    '<td>' + data.data[i].address.city.state.name + '</td>' +
                    '<td>' + data.data[i].address.city.name + '</td>' +
                    '<td>' + data.data[i].gender + '</td>' +
                '</tr>';
    }   
    $('#customerstable tbody').html(tableHtml);

    var paginationHtml = '';
    
    //previous button
    if (data.links[0].url !== null) {
      paginationHtml += '<li class="page-item"><a class="page-link" href="#" onClick="callSearchMethod(\'' + data.links[0].url + '\');">'+
                          '<span class="sr-only"> '+data.links[0].label+'</span>'+
                        '</a></li>' 
    }
    
    //pagination numbers links
    for (var i = 1; i < data.links.length-1; i++) {
      disabled = data.links[i].active ? 'disabled' : '';
      paginationHtml += '<li class="page-item">'+
                        '<a class="page-link '+disabled+'" href="#" onClick="callSearchMethod(\'' + data.links[i].url + '\');">'+data.links[i].label+''+
                        '</a></li>';
    }   

    //next button
    if (data.links[data.links.length-1].url !== null) {
      paginationHtml += '<li class="page-item"><a class="page-link" href="#" onClick="callSearchMethod(\'' + data.links[data.links.length-1].url + '\');">'+
                        '<span class="sr-only"> '+data.links[data.links.length-1].label+'</span>'+
                      '</a></li>';
    }
    
    $('#pagination').html(paginationHtml);
  }

  function destroy(id) 
  {
    var result = confirm("Tem certeza que quer deletar?");
    if (result) {
      $.ajax({
        type: 'DELETE',
        url : '/api/customers/'+id,
        data : {},
        dataType: 'json',
          success:function(data) 
          {
            callSearchMethod();
          }
      });
    }
  }

  function callSearchMethod(url = '/api/customers') 
  {
    $('#customerstable tbody').html('');
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    if ($('#cpf').val() === '' && 
          $('#name').val() === '' &&
          $('#birth').val() === '' &&
          $('#gender').val() === '' &&
          $('#states').val() === '' &&
          $('#cities').val() === '') {
      body = {}
    } else {
        body = {
          cpf : $('#cpf').val(),
          name : $('#name').val(),
          birth : $('#birth').val(),
          gender : $('#gender').find(":selected").val(),
          state_id : $('#states').find(":selected").val(),
          city_id : $('#cities').find(":selected").val()
      }
    }

    $.ajax({
        type: 'POST',
        url : url,
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

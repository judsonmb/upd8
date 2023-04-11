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
                                      Estado: <input type="text" class="form-control" placeholder="First name">
                                    </div>
                                    <div class="col">
                                      Cidade: <input type="text" class="form-control" placeholder="First name">
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
          console.log(data.data);
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
  });
});
</script>
@endsection

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
                            <table class="table">
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
                                  <tr>
                                    <td><button type="button" class="btn btn-success">Editar</button></td>
                                    <td><button type="button" class="btn btn-danger">Excluir</button></td>
                                    <td>Wesley Barbosa</td>
                                    <td>062.200.904-46</td>
                                    <td>16/09/1990</td>
                                    <td>AL</td>
                                    <td>Maceió</td>
                                    <td>M</td>
                                  </tr>
                                  <tr>
                                    <td><button type="button" class="btn btn-success">Editar</button></td>
                                    <td><button type="button" class="btn btn-danger">Excluir</button></td>
                                    <td>Wesley Barbosa</td>
                                    <td>062.200.904-46</td>
                                    <td>16/09/1990</td>
                                    <td>AL</td>
                                    <td>Maceió</td>
                                    <td>M</td>
                                  </tr>
                                  <tr>
                                    <td><button type="button" class="btn btn-success">Editar</button></td>
                                    <td><button type="button" class="btn btn-danger">Excluir</button></td>
                                    <td>Wesley Barbosa</td>
                                    <td>062.200.904-46</td>
                                    <td>16/09/1990</td>
                                    <td>AL</td>
                                    <td>Maceió</td>
                                    <td>M</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

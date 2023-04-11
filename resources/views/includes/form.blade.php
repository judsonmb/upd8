    <div class="row">
      <div class="col">
        CPF: <input type="text" id="cpf" class="form-control" value="{{ $customer->cpf ?? "" }}" required>
      </div>
      <div class="col">
        Nome: <input type="text" id="name" class="form-control" value="{{ $customer->name ?? "" }}" required>
      </div>
      <div class="col">
        Data Nascimento: <input type="date" id="birth" class="form-control" value="{{ $customer->birth ?? "" }}" required>
      </div>
      <div class="col">
        Sexo: 
        <select name="gender" class="form-select" id="gender" required>
          <option value="" selected>Selecione</option>
          <option value="M" {{ (isset($customer) && $customer->gender == 'M' ? "selected" : "") }}>Masculino</option>
          <option value="F" {{ (isset($customer) && $customer->gender == 'F' ? "selected" : "") }}>Feminino</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        Endereço: <input type="text" id="address" class="form-control" value="{{ $customer->address->address ?? "" }}">
      </div>
    </div>
    <div class="row">
      <div class="col">
        Estado: 
        <select id="states" class="form-select" onChange="populateCitiesSelect();">
          <option value="{{ $customer->address->city->state_id ?? "" }}" selected>{{ $customer->address->city->state->name ?? "Selecione" }}</option>
          
        </select>
      </div>
      <div class="col">
        Cidade: 
        <select id="cities" class="form-select">
          <option value="{{ $customer->address->city->id ?? "" }}" selected>{{ $customer->address->city->name ?? "Selecione um estado primeiro" }}</option>
          
        </select>
      </div>
    </div>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
</head>
<body>
    <div id="app">
        <div class="container">

            <main class="py-4">
                <div class="alert alert-danger d-none" id="status" role="alert">
                    
                </div>
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script>
    function populateCitiesSelect()
    {
        var stateId = $('#states').find(":selected").val();
        console.log(stateId);
        $.ajax({
            type: 'GET',
            url : "/api/state/"+stateId+"/cities",
            dataType: 'json',
            success:function(data) 
            {
                var citiesOptionsHtml = '';
                for (var i = 0; i < data.data.length; i++) {
                    citiesOptionsHtml += '<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>';
                }   
                $('#cities').html('');
                $('#cities').append(citiesOptionsHtml);
            }
        });
    }

    function emptyFields()
    {
        $('#cpf').val('');
        $('#name').val('');
        $('#birth').val('');
        $('#gender').val('');
        $('#address').val('');
        $('#states').find(":selected").removeAttr("selected");
        $('#cities').html('<option selected>Selecione um estado primeiro</option>');
    }
    
    $(document).ready(function() {
    var $cpfField = $("#cpf");
    $cpfField.mask('000.000.000-00', {reverse: true});

    $.ajax({
        type: 'GET',
        url : '/api/states',
        dataType: 'json',
        success:function(data) 
        {
            var statesOptionsHtml = '';
            for (var i = 0; i < data.data.length; i++) {
                statesOptionsHtml += '<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>';
            }   
            
            $('#states').append(statesOptionsHtml);
        }
    });
    });
</script>
</html>

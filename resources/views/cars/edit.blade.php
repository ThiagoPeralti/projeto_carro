@extends('layouts.main')

@section('title', 'Editando Carro: ' .  $car->modelo )

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando carro: {{ $car->modelo }}</h1>
    <form action="/cars/update/{{ $car->id }}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Carro: </label>
            <input type="file" id="image" name="image" nameclass="form-control-file">
            <img src="/img/car/{{ $car->image }}" alt="{{ $car->modelo }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Qual a marca do carro? </label>
            <select name="marca" id="marca" class="form-control">
                <option value="null">Clique aqui para selecionar a marca</option>
                <option value="Volkswagen" {{ $car->marca == "Volkswagen" ? "selected='selected'" : "" }}>Volkswagen</option>
                <option value="Chevrolet"{{ $car->marca == "Chevrolet" ? "selected='selected'" : "" }}>Chevrolet</option>
                <option value="Fiat"{{ $car->marca == "Fiat" ? "selected='selected'" : "" }}>Fiat</option>
                <option value="Toyota"{{ $car->marca == "Toyota" ? "selected='selected'" : "" }}>Toyota</option>
                <option value="Honda"{{ $car->marca == "Honda" ? "selected='selected'" : "" }}>Honda</option>
                <option value="Hyundai"{{ $car->marca == "Hyundai" ? "selected='selected'" : "" }}>Hyundai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Modelo do carro: </label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex.: Gol G4 1.6 Power" value="{{ $car->modelo }}">
        </div>
        <div class="form-group">
            <label for="title">Ano: </label>
            <input type="number" class="form-control" id="ano" name="ano" placeholder="Ex.: 2005" value="{{ $car->ano }}">
        </div>
        <div class="form-group">
            <label for="title">Valor de venda: </label>
            <input type="number" class="form-control" id="valor" name="valor" placeholder="Ex.: 2400.00 (Necessita do ponto)" value="{{ $car->valor }}">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar carro">
    </form>
</div>

@endsection
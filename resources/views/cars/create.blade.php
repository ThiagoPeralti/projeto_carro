@extends('layouts.main')

@section('title', 'Criar Carro')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Adicione um carro</h1>
    <form action="/cars" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Carro: </label>
            <input type="file" id="image" name="image" nameclass="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Qual a marca do carro? </label>
            <select name="marca" id="marca" class="form-control">
                <option value="null">Clique aqui para selecionar a marca</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Fiat">Fiat</option>
                <option value="Toyota">Toyota</option>
                <option value="Honda">Honda</option>
                <option value="Hyundai">Hyundai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Modelo do carro: </label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex.: Gol G4 1.6 Power">
        </div>
        <div class="form-group">
            <label for="title">Ano: </label>
            <input type="number" class="form-control" id="ano" name="ano" placeholder="Ex.: 2005">
        </div>
        <div class="form-group">
            <label for="title">Valor de venda: </label>
            <input type="number" class="form-control" id="valor" name="valor" placeholder="Ex.: 2400.00 (Necessita do ponto)">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar carro">
    </form>
</div>

@endsection
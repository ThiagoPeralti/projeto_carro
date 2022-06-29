@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Carros disponíveis</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($cars) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    </table>
    <tbody>
        @foreach($cars as $car)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/cars/{{ $car->id }}">{{ $car->marca }}</a></td>
            </tr>
        @endforeach
    </tbody>
    @else
    <p>Você não possui carros!, <a href="/cars/create">Criar um carro</a></p>
    @endif
</div>


@endsection
@extends('layouts.app')

@section('content')
    <h1>Caminhões</h1>
    <a href="{{ route('trucks.create') }}">Adicionar Caminhão</a>
    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trucks as $truck)
                <tr>
                    <td>{{ $truck->license_plate }}</td>
                    <td>{{ $truck->model }}</td>
                    <td>{{ $truck->status }}</td>
                    <td>
                        <a href="{{ route('trucks.edit', $truck) }}">Editar</a>
                        <form action="{{ route('trucks.destroy', $truck) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
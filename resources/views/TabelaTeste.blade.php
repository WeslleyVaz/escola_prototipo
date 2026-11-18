<div>
<!-- estudar para colocar alunos -->
    @extends('layouts.app')

    @section('title', 'TabelaTeste')

    @section('content')

    <h2 class="text-center">Tabela Alunos</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Responsavel</th>
      <th scope="col">Rm</th>
      <th scope="col">Turma</th>
      <th scope="col">Numero do responsavel</th>
    </tr>
  </thead>
@foreach ($dados as $d)
  <tbody>
    <tr>
        <td>{{ $d['nome'] }}</td>
        <td>{{ $d['nome_responsavel'] }}</td>
        <td>{{ $d['rm'] }}</td>
        <td>{{ $d['turma'] }}</td>
        <td>{{ $d['numero_responsavel'] }}</td>
    </tr>
  </tbody>
@endforeach

</table>

    @endsection




</div>

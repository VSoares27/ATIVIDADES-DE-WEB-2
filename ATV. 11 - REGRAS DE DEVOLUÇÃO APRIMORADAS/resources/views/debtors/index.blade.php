@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuários com Pendências</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Valor da Multa</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse($debtors as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="color: red; font-weight: bold;">
                        R$ {{ number_format($user->debit, 2, ',', '.') }}
                    </td>
                    <td>
                        <form action="{{ route('debtors.pay', $user->id) }}" method="POST" onsubmit="return confirm('Confirmar pagamento da multa?');">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                Quitar Dívida
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhum usuário possui multas pendentes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
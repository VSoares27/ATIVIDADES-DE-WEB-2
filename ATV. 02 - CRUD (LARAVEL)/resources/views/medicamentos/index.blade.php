 <html>
<head></head>
<body>
    
    <h1 >Lista do Produto</h1>        
       
<table border=2>
  <tr>
    <th>ID:</th>
    <th>Nome do Medicamento:</th>
    <th>Valor:</th>
    <th>Quantidade:</th>
    <th>Ações</th>
  </tr>
    @foreach($medicamentos as $medicamento)
    <tr>
        <td> {{ $medicamento->id }}</td>
        <td> {{ $medicamento->name }}</td>
        <td> R$ {{ $medicamento->price }}</td>
        <td> {{ $medicamento->stock }}</td>
        <td>
            
        <!-- Botão de Visualizar -->
        <a href="{{ route('medicamentos.show', $medicamento) }}" >
             Visualizar
        </a>

        <!-- Botão de Editar -->
        <a href="{{ route('medicamentos.edit', $medicamento) }}" >
             Editar
        </a>


        <form action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Tem certeza que deseja excluir esse medicamento?')">
            Excluir
            </button>
        </form>

        </td>
    </tr>
    @endforeach
  
</table>   
</div>
</body>
</html>

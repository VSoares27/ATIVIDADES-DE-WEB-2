<html>
<head></head>
<body>

<h1>Editar Produto</h1>

    <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name" >Nome do Medicamento:</label><br>
            <input type="text" id="name" name="name" value="{{ $medicamento->name }}" required>            
        </div>
        <br>
        <div>
            <label for="lot" >Lote do produto: </label><br>
            <input type="text" id="lot" name="lot" value="{{ $medicamento->lot }}" required>            
        </div>
        <br>
        <div>
            <label for="validity" >Validade: </label><br>
            <input type="date" id="validity" name="validity" value="{{ $medicamento->validity }}" required>            
        </div>
        <br>
        <div>
            <label for="price" >Valor do produto: </label><br>
            <input type="number" step="0.01" id="price" name="price" value="{{ $medicamento->price }}" required>            
        </div>
        <br>
        <div>
            <label for="stock" >Estoque: </label><br>
            <input type="number" id="stock" name="stock" value="{{ $medicamento->stock }}" required>            
        </div>

        <br>

        <button type="submit"> Atualizar </button>
        
    </form>
</div>
 
</body>
</html>
<html>
<head>
</head>
<body>
    <h1>Adicionar Medicamento</h1>
    <form action="{{ route('medicamentos.store') }}" method="POST">
        @csrf
        <div>
            <label for="name" >Nome do Medicamento:</label><br>
            <input type="text" id="name" name="name" required>            
        </div>
        <br>
        <div>
            <label for="lot" >Lote do produto: </label><br>
            <input type="text" id="lot" name="lot" required>            
        </div>
        <br>
        <div>
            <label for="validity" >Validade: </label><br>
            <input type="date" id="validity" name="validity" required>            
        </div>
        <br>
        <div>
            <label for="price" >Valor do produto: </label><br>
            <input type="number" step="0.01" id="price" name="price" required>            
        </div>
        <br>
        <div>
            <label for="stock" >Estoque: </label><br>
            <input type="number" id="stock" name="stock" required>            
        </div>
        <br>
        <button type="submit" class="btn btn-success">
            <i></i> Salvar
        </button>
        
    </form>
</body>
</html>


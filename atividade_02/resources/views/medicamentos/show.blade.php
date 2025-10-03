<html>
<head></head>
<body>
    <h1>Detalhes do Produto</h1>        
        <div >
            <p><strong>ID:</strong> {{ $medicamento->id }}</p>
            <p><strong>Nome do Medicamento:</strong> {{ $medicamento->name }}</p>
            <p><strong>Lote:</strong> {{ $medicamento->lot }}</p>
            <p><strong>Preço:</strong> R$ {{ $medicamento->price }}</p>
            <p><strong>Data de Validade:</strong> {{ $medicamento->validity }}</p>
            <p><strong>Estoque:</strong> {{ $medicamento->stock }}</p>
            </div>
    </div>    
</div>
</body>
</html>
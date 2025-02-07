<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h2>Cadastrar Cliente</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required> <br>

        <label>Telefone:</label>
        <input type="text" name="telefone" required> <br>

        <label>CPF:</label>
        <input type="text" name="cpf" required> <br>

        <label>Email:</label>
        <input type="email" name="email" required> <br>

        <label>CEP:</label>
        <input type="text" name="cep" required> <br>

        <label>Rua:</label>
        <input type="text" name="rua" required> <br>

        <label>Bairro:</label>
        <input type="text" name="bairro" required> <br>

        <label>Cidade:</label>
        <input type="text" name="cidade" required> <br>

        <label>Estado:</label>
        <input type="text" name="estado" required> <br>

        <label>Número:</label>
        <input type="text" name="numero" required> <br>

        <label>Complemento:</label>
        <input type="text" name="complemento"> <br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="{{ route('cliente.index') }}">Voltar</a>
</body>
</html>

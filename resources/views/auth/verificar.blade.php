<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verificar Código</title>
</head>
<body>
    <h2>Digite o código de verificação enviado para seu e-mail:</h2>
    <form method="POST" action="{{ route('verificar.codigo') }}">
        @csrf
        <input type="text" name="code" placeholder="Código de 6 dígitos" required>
        <button type="submit">Verificar</button>
    </form>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>

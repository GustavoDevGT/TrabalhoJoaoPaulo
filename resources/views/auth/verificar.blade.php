<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verificar Código</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h4 class="mb-4 text-center">Verificação de Código</h4>
        <p class="text-muted text-center">Digite o código de verificação enviado para seu e-mail:</p>
        <form method="POST" action="{{ route('verificar.codigo') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="code" class="form-control" placeholder="Código de 6 dígitos" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Verificar</button>
            </div>
        </form>

        @if(session('error'))
            <div class="alert alert-danger mt-3 text-center">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


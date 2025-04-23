<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Aqui você pode usar o Tailwind ou Bootstrap se quiser um layout mais bonito -->
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    
    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
        <h1 style="font-size: 32px; color: #4CAF50;">Oi, você está verificado!</h1>
        <p style="font-size: 18px; color: #333;">Parabéns, você completou a verificação do seu e-mail e agora tem acesso total ao sistema!</p>
        <a href="{{ route('produtos.index') }}">Produtos</a>
    </div>
</body>
</html>

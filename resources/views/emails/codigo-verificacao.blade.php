<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Código de Verificação</title>
</head>
<body style="background-color: #f4f4f4; font-family: Arial, sans-serif; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 40px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h1 style="color: #333;">Verificação de Conta</h1>
        <p style="font-size: 18px; color: #555;">Use o código abaixo para verificar sua conta:</p>
        <div style="font-size: 32px; font-weight: bold; color: #2d89ef; margin: 20px 0;">
            {{ $codigo }}
        </div>
        <p style="color: #777;">Esse código expira em alguns minutos. Não compartilhe com ninguém.</p>
        <hr style="margin: 40px 0;">
        <p style="font-size: 12px; color: #aaa;">Se você não solicitou esse código, apenas ignore este e-mail.</p>
    </div>
</body>
</html>


# 🛠️ Trabalho João Paulo - Laravel

Este projeto é uma aplicação Laravel desenvolvida como parte do Trabalho do João Paulo. Para que funcione corretamente, siga os passos abaixo usando o **Laragon**.

---

## ⚙️ Requisitos

- [Laragon](https://laragon.org/) instalado no seu computador
- PHP 8.x ou superior
- Composer
- Laravel instalado globalmente (`composer global require laravel/installer`)

---

## 🚀 Como rodar o projeto

### 1. Coloque o projeto na pasta correta

Copie ou mova o projeto para a pasta `www` do Laragon:

```
C:\laragon\www\
```

Exemplo:
```
C:\laragon\www\Trabalho
```

---

### 2. Acesse a pasta pelo terminal do Laragon

Abra o terminal do Laragon (botão **Terminal** na interface do Laragon) e digite:

```bash
cd Trabalho
```

---

### 3. Instale as dependências (se necessário)

Se ainda não tiver feito, instale as dependências com o Composer:

```bash
composer install
```

---

### 4. Rode o servidor local

```bash
php artisan serve
```

O Laravel será iniciado em um endereço como:

```
http://127.0.0.1:8000
```

Abra esse endereço no navegador para ver a aplicação funcionando!

---

## 🌟 Funcionalidade Especial

Na página principal de produtos, há um botão na navbar chamado **"Venha Vender Conosco"**.

🔗 Ao clicar nesse botão, você será direcionado para uma verificação em duas etapas (2FA).  
✅ Após a verificação, você terá acesso ao **CRUD completo de produtos**, onde é possível **criar, editar, visualizar e excluir** produtos diretamente pela interface esse produtos ficaram listado na pagina principal.


---

## 📂 Estrutura

```
Trabalho/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
└── ...
```

---

## 👨‍💻 Feito por

Gustavo Dev ✌️  
[github.com/GustavoDevGT](https://github.com/GustavoDevGT)

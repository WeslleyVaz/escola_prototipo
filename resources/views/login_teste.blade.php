<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    @vite(['resources/js/login.js'])
</head>
<body class="bg-light">
    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <section class="card shadow-sm w-100" style="max-width: 440px;">
            <div class="card-body p-4 p-md-5">
                <h1 class="h2 text-center mb-4">Login</h1>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" inputmode="numeric" autocomplete="username" required>
                </div>

                <div class="mb-4">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" autocomplete="current-password" required>
                </div>

                <button type="button" class="btn btn-primary w-100" id="btnentrar">Entrar</button>
            </div>
        </section>
    </main>
</body>
</html>

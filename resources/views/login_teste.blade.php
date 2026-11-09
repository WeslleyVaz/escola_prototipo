<div>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <script src="https://jquery.com" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" integrity="sha512-aUhL2xOCrpLEuGD5f6tgHbLYEXRpYZ8G5yD+WlFrXrPy2IrWBlu6bih5C9H6qGsgqnU6mgx6KtU8TreHpASprw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script src="<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" 
    integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>">
    </script>
        @vite(['resources/js/login.js'])
    
    
    </head>
        <body>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6 rouned p-3 shadow-sm border">
                    <h1 class="text-center">Login</h1>
                </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cpf</label>
                <input type="email" class="form-control" id="cpf" aria-describedby="cpfhelp">
                <div id="cpfhelp" class="form-text">fale seu cpf.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">senha</label>
                <input type="password" class="form-control" id="senha">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="button" class="btn btn-subtle theme-accend" id="entrar">entrar</button>
            </div>
            </div>
        
        </body>
    </html>
</div>

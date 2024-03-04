  <?php 
  
  
  ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="public/css/style.css">
        <title>Reset Password</title>
        <style>
        html, body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #4D4855;
        }
    </style>
    </head>
    <body class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="card" style="width: 18rem; opacity: 0.9;">
            <div class="card-body">
                <h3 class="text-center mb-4">Reset Password</h3>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name='password'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Retype New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name='retype_password'>
                    </div>
                    <div style="text-align:center">
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-5gfSN7gjZkBxEyKIzGjvEmnM7qcFmzSjMAeI6D7KkoT+bdH/99UenJ6ZaO2Xwzj6" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cadastro</title>
 
</head>

<body>
    <div class="container">
      
    <div class="form">
        <form method="GET" action="crudaluno.php">
            <div class="form-header">
                <div class="title">
                    <h1>cadastre-se</h1>
                </div>
                <div class="login-button">
                    <button><a href="#"><input type="submit" name="cadastrar" value="cadastrar"></a> </button>
                    
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="">nome aluno</label>
                    <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                </div>

                <div class="input-box">
                    <label for="">idade</label>
                    <input id="ida" type="text" name="idade" placeholder="Digite sua idade" required>
                </div>

               

                <div class="input-box">
                     <label for="">data nascimento</label>
                     <input id="data" type="date" name=" datanascimento" placeholder="Digite sua data de nascimento" required>
                </div>

                <div class="input-box">
                     <label for="">endereco</label>
                     <input type="text" name=" endereco" placeholder="Digite seu endereço" required>
                </div>

            
               
             

            </div>
           
                </div>
            </div>

            <div class="continue-button">
                <button class="button"><a href="index.php">voltar</a></button>
            </div>
        </form>
    </div>
 
</body>

</html>
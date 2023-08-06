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
        <form method="GET" action="cruddisciplina.php">
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
                    <label for="">id disciplina</label>
                    <input id="firstname" type="number" name="iddisciplina" placeholder="Digite o id da disciplina" requerid>
                </div>

                <div class="input-box">
                    <label for="">disciplina</label>
                    <input id="ida" type="text" name="disciplina" placeholder="Disciplina" requerid>
                </div>

                <div class="input-box">
                    <label for="">ch</label>
                    <input id="ident" type="number" name=" ch" placeholder="CH da disciplina" requerid>
                </div>

                <div class="input-box">
                     <label for="">Semestre</label>
                     <input id="data" type="number" name=" Semestre" placeholder="Semestre" requerid>
                </div>

                <div class="input-box">
                     <label for="">id do professor</label>
                     <input type="text" name="idprofessor" placeholder="id do professor" requerid>
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
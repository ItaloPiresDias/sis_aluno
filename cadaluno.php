<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        

    <div class="form">
        <form method="GET" action="crudaluno.php">
            <div class="form-header">
                <div class="title">
                    <h1>cadastro de aluno</h1>
                </div>
                <div class="login-button">
                    <button><a href="#"><input type="submit" name="cadastrar" value="cadastrar"></a> </button>
                    
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="">nome aluno</label>
                    <input id="firstname" type="text" name="nomealuno" placeholder="Digite seu primeiro nome" requerid>
                </div>

                <div class="input-box">
                    <label for="">idade</label>
                    <input id="ida" type="text" name="idade" placeholder="Digite sua idade" requerid>
                </div>

                <div class="input-box">
                    <label for="">id</label>
                    <input id="ident" type="number" name=" id" placeholder="Digite seu id" requerid>
                </div>

                <div class="input-box">
                     <label for="">data nascimento</label>
                     <input id="data" type="date" name=" nascimento" placeholder="Digite sua data de nascimento" requerid>
                </div>

                <div class="input-box">
                     <label for="">endereco</label>
                     <input type="text" name=" ende" placeholder="Digite seu endereço" requerid>
                </div>

                <div class="input-box">
                    <label for="">matricula</label>
                    <input type="number" name=" matri" placeholder="Digite sua matricula" requerid>
                </div>

            </div>
            <div class="gender-inputs">
                <div class="gender-title">
                    <h6>Status</h6>
                </div>
            
                <div class="gender-group">
                    <div class="gender-input">
                        <input id="cas" type="radio" name="casado">
                        <label for="cas">Casado</label>
                    </div>

                    <div class="gender-input">
                        <input id="solt" type="radio" name="solteiro">
                        <label for="solt">Solteiro</label>
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
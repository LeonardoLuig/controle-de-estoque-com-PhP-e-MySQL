<html>

<head>

    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .cabecalho{
            background: #6495ED;
            height: 15%;
            /*border-bottom: 2px solid black;*/
            position: fixed;
            position: relative
        }
        .title{
            padding-top: 2%;
            size: 40px;
        }
        .conteudo{
            margin-top: 2.5%;
        }
       
        .btn-primary,
        .btn-info{
            border-radius: 10px 10px 10px;
            width: 20%;
            height: 10%;            
        }
        .btn-success{
            border-radius: 5px 5px 5px;
            padding: 5px;
        }
        .btn-primary:hover{
            cursor: pointer;
            background: white;
            border:2px solid #6495ED;
            color: #6495ED;
        }
        .btn-info:hover{
            cursor: pointer;
            background: white;
            border:2px solid #ADD8E6;
            color: #ADD8E6;
        }
        .btn-success:hover{
            cursor: pointer;
            background: white;
            border:2px solid #90EE90;
            color: #90EE90;
        }
        .btn-primary:focus{
            outline: none;
        }
        .link{
            text-decoration: none;
            margin-top: 10px;
        }
        .lk{
            float: left;
        }
        .botao-3{
            margin-top: 5%;
            text-align: center;
        }
        .home{
            color: white;
            float: left;
        }
        .home:hover{
            text-decoration: none;
            color: black;
        }
        
        
        
    </style>
</head>

<body>

    <header class="cabecalho w-100">
        <div class="title container text-center text-uppercase font-weight-bold">
        <a class="home" href="index.php">home</a>  Comprar -
        </div>
    </header>
    <div class="conteudo container clearfix">
        
    <div>
            <form action="comprarEstoque.php" method="POST">
                
                <label for="produtos">Produtos</label>
                <select class="form-control" id="produtos" name="produtos">

                <?php
                        require 'conctionBD.php';
                            $conexao = mysqli_connect('localhost', 'root', '', 'controle_estoque');
                            $sql = mysqli_query($conexao, "SELECT produto FROM tb_produtos") or die('Nenhum produto encontrado');
                            foreach($sql  as $produtos){
                                echo '<option>'. $produtos['produto'] . '</option>';
                            }
                    ?>

                </select><br><br>
                <div>
                <label for="comprar">Comprar</label>
                <input type="text" class="form-control" id="comprar" name="comprar" placeholder="Digite a quantidade a ser comprada"><br><br>
                </div>
                <?php
                    if(isset($_GET['compra']) AND $_GET['compra'] == 'yes'){
                ?>
                    <div class="text-success">
                        Compra efetivada com sucesso!        
                    </div>
                <?php
                    }                    
                ?>
                <?php
                    if(isset($_GET['compra']) AND $_GET['compra'] == 'no'){
                ?>
                    <div class="text-danger">
                        Verifique se a valor inserido é um número ou quantidade pedida acima da armazenada em estoque --- Compra não realizada!        
                    </div>
                <?php
                    }                    
                ?>
                <div>
                <button type="submit" class="btn1 btn-success">Comprar</button>
            </form>
        </div>



        <div class="botao-1">
            <a class=" lk1 link text-light" href="adicionar.php">
                <button class="container btn2 btn-primary float-left">
                    Adicionar +
                </button>
            </a>
        </div>

        <div class="botao-2">
        <a class="link text-light" href="valorArrecadado.php">
            <button class="container btn-info float-right">
                    Valor total arrecadado R$
            </button>
        </a>
        </div>

    </div>

</body>

</html>
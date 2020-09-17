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
       
        .btn-info,
        .btn-success{
            border-radius: 10px 10px 10px;
            width: 20%;
            height: 10%;            
        }
        .btn-primary{
            border-radius: 5px 5px 5px;
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
        .btn-primary:hover{
            cursor: pointer;
            background: white;
            border:1px solid #6495ED;
            color: #6495ED;
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

    <header class="cabecalho w-100 clearfix">
        <div class="title container text-center text-uppercase font-weight-bold">
          <a class="home" href="index.php">home</a>  Adicionar +
        </div>
    </header>
    <div class="conteudo container clearfix">
        
        <div>
            <form action="adicionarEstoque.php" method="POST">
                <h4>Adicionar quantidade ou alterar valor de produto</h4><br><hr>
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
                    <label for="add">Adicionar</label>
                    <input type="text" class="form-control" id="add" name="adicionar" placeholder="Digite a quantidade a ser adicionada no estoque"><br><br>
                </div>
                <div>
                    <label for="alterValor">Alterar Preço do Produto</label>
                    <input type="text" class="form-control" id="alterValor" name="updateValue" placeholder="Digite um novo valor para o produto"><br><br>
                </div>
                <?php
                    if(isset($_GET['add']) AND $_GET['add'] == 'yes'){
                ?>
                    <div class="text-success">
                        Valor/Valores alterado com sucesso!        
                    </div>
                <?php
                    }                    
                ?>
                <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
            <a href="adicionarNew.php"><button class="btn btn-primary">Adicionar novo produto</button></a><br><br>
        </div>
        



        <div class="botao-1">
            <a class="link text-light" href="comprar.php">
                <button class="container btn-success float-right">
                    Comprar -
                </button>
            </a>
        </div>

        <div class="botao-2">
            <a class="link text-light" href="valorArrecadado.php">
                <button class="container btn-info float-left">
                        Valor total arrecadado R$
                </button>
             </a>
        </div>

    </div>

</body>

</html>
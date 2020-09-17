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
        .btn-success{
            border-radius: 10px 10px 10px;
            width: 20%;
            height: 10%;            
        }
        .btn-primary:hover{
            cursor: pointer;
            background: white;
            border:2px solid #6495ED;
            color: #6495ED;
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
        <a class="home" href="index.php">home</a> Valor total arrecadado R$
        </div>
    </header>
    <div class="conteudo container clearfix">

    <div>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID Venda</th>
                    <th>Produto</th>
                    <th>Quantidade Comprada</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    require 'conctionBD.php';
                    $conect = mysqli_connect('localhost', 'root', '', 'controle_estoque');
                    $select = mysqli_query($conect, "SELECT * FROM tb_vendas AS v LEFT JOIN tb_produtos AS p ON v.id_produto = p.id_produto") or die('Nenhuma compra foi efetuada ainda!');
                    print_r($select);
                    foreach($select as $indices){
                        echo '<tr>';
                        echo '<td>' . $indices['id_venda'] . '</td>';
                        echo '<td>"' . $indices['produto'] . '"</td>';
                        echo '<td>' . $indices['valor_total'] / $indices['valor'] . '</td>';
                        echo '<td>R$' . $indices['valor_total'] . '</td>';
                        echo '</tr>';                    
                    }
                ?>
             </tbody>
        </table><br><br><br>
    </div>
        
    <div class="botao-1">
        <a class="link text-light" href="comprar.php">
            <button class="container btn-success float-right">
                    Comprar -
            </button>
        </a>
        </div>

        <div class="botao-2">
        <a class=" lk1 link text-light" href="adicionar.php">
            <button class="container btn-primary float-left">
                    Adicionar +
            </button>
        </a>
        </div>

    </div>

</body>

</html>
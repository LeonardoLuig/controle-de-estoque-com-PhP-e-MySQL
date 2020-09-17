<?php
    require 'conctionBD.php';

    class comprarEstoque{
        public $produto;
        public $comprarQuantidade;

        public function __setValueAttr($attr, $value){
            $this->$attr = $value;
        }
        public function addValorOrQtd(){
            $conect = mysqli_connect('localhost', 'root', '');
            $db = mysqli_select_db($conect, 'controle_estoque');
            //$query = 'UPDATE tb_produtos SET quantidade =' . $this->adicionarQuantidade . 'WHERE produto =' . $_POST['produtos'];
            $query = 'SELECT quantidade FROM tb_produtos WHERE produto = "' . $this->produto . '"';
            $validate = mysqli_query($conect, $query);
            $teste = mysqli_fetch_assoc($validate);
            if($this->comprarQuantidade != ''){
                if(is_numeric($this->comprarQuantidade) AND $this->comprarQuantidade <= $teste['quantidade']){
                    $update = 'UPDATE tb_produtos SET quantidade = quantidade - ' . $this->comprarQuantidade. ' WHERE produto = "'. $this->produto . '"';
                    $sql = mysqli_query($conect, 'SELECT id_produto, valor FROM tb_produtos WHERE produto = "' . $this->produto . '"');
                    foreach($sql as $value){
                        $insert = 'INSERT INTO tb_vendas(id_produto, valor_total) VALUES(' . $value['id_produto'] . ','. $value['valor'] * $this->comprarQuantidade .')';
                        $insertVendas = mysqli_query($conect, $insert);
                        /*
                        echo '<pre>';
                        print_r($insertVendas);
                        echo '</pre>';
                        */
                    }
                    $queryUpadate = mysqli_query($conect, $update);
                   header('Location: comprar.php?compra=yes');
                    
                }else{
                    header('Location: comprar.php?compra=no');
                }
            }else{
                header('Location: comprar.php?compra=no');
            }
        }
    }


        $alterar = new comprarEstoque();
        $alterar->__setValueAttr('produto', $_POST['produtos']);
        $alterar->__setValueAttr('comprarQuantidade', $_POST['comprar']);
        $alterar->addValorOrQtd();


?>
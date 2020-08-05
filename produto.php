<?php require 'pages/header.php' ?>

<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';

    $a = new Anuncios();
    $u = new Usuarios();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
    }else{
        ?>
            <script>
                window.location.href="index.php"
            </script>
        <?php
    }

    $info = $a->getAnuncio($id);

?>

<div class="container">
    <div class="grid grid-rows md:grid-flow-col gap-4 main">
        <div class="row-span-3 col-span-2 md:col-span-1">
        
            <h3 class="title mb-2">Fotos do produto</h3>
            
            <div class="anuncios-fotos">
                <?php foreach($info['fotos'] as $chave => $foto): ?>
                    <div class="carousel-item <?= ($chave=='0')? 'active':'' ?>">
                        <img src="assets/images/anuncios/<?= $foto['url']; ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="row-span-2 col-span-2 md:col-span-3 ">
            <h3 class="title mb-2">Informações do Produto</h3>

            <div class="content-anuncios">
                <h1 class="produto-nome"><?= $info['titulo']; ?></h1>
                <span class="produto-categoria"><?=utf8_encode( $info['categoria']); ?></span>
                <span class="produto-desc"><?= $info['descricao']; ?></span>  
                <span class="produto-preco">R$: <?=number_format( $info['valor'], 2); ?></span>  
                <span class="produto-telefone">Telefone: <?= $info['telefone']; ?></span>  
            </div>
            
        </div>
    
    </div>
</div>

<style>
    .anuncios-fotos{
        display: flex;
        flex-wrap: wrap;
    }
    .carousel-item{
        width: 33%;
        padding: 0 5px 5px;
    }
    .main{
        display: flex;
        justify-content: space-between;
    }
    .content-anuncios{
        display: flex;
        flex-direction: column;
        width: 800px;
        min-height: 500px;
        padding: 10px ;
        flex-wrap: wrap;
        background-color: #f0f0f0;

    }
    .produto-nome{
        font-weight: 600;
        font-size: 30px;
    }
    .produto-categoria{
        font-weight: 500;
        font-size: 20px;
    }
    .produto-preco{
        font-weight: 500;
        font-size: 25px;
        margin-top: 30px;
    }
    .content-anuncio{
        width: 33%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }
    .content-anuncio .image {
       width: 200px;
       height: 200px;
    }
    .content-anuncio .image img{
       width: 200px;
       height: 200px;
       border-radius: 3px;
    }
    .content-anuncio .title{
        display: flex;
        flex-direction: column;
    }
    .content-anuncio .title a{
        font-size: 20px;
        font-weight: 600;
    }
    .content-anuncio .title a:hover{
        color: #999;
    }
    .content-anuncio .price{
        color: #ff3333;
    }
</style>

<?php require 'pages/footer.php' ?>

<?php require 'pages/header.php' ?>

<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';

    $a = new Anuncios();
    $u = new Usuarios();

    $total_anuncios = $a->getTotalAnuncios();
    $total_usuarios = $u->getTotalUsuarios() ;

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = addslashes($_GET['p']);
    }
    $total_paginas = ceil($total_anuncios / 9);

    $anuncios = $a->getUltimosAnuncios($p);
?>

<div class="container">
    <div class="flex mb-4">
        <div class="w-full jumbutron">
            São mais de <?= $total_usuarios ;?> pessoas cadastradas em nossa região
            e cerca de <?= $total_anuncios ;?> anúncios
        </div>
    </div>

    <div class="grid grid-rows md:grid-flow-col gap-4 main">
        <div class="row-span-3 col-span-2 md:col-span-1">
            <h3 class="title mb-2">Pesquisa Avançada</h3>
        </div>

        <div class="row-span-2 col-span-2 md:col-span-3 ">
            <h3 class="title mb-2">Últimos Anúncios</h3>

            <div class="content-anuncios">
                <?php foreach($anuncios as $anuncio): ?>      
                    <div class="content-anuncio">
                        <div class="image">
                            <?php if(!empty($anuncio['url'])) : ?>
                                <img src="assets/images/anuncios/<?= $anuncio['url']; ?>" alt="">
                            <?php else: ?>
                                <img src="assets/images/caca-anuncios.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="title">
                            <a href="produto.php?id=<?= $anuncio['id']; ?>"><?= $anuncio['titulo']; ?></a>
                            <span><?= utf8_encode($anuncio['categoria']); ?></span>
                        </div>
                        <div class="price">
                            <strong>R$ <?= number_format($anuncio['valor'], 2); ?></strong>
                        </div>
                    </div>    
                <?php endforeach ?> 
            </div>
            <ul class="paginacao mt-3 mb-3">
                <?php for($i=0; $i<$total_paginas; $i++): ?>
                    <li class="<?= $p==$i+1 ? 'active' : '' ?>">
                        <a href="index.php?p=<?= $i+1; ?>"><?= $i+1; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
  
    </div>
</div>

<style>
    .paginacao{
        display: flex;
    }
    .paginacao li{
        border: 1px solid #444;
        background-color: #f1f1f1;
        border-radius: 3px;
        padding: 5px 10px;
        margin-right: 2px;
    }
    .paginacao li.active{
        background-color: #999;
        color: #fff;
        transition: filter .2s;
    }
    .paginacao li:hover{
        filter: brightness(80%);
    }
    .main{
        display: flex;
        justify-content: space-between;
    }
    .content-anuncios{
        display: flex;
        width: 1000px;
        flex-wrap: wrap;
        background-color: #f0f0f0;

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

<?php require 'pages/header.php' ?>

<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    require 'classes/categorias.class.php';

    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categorias();

    $filtros = array(
        'categoria' => '',
        'preco' => '',
        'estaado' => ''
    );

    if(isset($_GET['filtros'])){
        $filtros = $_GET['filtros'];
    }

    $total_anuncios = $a->getTotalAnuncios();
    $total_usuarios = $u->getTotalUsuarios() ;

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = addslashes($_GET['p']);
    }
    $total_paginas = ceil($total_anuncios / 9);

    $anuncios = $a->getUltimosAnuncios($p, $filtros);
    $categorias = $c->getLista();
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

            <form action="" method="get">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="categoria">
                    Categoria:
                </label>
                <div class="inline-block relative w-full">
                    <select id="categoria" name="filtros[categoria]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
                        <?php foreach($categorias as $cat): ?>
                            <option value="<?= $cat['id']; ?>" 
                            <?= ($cat['id']==$filtros['categoria']) ? 'selected="selected"':'';?>>
                                <?= utf8_encode($cat['nome']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <label class="block mt-2 uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="preco">
                    Preço:
                </label>
                <div class="inline-block relative w-full">
                    <select id="preco" name="filtros[preco]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
                        <option value="0-50" <?= ($filtros['preco']=='0-50') ? 'selected="selected"':'';?>>R$ 0 - 50</option>
                        <option value="51-100" <?= ($filtros['preco']=='51-100') ? 'selected="selected"':'';?>>R$ 51 - 100</option>
                        <option value="101-200" <?= ($filtros['preco']=='101-200') ? 'selected="selected"':'';?>>R$ 101 - 200</option>
                        <option value="201-500" <?= ($filtros['preco']=='201-500') ? 'selected="selected"':'';?>>R$ 201 - 500</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <label class="block mt-2 uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="estado">
                    Estado de Conservação:
                </label>
                <div class="inline-block relative w-full ">
                    <select id="estado" name="filtros[estado]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
                        <option value="0" <?= ($filtros['estado']=='0') ? 'selected="selected"':'';?>>Ruim</option>
                        <option value="1" <?= ($filtros['estado']=='1') ? 'selected="selected"':'';?>>Bom </option>
                        <option value="2" <?= ($filtros['estado']=='2') ? 'selected="selected"':'';?>>Ótimo</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <button type="submit" class="w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    Buscar
                </button>
            </form>
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

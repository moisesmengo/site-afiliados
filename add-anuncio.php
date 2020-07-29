<?php  require 'pages/header.php'?>

<div class="container addanuncio">
    <h3 class="title">Meus Anúncios - Novo Anúncio</h3>

    <?php 
        if(empty($_SESSION['cLogin'])){
            ?>
                <script>window.location.href="login.php"</script>
            <?php
            exit;
        }

        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);

            $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);

            ?>
                <div class=" mt-2 mb-2 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p class="font-bold">Anúncio cadastrado com sucesso!</p>
                </div>
            <?php
        }
    ?>

    <form enctype="multipart/form-data" method="post" class="form-cadastro w-full max-w-sm">
        
        <div class="md:flex md:items-center mb-1">
            <div class="md:w-1/3">
                <label class="block text-gray-900 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Categoria:
                </label>
            </div>
            <select name="categoria" id="categoria" class="mt-2 bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3">
                <?php 
                    require 'classes/categorias.class.php';
                    $c = new Categorias();
                    $cats = $c->getLista();
                    foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']) ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
        <div class="md:flex md:items-center mb-1">
            <div class="md:w-1/3">
                <label class="block text-gray-900 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Título:
                </label>
            </div>
            <input type="text" name="titulo" id="titulo" class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3">
        </div>
        <div class="md:flex md:items-center mb-1">
            <div class="md:w-1/3">
                <label class="block text-gray-900 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Valor:
                </label>
            </div>
            <input type="number" name="valor" id="valor"  class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3">
        </div>
        <div class="md:flex md:items-center mb-1">
            <div class="md:w-1/3">
                <label class="block text-gray-900 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Descrição:
                </label>
            </div>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3"></textarea>
        </div>
        <div class="md:flex md:items-center mb-1">
            <div class="md:w-1/3">
                <label class="block text-gray-900 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Estado:
                </label>
            </div>
            <select name="estado" id="estado" class="mt-2 bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
            </select>
        </div>
        
        <input type="submit" value="Salvar" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
    </form>
</div>

<style>
    .addanuncio{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .form-cadastro{
        margin-top: 20px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 3px;;
    }
    .form-cadastro textarea{
        resize: none;
        height: 150px;
        border: 1px solid #888;
    }
</style>
<?php require 'pages/footer.php' ?>
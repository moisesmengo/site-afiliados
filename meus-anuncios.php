<?php  require 'pages/header.php'?>

<?php 
    if(empty($_SESSION['cLogin'])){
        ?>
            <script>window.location.href="login.php"</script>
        <?php
        exit;
    }
?>

<div class="container content">
    <h3 class="title">Meus Anúncios</h3>

    <table class="table-auto mt-3 border-separate border-2 border-gray-500">
        <thead>
            <tr>
                <th class="px-4 py-2 border-2 border-gray-500 px-4 py-2 text-gray-800">Foto</th>
                <th class="px-4 py-2 border-2 border-gray-500 px-4 py-2 text-gray-800">Título</th>
                <th class="px-4 py-2 border-2 border-gray-500 px-4 py-2 text-gray-800">Valor</th>
                <th class="px-4 py-2 border-2 border-gray-500 px-4 py-2 text-gray-800">Ações</th>
            </tr>
        </thead>

        <?php 
            require 'classes/anuncios.class.php';
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios();

            foreach($anuncios as $anuncio):
            ?>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">
                            <?php if(!empty($anuncio['url'])): ?>
                                <img height="50" src="assets/images/anuncios/<?php echo $anuncio['url'];?>" alt="" border="0" />
                            <?php else: ?>
                                <img src="assets/images/caca-anuncios.jpg" height="30" width="60" alt="">
                            <?php endif; ?>
                        </td>
                        <td class="border px-4 py-2"><?php echo $anuncio['titulo']; ?></td>
                        <td class="border px-4 py-2">R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                        <td class="border px-4 py-2">
                            <a 
                                href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                            >Editar</a>
                            <a 
                                onclick="return confirm('Deseja realmente excluir este anúncio?')" 
                                href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            >Excluir</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
    </table>

    <a 
        href="add-anuncio.php"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3"
    >Adcionar novo anúncio</a>
</div>

<style>
    .content{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>
<?php  require 'pages/footer.php'?>
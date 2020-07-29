<?php require 'config.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Comprano</title>
</head>
<body>

    <nav class="flex items-center justify-between flex-wrap bg-yellow-500 p-6">
        <div class="flex items-center flex-shrink-0 text-gray-700 mr-6">
            <img class="fill-current h-8 w-8 mr-2" width="54" height="54" src="https://images.vexels.com/media/users/3/132104/isolated/preview/5f2ebb95984bf47ea01319291eb81f68---cone-de-silhueta-de-carrinho-de-compras-by-vexels.png" />
            <span class="font-semibold text-xl tracking-tight">Comprano</span>
        </div>
        
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <a href="index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4">
                        Home
                    </a>
                    <a href="meus-anuncios.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4">
                        Meus Anúncios
                    </a>
                    <a href="sair.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4">
                        Sair
                    </a>
                <?php else: ?>
                    <a href="index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4">
                        Home
                    </a>
                    <a href="cadastro.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4 ">
                        Cadastre-se
                    </a>
                    <a href="login.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-700 hover:text-gray-600 mr-4">
                        Login
                    </a> 
                <?php endif; ?>
            </div>
        </div>
    </nav>
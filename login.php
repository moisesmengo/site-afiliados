<?php require 'pages/header.php' ?>

<div class="container cadastro">
    <h1 class="mb-5">Faça seu login:</h1> 

    <?php 
        require 'classes/usuarios.class.php';
        $u = new Usuarios();

        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];

            if($u->login($email, $senha)){
                ?>
                    <script>window.location.href="./"</script>
                <?php
            }else{
                ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                        <p class="font-bold">Erro!</p>
                        <p>Usuário e/senha incorretos</p>
                    </div>
                <?php
            }          
        }
    ?>

    <form method="post" class="form-cadastro mt-2">
        <input type="email" placeholder="E-mail" name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="password" placeholder="Senha" name="senha" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="submit" value="Fazer login"  class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
    </form>

</div>

<style>
    .form-cadastro{
        display: flex;
        flex-direction: column;
        width: 60%;
    }
    .form-cadastro input{
        border: 1px solid #888;
    }
</style>
<?php require 'pages/footer.php' ?>

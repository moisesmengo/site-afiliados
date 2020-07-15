<?php require 'pages/header.php' ?>

<div class="container cadastro">
    <h1 class="mb-5">Faça seu cadastro:</h1> 

    <?php 
        require 'classes/usuarios.class.php';
        $u = new Usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];
            $telefone = addslashes($_POST['telefone']);

            if(!empty($nome) && !empty($email) && !empty($senha)){
                if($u->cadastrar($nome, $email, $senha, $telefone)){
                    ?>
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Usuário cadastrado com sucesso!</p>
                            <p>Volte e faça seu login</p>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Aviso!</p>
                            <p>Este usuário já está cadastrado em nosso banco de dados</p>
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Aviso!</p>
                        <p>Existem campos obrigatórios que devem ser preenchidos</p>
                    </div>
                <?php
            }
        }
    ?>

    <form method="post" class="form-cadastro">
        <input type="text" placeholder="Nome" name="nome" class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="email" placeholder="E-mail" name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="password" placeholder="Senha" name="senha" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="text" placeholder="Telefone" name="telefone" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mb-3" id="inline-full-name">
        <input type="submit" value="Cadastrar"  class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
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

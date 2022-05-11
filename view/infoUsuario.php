<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <?php include_once "favicon.php"?>
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">

</head>
<body>
    <!-- CORPO -->
    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado e exista uma sessão
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case '0':
                        include_once "menuLogado.php";
                    break;
                    //caso tenha nível de acesso de clínica
                    case '1':
                        include_once "menuClinica.php";
                    break;
                    //caso tenha nível de acesso de Administrador
                    case '2':
                        include_once "menuADM.php";
                    break;
                    
                }
            }
        else{
            include_once "menu.php";
        }
    ?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Olá <?php echo" usuário !"; ?>
                </div>
                <div class="container bg-white ">
                    <form action="<?php echo URL.'perfil'; ?>">
                        <div class="row align-items-center justify-content-center mb-2">
                            <div class="col-sm-5 mb-3 form-group ps-4">
                                <div class="row">
                                    <p>Nome: <?php echo $_SESSION["dadosUsuario"]->nome;?></p>
                                </div>
                                <div class="row">
                                    <p>E-mail: <?php echo $_SESSION["dadosUsuario"]->email;?></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>CPF: <?php echo $_SESSION["dadosUsuario"]->cpf;?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Telefone: <?php echo $_SESSION["dadosUsuario"]->telefone;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>RG: <?php echo $_SESSION["dadosUsuario"]->rg;?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Celular: <?php echo $_SESSION["dadosUsuario"]->celular;?></p>
                                    </div>    
                                </div>
                                
                            </div>
                            <div class="col-sm-7 mb-2 form-group ps-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p>CEP: <?php echo $_SESSION["dadosUsuario"]->usucep;?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Número: <?php echo $_SESSION["dadosUsuario"]->usunumero;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <p>Bairro: <?php echo $_SESSION["dadosUsuario"]->usubairro;?></p>
                                </div>
                                <div class="row">
                                    <p>Rua: <?php echo $_SESSION["dadosUsuario"]->usurua;?></p>
                                </div>
                                <div class="row">
                                    <p>
                                        <?php 
                                            if($_SESSION["dadosUsuario"]->nis != null)
                                                echo "<input type='checkbox' checked disabled>";  
                                            else
                                                echo "<input type='checkbox' disabled>";
                                            echo " Tenho benefício NIS: ".$_SESSION["dadosUsuario"]->nis;
                                        ?>
                                    </p>
                                </div>
                                
                                <div class="row">
                                    <p>
                                        <?php 
                                            if($_SESSION["dadosUsuario"]->beneficio == '2'){
                                                echo "<input type='checkbox' checked disabled>";  
                                                echo " Sou protetor de animais ";
                                                echo "<input class='btn btn-success col-auto' type='button' value='Visualizar documento' name='btnProtetorDoc'>";
                                            }
                                            else{
                                                echo "<input type='checkbox' disabled>";
                                                echo " Sou protetor de animais &nbsp";
                                                echo "<input class='btn btn-success col-auto' type='button' value='Visualizar documento' name='btnProtetorDoc' disabled>";
                                            }
                                        ?>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between ps-3  mb-4">
                            <div class="col-sm-3 mb-3">
                                <a href="<?php echo URL.'alterar-senha'; ?>" class="link-dark">Alterar minha senha</a>
                            </div>
                            <div class="col-sm-9">
                                <a href="<?php echo URL.'meus-animais'; ?>" class="btn btn-success col-auto ">Meus animais</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-usuario'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>
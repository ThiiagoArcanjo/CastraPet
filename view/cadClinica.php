<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
    </style>
</head>
<body>
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        <?php //CONTROLE DE MENU
            if($_SESSION) //caso esteja logado e exista uma sessão
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case 0: include_once "menuLogado.php"; break;
                    //caso tenha nível de acesso de clínica
                    case 1: include_once "menuClinica.php"; break;
                    //caso tenha nível de acesso de Administrador
                    case 2: include_once "menuADM.php"; break;   
                }
            }
            else{ include_once "menu.php"; }
        ?>
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Cadastrar Clínica</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form action="cadastrar-clinica" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0" method="POST">
                            <div class="col-md-6 mb-lg-0 mb-5 p-0 pe-md-3">
                                <div class="form-group row-3">
                                    <label for="txtNome">Nome:</label>
                                    <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtEmail">E-mail:</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtCNPJ">CNPJ:</label>
                                    <input type="text" id="txtCNPJ" name="txtCNPJ" class="form-control" placeholder="" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtTelefone">Telefone:</label>
                                            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtVagas">Vagas:</label>
                                            <input type="number" id="txtVagas" name="txtVagas" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 ps-md-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtCEP">CEP:</label>
                                            <input type="number" id="txtCEP" name="txtCEP" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtNumero">Número:</label>
                                            <input type="number" id="txtNumero" name="txtNumero" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="txtBairro">Bairro:</label>
                                    <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtRua">Rua:</label>
                                    <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtSenha">Crie uma Senha:</label>
                                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtConfSenha">Confirme a Senha</label>
                                    <input type="password" id="txtConfSenha" name="txtConfSenha" class="form-control" placeholder="" required>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success float-end mt-4" value="Cadastrar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-adm';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
</body>
</html>
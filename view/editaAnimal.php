<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
    <style type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
        .vazio
        {
            width: 100px;
        }
        #inputImgAnimal + label
        {
            position: absolute;
            height: 250px; 
            width: 375px;
            border: solid;
            border-color: #198754;
            cursor: pointer;
        }
        #imgAnimal
        {
            height: 250px;
            width: 399px;
        }

        @media screen and (max-width: 1199px)
        {
            #inputImgAnimal + label
            {
                width: 355px;
            }
        }

        @media screen and (max-width: 992px)
        {
            #inputImgAnimal + label
            {
                height: 200px;
                width: 255px;
            }
            #imgAnimal
            {
                height: 200px;
            }
        }

        @media screen and (max-width: 767px)
        {
            #imgAnimal
            {
                width: 275px;
            }
        }
        
        @media screen and (max-width: 336px)
        {
            #inputImgAnimal + label
            {
                height: 175px;
                width: 200px;
            }
            #imgAnimal
            {
                height: 175px;
                width: 220px;
            }
        }
    </style>
</head>
<body>  
    <!-- CORPO -->
    <div class="container-fluid vh-100 d-grid corpo">
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

        <div class="container-fluid container-principal">
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3" style="grid-area:corpo;">
                    <div class="container shadow-lg text-light p-3" style="border: 0; border-radius:0; overflow: hidden; background-color: var(--preto);">
                        <h1 class="h5 m-1">CADASTRAR ANIMAL</h1>
                    </div>
                    <div class="container shadow-lg bg-white p-4">
                        <form method="post" action="<?php echo URL.'editar-animal';?>" enctype="multipart/form-data">
                        <input type="hidden" name="" value="<?php echo $dadosAnimal->idanimal;?>">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="txtNome" class="form-label">Nome do Animal:</label>
                                            <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="50" required value="<?php echo $dadosAnimal->aninome;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="slcEspecie" class="form-label">Espécie:</label>
                                            <select id="slcEspecie" name="slcEspecie" class="form-select" required value="<?php echo $dadosAnimal->especie;?>">
                                                <option value="0">Canina</option>
                                                <option value="1">Felina</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="numIdade" class="form-label">Idade:</label>
                                            <input type="number" class="form-control" id="numIdade" name="numIdade" min="0" max="100" required value="<?php echo $dadosAnimal->idade;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="slcSexo" class="form-label">Sexo:</label>
                                            <select id="slcSexo" name="slcSexo" class="form-select" required value="<?php echo $dadosAnimal->sexo;?>">
                                                <option value="0">Fêmea</option>
                                                <option value="1">Macho</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcPelagem" class="form-label">Pelagem:</label>
                                            <select id="slcPelagem" name="slcPelagem" class="form-select" required value="<?php echo $dadosAnimal->pelagem;?>">
                                                <option value="0">Curta</option>
                                                <option value="1">Média</option>
                                                <option value="2">Alta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="txtCor" class="form-label">Cor:</label>
                                            <input type="text" class="form-control" id="txtCor" name="txtCor" maxlength="30" required value="<?php echo $dadosAnimal->cor;?>">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcPorte" class="form-label">Porte:</label>
                                            <select id="slcPorte" name="slcPorte" class="form-select" required value="<?php echo $dadosAnimal->porte;?>">
                                                <option value="0">Pequeno</option>
                                                <option value="1">Médio</option>
                                                <option value="2">Grande</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="listRaca" class="form-label">Raça:</label>
                                            <input list="racas" name="listRaca" id="listRaca" class="form-control" maxlength="30" required>
                                            <datalist id="racas">
                                                <?php
                                                    foreach($dadosRaca as $value)
                                                    {
                                                        echo "<option value='$value->raca'></option>";
                                                    }
                                                ?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcComunitario" class="form-label">Animal Comunitário:</label>
                                            <select id="slcComunitario" name="slcComunitario" class="form-select" required>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-2">
                                    <div class="row text-center mb-3">
                                        <label>Foto do animal:</label>
                                    </div>
                                    <div class="row justify-content-center mb-3">
                                        <input type="file" name="imgAnimal" id="inputImgAnimal" accept="image/*" hidden>
                                        <label id="labelImgAnimal" for="inputImgAnimal" style="background-color: 0;"></label>
                                        <img src="<?php echo URL.'recursos/img/Animais/'.$dadosAnimal->foto;?>" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center mt-3 mb-2">
                                            <input type="submit" value="Atualizar" class="btn btn-lg btn-success shadow" style="border-radius: 0; border: 0; padding: 12px 30px 12px 30px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px; overflow: hidden;">
                <a href="<?php echo URL.'meus-animais';?>" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area:footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'meus-animais'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
                </div>
            </div>
        </div>
        <!-- /CORPO -->
    </div>
    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
        inputImgAnimal.onchange = evt => {
            const [file] = inputImgAnimal.files
            if (file) {
                var url = URL.createObjectURL(file);
                imgAnimal.src = url;
            }
        }
    </script>
</body>
</html>
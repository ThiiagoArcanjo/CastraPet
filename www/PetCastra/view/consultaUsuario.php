<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- CSS DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"/>    

    <?php include_once "head.php";?> 
</head>
<body>
    <!-- CORPO -->
    <div class="d-grid min-vh-100 corpo">

    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center" style="max-width:100vw;">
                <div class="py-3 px-2">
                    <div class="container-fluid bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Consultar Usuários</h5>
                    </div>
                    <div class="container-fluid p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <div class="table-responsive">
                            <table id="tbUsuario" class="table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Comp. Residência</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Benefício</th>
                                    <th>NIS</th>
                                    <th>E-mail</th>
                                    <th>Bairro</th>
                                    <th>Rua</th>
                                    <th>Número</th>
                                    <th>Telefone</th>
                                    <th>Celular</th>
                                    <th>Punição</th>
                                    <th>Animais</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($dadosUsuario as $value)
                                        {
                                            $valorBeneficio = $value->beneficio;
                                            $value->beneficio = str_replace("0", "-", $value->beneficio);
                                            $value->beneficio = str_replace("1", "Benefício Social", $value->beneficio);
                                            $value->beneficio = str_replace("2", "Protetor de Animais", $value->beneficio);
                                            $value->beneficio = str_replace("3", "Em análise", $value->beneficio);
                                            
                                            $valorTelefone = $value->telefone;
                                            $value->telefone = preg_replace("/^$/", "-", $value->telefone);

                                            $valorNis = $value->nis;
                                            $value->nis = preg_replace("/^$/", "-", $value->nis);
                                            
                                            $valorPunicao = $value->punicao;
                                            $value->punicao == 0 ? $value->punicao = '-' : $value->punicao = "<span class='badge bg-danger'>Punido</span>";
                                            
                                            $whats = $value->whatsapp;
                                            $value->whatsapp == 1 ? $value->whatsapp = "<a href='https://api.whatsapp.com/send?phone=55$value->celular&text=Olá $value->nome!' target='_blank'><img src='".URL."recursos/img/whatsapp.png'></a>" : $value->whatsapp = "";

                                            //Testar depois:
                                            //$number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
    
                                            echo
                                            "
                                            <tr>
                                                <td>$value->idusuario</td>
                                                <td>
                                                    <button id='btnImg' type='button' data-bs-target='#modalImg' data-bs-toggle='modal' data-img='$value->doccomprovante'>
                                                        <img width='150px' class='img-thumbnail' src='".URL."recursos/img/docComprovantes/$value->doccomprovante'>
                                                    </button>
                                                </td>
                                                <td>$value->nome</td>
                                                <td>$value->cpf</td>
                                                <td>$value->rg</td>
                                                <td>$value->beneficio</td>
                                                <td>$value->nis</td>
                                                <td>$value->email</td>
                                                <td>$value->usubairro</td>
                                                <td>$value->usurua</td>
                                                <td>$value->usunumero</td>
                                                <td>$value->telefone</td>
                                                <td style='width:140px;'>$value->celular $value->whatsapp</td>
                                                <td>$value->punicao</td>
                                                <td>
                                                    <a href='". URL. "consulta-animais/$value->idusuario' class='btn btn-success col-auto'>
                                                        <img src='". URL ."recursos/img/Logo-Castra-Pet.svg' alt='Animais cadastrados' width='30px' class='aling-itens-center white justify-content-center'>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class='btn btn-warning btn-sm-sm text-light' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' 
                                                            data-idusuario='$value->idusuario' data-nome='$value->nome' data-cpf='$value->cpf' data-beneficio='$valorBeneficio' data-nis='$valorNis' 
                                                            data-email='$value->email' data-telefone='$valorTelefone' data-celular='$value->celular' data-punicao='$valorPunicao' data-rg='$value->rg' 
                                                            data-cep='$value->usucep' data-numero='$value->usunumero' data-bairro='$value->usubairro' data-rua='$value->usurua' data-idlogin='$value->idlogin' data-whats='$whats'>
                                                        <img src=". URL . "recursos/img/pencil-square.svg".">
                                                    </button>
                                                
                                                </td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
    
    <!-- MODAL: editar usuário -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL.'atualiza-tutor';?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        
                        <input type="hidden" name="idusuario" id="idusuario">
                        <input type="hidden" name="idlogin" id="idlogin">
                        
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="form-label">Nome:</label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome"  maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:</label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100">
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF" class="form-label">CPF:</label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF"  maxlength="14" required>
                                        <div class="invalid-feedback" id="cpfInvalido" style="display:none;">CPF Inválido</div>
                                        <div class="valid-feedback" id="cpfValido" style="display:none;">CPF Válido</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel"  maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG" class="form-label">RG:</label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG"  maxlength="12" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular" class="form-label">Celular:</label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular"  maxlength="15">
                                        <div class="form-group">
                                            <input type="checkbox" name="chkWhats" id="chkWhats" value="sim">
                                            <label for="chkWhats" class="form-label" style="font-size: 0.9em;">O número é Whatsapp?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="chkPunicao" id="chkPunicao" class="form-check-input">
                                        <label for="chkPunicao" class="form-check-label">Punição</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:</label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:</label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero"  maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro" class="form-label">Bairro:</label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua" class="form-label">Rua:</label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="1">
                                        <label for="chkNIS">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="text" name="txtNIS" id="txtNIS" maxlength="11">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="checkbox" name="chkProtetor" id="chkProtetor" value="2">
                                    <label for="chkProtetor">Sou protetor de animais</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Editar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <!-- MODAL: img docComprovante-->
    <div class="modal fade" id="modalImg" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comprovante de Residência</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body row justify-content-center">   
                    <img id="modalImagem" src="recursos/img/docComprovantes/">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    
    <!-- DataTables -->
    <script type='text/javascript' charset='utf8' src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js'></script>

    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js'></script>
    
    <!-- EXTENSÃO JQUERY DAS MASCARAS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- JS SweetAlert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#tbUsuario').DataTable( {
                'responsive':true,
                'autoWidth':false,
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                    {
                        extend:'csv',
                        exportOptions:{
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions:{
                            columns: ':visible'
                        }  
                    }
                ],
                columnDefs: [
                    {
                        targets: 1,
                        className: 'noVis'
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                },
                "search": {
                    "search": "<?php if(!isset($cpf)){$cpf = '';} echo $cpf;?>"
                }
            } );
        } );
    </script>

    <!-- ABRIR MODAL editar usuário -->
    <script>
        var modalEditar = document.getElementById('modalEditar')
        modalEditar.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget

            var idusuario = button.getAttribute('data-idusuario')
            var idlogin = button.getAttribute('data-idlogin')
            var nome = button.getAttribute('data-nome')
            var cpf = button.getAttribute('data-cpf')
            var beneficio = button.getAttribute('data-beneficio')
            var nis = button.getAttribute('data-nis')
            var email = button.getAttribute('data-email')
            var telefone = button.getAttribute('data-telefone')
            var celular = button.getAttribute('data-celular')
            var rg = button.getAttribute('data-rg')
            var cep = button.getAttribute('data-cep')
            var numero = button.getAttribute('data-numero')
            var bairro = button.getAttribute('data-bairro')
            var rua = button.getAttribute('data-rua')
            var punicao = button.getAttribute('data-punicao')
            var whats = button.getAttribute('data-whats')

            
            var modalId = modalEditar.querySelector('.modal-title')
            modalId.textContent = 'Editar: ' + nome;

            $("#idusuario").val(idusuario);
            $("#idlogin").val(idlogin);
            $("#txtNome").val(nome);
            $("#txtCPF").val(cpf).mask('000.000.000-00');
            if(beneficio == 2)
            {
                $("#chkProtetor").prop("checked", true);
            }
            else{
                $("#chkProtetor").prop("checked", false);
            }
            if(nis.length == 11)
            {
                $("#chkNIS").prop("checked", true);
            }
            else{
                $("#chkNIS").prop("checked", false);
            }
            $("#txtNIS").val(nis);
            $("#txtEmail").val(email);
            $("#txtTel").val(telefone);   
            $("#txtCelular").val(celular).mask('(00) 00000-0000');  
            $("#txtRG").val(rg).mask('00.000.000-X', {'translation': {X: {pattern: /[0-9xX]/}}});
            $("#txtCEP").val(cep).mask('00000-000');
            $("#txtNumero").val(numero);
            $("#txtBairro").val(bairro);
            $("#txtRua").val(rua);
            if(punicao > 0)
            {
                $("#chkPunicao").prop("checked",true);
                $("#chkPunicao").val(punicao);
            }
            else{
                $("#chkPunicao").prop("checked",false);
                $("#chkPunicao").val('2');
            }
            if(whats == 1)
            {
                $("#chkWhats").prop("checked", true);
            }
            else{
                $("#chkWhats").prop("checked", false);
            }
        });
    </script>
    <!-- ABRIR MODAL comprovante -->
    <script>
        var modalComprovante = document.getElementById('modalImg')
        modalComprovante.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget

            var img = button.getAttribute('data-img')

            $("#modalImagem").prop("src", "<?php echo URL.'recursos/img/docComprovantes/'?>"+img);

        });
    </script>
    <!-- SCRIPT CONFIRMAÇÃO PARA EXCLUIR O USUÁRIO -->
    <script>
        function confirmar(idusu, idlogin)
        {
            Swal.fire({
                title: 'Você tem certeza que deseja excluir?',
                text: "Você não será capaz de desfazer esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Excluído!', //title:
                        'Usuário apagado com sucesso.', //text:
                        'success', //icon:
                    ).then(()=> {
                        window.location='<?php echo URL;?>excluir-tutor/'+idusu+'/'+idlogin;
                        }
                    )}
            })
        }
    </script>
    <!-- VALIDADOR DE CPF -->
    <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
    <script>
        $("#txtCPF").on("blur", function(){
            let cpf_value = $(this).val();
            
            if(jsbrasil.validateBr.cpf(cpf_value)) {
                $("#cpfValido").show();
                $("#cpfInvalido").hide();
            } else {
                $("#cpfInvalido").show();
                $("#cpfValido").hide();
            }
        });
    </script>
</body>
</html>
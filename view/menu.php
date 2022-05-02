<?php 
  if($_GET)
  {
    $url = $_GET['url'];
    $url = explode('/', $url);
  }
  else{
    $url = array();
    $url[0] = 'inicio';
  }
  ?>
<nav class="navbar navbar-expand-md navbar-light bg-transparent px-4 py-0 mx-2">
  <a class="navbar-brand" href="<?php echo URL.'inicio';?>"><img src="<?php echo URL.'recursos/img/Logo-Nav (2).png'?>" style="height:80px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link <?php $font='fw-bold'; switch($url[0]){case '': echo $font; break; case 'inicio': echo $font; break;}?>"  href="<?php echo URL; ?>">Início</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link <?php $font='fw-bold'; switch($url[0]){case '': echo $font; break; case 'sobre': echo $font; break;}?>"  href="<?php echo URL.'sobre'; ?>">Sobre</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'#'; ?>">Prefeitura Franco da Rocha</a>
      </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0">
      <a href="<?php echo URL.'login';?>" class="btn btn-success my-2 my-sm-0">Login</a>
    </form>
  </div>
</nav>
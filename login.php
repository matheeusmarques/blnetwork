<?php
session_start();
if(isset($_SESSION['login'])){
  header("Location: http://localhost/admin/index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BL. Network - Página de Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="registerpeople"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login-form" action="visao/controleUsuario.php?action=login" method="POST" role="form" data-parsley-validate>
              <h1>Login</h1>
              <div>
                <input type="text" id="login" name="login" class="form-control" placeholder="Login" required="true" />
              </div>
              <div>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required="true" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Entrar</button>
                <a class="reset_pass" href="#">Perdeu sua senha?</a>
              </div>

              <div class="clearfix"></div>
              <div class="separator">
             <p class="change_link">Novo no site? -->
                   <a href="#signup" class="to_register"> Crie uma conta </a>
               </p>

               <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> BL. Network</h1>
                  <p>©2018</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="visao/controleUsuario.php?action=register">
              <h1>Criar conta</h1>
              <div>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required="" />
              </div>
              <div>
                <input type="text" id="login" name="login" class="form-control" placeholder="Usuário" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Registrar-se</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já é membro ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2018 - Todos os direitos reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<?php include '../modulos/styles.php'; ?>

 <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/index.css" th:href="@{/css/index.css}">

    <body class="fixed-left">

 <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../bootstrap/img/user.png" th:src="@{../bootstrap/img/user.png}"/>
                </div>
                <form class="col-12" action="index.php" id="formulario_login">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" id="correo"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contrasena" id="contrasena"/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
               
            </div>
        </div>
    </div>
      <script src="../bootstrap/js/jquery.min.js" ></script>
  <script src="../Ajax/login.js" type="text/javascript" ></script>
    </body>
</html>
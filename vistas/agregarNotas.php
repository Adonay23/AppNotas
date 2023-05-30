<?php include '../modulos/emcabezado.php'; ?>
<?php include '../modulos/styles.php'; ?>

  <!-- Contenedor del contenido-->
 <div class="container">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORM TO ADD TASKS -->
              <form id="form-notas" name="form-notas">
                <input type="hidden" id="ingreso_datos" name="ingreso_datos" value="si_registro">
                 <input type="hidden" name="llave_persona" id="llave_persona" value="">
                <div class="form-group">
                  <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control">
                </div>
                <div class="form-group">
                  <input type="date" id="fecha" name="fecha" placeholder="Fecha de Nacimiento" class="form-control">
                </div>
                <div class="form-group">
                  <textarea id="descripcion" name="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion"></textarea>
                </div>
                <input type="hidden" id="taskId">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar nota
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- TABLE  -->
        <div class="col-md-7">
         

            <div id="aqui_tabla">
              </div>

       
        </div>
      </div>
    </div>


<?php include '../modulos/footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

      
    <!-- Option 1: Bootstrap Bundle with Popper -->
    

    <script src="../bootstrap/js/jquery.min.js" ></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js" ></script>
     <script src="../bootstrap/datatables/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../Ajax/notas.js" type="text/javascript" ></script>
  </body>
</html>
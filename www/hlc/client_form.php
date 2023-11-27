<?php 
  include_once 'menu.php'
?>
  <div class="container mx-auto mt-5 p-2">
    <form class="form-horizontal" name="frmNewClient" id="frmNewClient" action="process_add_client.php" method="post">
      <div class="form-group">
        <label for="txtClientName">Nombre Cliente</label>
        <input id="txtClientName" name="txtClientName" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="txtAddress">Address</label>
        <input id="txtAddress" name="txtAddress" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="txtPhone">Telefono</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">+34</div>
          </div>
          <input id="txtPhone" name="txtPhone" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="txtGmail">Correo Electronico</label>
        <div class="input-group">
          <input id="txtGmail" name="txtGmail" placeholder="correoelectronico" type="text" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">@gmail.com</div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <input name="btnAddClient" id="btnAddClient" type="submit" class="btn btn-success" value="Aceptar"/>
      </div>
    </form>
  </div>
</body>

</html>
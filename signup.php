<?php session_start() ?>
<div class="container-fluid">
  <form action="" id="signup-frm">
    <div id="msg"></div>
    <div class="form-group">
      <label for="" class="control-label">Nombre</label>
      <input type="text" name="firstname" required="" class="form-control">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Segundo Nombre</label>
      <input type="text" name="middlename" class="form-control">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Apellido</label>
      <input type="text" name="lastname" required="" class="form-control">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Contacto</label>
      <input type="text" name="contact" required="" class="form-control">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Dirección</label>
      <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Correo</label>
      <input type="email" name="email" required="" class="form-control">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Contraseña</label>
      <input type="password" name="password" required="" class="form-control">
    </div>
    <button class="button btn btn-info btn-sm">Crear Cuenta</button>
  </form>
</div>

<style>
  #uni_modal .modal-footer {
    display: none;
  }
</style>
<script>
  $('#signup-frm').submit(function(e) {
    e.preventDefault()
    start_load()
    if ($(this).find('.alert-danger').length > 0)
      $(this).find('.alert-danger').remove();
    $.ajax({
      url: 'ajax.php?action=signup',
      method: 'POST',
      data: $(this).serialize(),
      error: err => {
        console.log(err)
        end_load()

      },
      success: function(resp) {
        if (resp == 1) {
          location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
        } else {
          $('#signup-frm').prepend('<div class="alert alert-danger">Correo existe actualmente</div>')
          end_load()
        }
      }
    })
  })
</script>
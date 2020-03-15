{if $save}
  <div class="bootstrap">
    <div class="module_confirmation conf confirm alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x</button>
      Variable de configuración actalizada correctamente.
    </div>
  </div>
{/if}

<form action="" method="post">
  <div class="form-group">
    <label for="newVar">Cambiar valor de variable de configuración</label>
    <input type="text" name="newVar" value="{$varValue}" class="form-control" placeholder="Asignar variable de configuración">
  </div>
  <button type="submit" name="submitEjemplo" class="btn btn-primary">Guardar</button>
</form>

<div class="container margin">
  <h1>Inserir Plat</h1>
  <button type="button" style="margin-bottom: 2%;" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fas fa-utensils"></i></button>
  <div id="demo" class="collapse">
    <form action="insertarPlate" id="signup-form" class="form-inline" style="margin: 0%;" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-2">
        <label for="nomplat">
          <input type="text" name="nomplat" class="form-control" id="nomplat" required>

        </label>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <label for="tipus">
          <select class="custom-select mr-sm-3" name="tipus" id="tipus">
            <option selected disabled>Tipus plat...</option>
            <option value="1">Primer Plat</option>
            <option value="2">Segon Plat</option>
            <option value="3">Postre</option>
          </select>
        </label>
      </div>

      <input type="submit" id="submitButton" class="btn btn-secondary mb-2" value="Afegir">

    </form>
    <div class="invalid-feedback">
            Porfavor, ponga un plato.
          </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $("#submitButton").click(function() {
      //Fetch form to apply custom Bootstrap validation
      var form = $("#signup-form");

      if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.addClass('was-validated');

      //Make ajax call here
    })
  })
</script>
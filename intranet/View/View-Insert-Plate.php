<div class="container margin">
  <h1>Inserir Plat</h1>
  <button type="button" style="margin-bottom: 2%;" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fas fa-utensils"></i></button>
  <div id="demo" class="collapse">
    <form action="insertarPlate" class="form-inline" style="margin: 0%;" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-2">
        <label for="nomplat">

          <input type="text" name="nomplat" id="nomplat" required>
          <div class="invalid-feedback">
            Porfavor, ponga un plato.
          </div>
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
      <input type="submit" class="btn btn-secondary mb-2" value="Afegir">

    </form>
  </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<div class="container margin">
  <h1>Inserir Plat</h1>
  <button type="button" style="margin-bottom: 2%;" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fas fa-utensils"></i></button>
  <div id="demo" class="collapse">
    <form action="insertarPlate" class="form-inline" style="margin: 0%;" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-2">
        <label for="nomplat">

          <input type="text" name="nomplat" id="nomplat">
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
      <input type="submit" required class="btn btn-secondary mb-2" value="Afegir">
      <div class="invalid-feedback">
        Porfavor, ponga un plato.
      </div>
    </form>
  </div>
</div>


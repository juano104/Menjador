<div class="container margin">
  <h2>Inserir Plat</h2>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fas fa-utensils"></i></button>
  <div id="demo" class="collapse">
  
          <h1>INSERIR PLAT</h1>
          <form action="insertar/plate" class="form-inline" style="margin: 0%;" method="post">
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
            <input type="submit" class="btn btn-secondary mb-2" value="Afegir">
          </form>
  </div>
</div>

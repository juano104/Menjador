<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <a class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="far fa-utensils"></i><i class="fas fa-plus-circle"></i>
      </a>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="container">
          <h1>INSERIR PLAT</h1>
          <form action="insertar/plate" class="form-inline" method="post">
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
    </div>
  </div>
</div>
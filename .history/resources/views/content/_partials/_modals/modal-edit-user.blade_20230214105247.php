<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50">
        <div class="text-center mb-2">
          <h1 class="mb-1">Editar información de la entidad</h1>
        </div>
        <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserFirstName">Nombre</label>
            <input
              type="text"
              id="nombre1"
              name="nombre1"
              class="form-control"
              placeholder="Nombre"
              value="{{$entidad->nombre}}"
            />
          </div>
          <div class="col-12 col-md-12">
            <label class="form-label" for="modalEditUserLastName">Introducción</label>
            <textarea
              id="descripcion1"
              name="descripcion1"
              class="form-control"
              row="3"
              value="{{$entidad->descripcion}}"
              data-msg="Please enter your last name"
            ></textarea>
          </div>
          <div class="col-12">
              <label class="form-label" for="cargo">Tipo de entidad</label>
              <select id="tipoentidad1" name="tipoentidad1" class="select2 form-select">
                <option value="{{$entidad->tipoentidad}}" selected>{{$entidad->tipoentidad}}</option>
                <option value="Pública">Pública</option>
                <option value="Financiera">Financiera</option>
                <option value="Servicios">Servicios</option>
              </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">Link página web:</label>
            <input
              type="text"
              id="linkpagina1"
              name="linkpagina1"
              class="form-control"
              value="{{$entidad->linkpagina}}"
            />
          </div>          
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditTaxID">Link PQRSD</label>
            <input
              type="text"
              id="modalEditTaxID"
              name="modalEditTaxID"
              class="form-control modal-edit-tax-id"
              placeholder="Tax-8894"
              value="Tax-8894"
            />
          </div>
          <img  id="logo2" width="150px" style="background-color: #fff" alt="">
          <div class="col-12 col-md-6">
              <label for="customFile1" class="form-label">logo de la entidad</label>
              <input class="form-control" type="file" id="logo1"  name="logo1">
            </div>
            <img  id="banner2" width="150px" style="background-color: #fff" alt="">
            <div class="col-12 col-md-6">
              <label for="customFile1" class="form-label">Banner o imagen publicitaria de la entidad</label>
              <input class="form-control" type="file" id="banner1"  name="banner1">
            </div>
          <div class="col-12 text-center mt-2 pt-50">
            <button type="submit" class="btn btn-primary me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              Discard
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->

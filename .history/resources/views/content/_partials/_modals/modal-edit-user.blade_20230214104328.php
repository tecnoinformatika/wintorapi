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
            <label class="form-label" for="modalEditTaxID">Tax ID</label>
            <input
              type="text"
              id="modalEditTaxID"
              name="modalEditTaxID"
              class="form-control modal-edit-tax-id"
              placeholder="Tax-8894"
              value="Tax-8894"
            />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserPhone">Contact</label>
            <input
              type="text"
              id="modalEditUserPhone"
              name="modalEditUserPhone"
              class="form-control phone-number-mask"
              placeholder="+1 (609) 933-44-22"
              value="+1 (609) 933-44-22"
            />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLanguage">Language</label>
            <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select" multiple>
              <option value="english">English</option>
              <option value="spanish">Spanish</option>
              <option value="french">French</option>
              <option value="german">German</option>
              <option value="dutch">Dutch</option>
              <option value="hebrew">Hebrew</option>
              <option value="sanskrit">Sanskrit</option>
              <option value="hindi">Hindi</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Country</label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select">
              <option value="">Select Value</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select>
          </div>
          <div class="col-12">
            <div class="d-flex align-items-center mt-1">
              <div class="form-check form-switch form-check-primary">
                <input type="checkbox" class="form-check-input" id="customSwitch10" checked />
                <label class="form-check-label" for="customSwitch10">
                  <span class="switch-icon-left"><i data-feather="check"></i></span>
                  <span class="switch-icon-right"><i data-feather="x"></i></span>
                </label>
              </div>
              <label class="form-check-label fw-bolder" for="customSwitch10">Use as a billing address?</label>
            </div>
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

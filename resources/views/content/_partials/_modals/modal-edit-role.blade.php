<!-- Add Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
      <div class="modal-content">
        <div class="modal-header bg-transparent">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-5 pb-5">
          <div class="text-center mb-4">
            <h1 class="role-title">Editar</h1>
            <p>Seleccionar permisos del ROL</p>
          </div>
          <!-- Add role form -->
          {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            @csrf
            <div class="col-12">
              <label class="form-label" for="modalRoleName">Nombre del ROL</label>
              <input
                type="text"
                id="modalRoleName"
                name="name"
                class="form-control"
                placeholder="Nombre"
                tabindex="-1"
                data-msg="Ingresa un nombre"
              />
            </div>
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Lo sentimos!</strong> Hay problemas con la información que registras.<br><br>
                      <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                      </ul>
                  </div>
              @endif
            <div class="col-12">
              <h4 class="mt-2 pt-50">Permisos</h4>
              <!-- Permission table -->
              <div class="table-responsive">
                <table class="table table-flush-spacing">
                  <tbody>
                    <tr>
                      <td class="text-nowrap fw-bolder">
                        Acceso admin
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Permite todos los permisos">
                          <i data-feather="info"></i>
                        </span>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="selectAll" />
                          <label class="form-check-label" for="selectAll"> Seleccionar todo </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                        <div class="row">
                      @foreach($permission as $value)
                      <div class="col-md-3"><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                          {{ $value->name }}</label></div>
                      <br/>
                      @endforeach

                    </div>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- Permission table -->
            </div>
            <div class="col-12 text-center mt-2">
              <button type="submit" class="btn btn-primary me-1">Guardar</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                Descartar
              </button>
            </div>
          </form>
          <!--/ Add role form -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Add Role Modal -->

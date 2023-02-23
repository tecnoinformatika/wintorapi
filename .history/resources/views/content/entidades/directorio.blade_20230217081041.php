@extends('layouts/contentLayoutMaster')

@section('title', 'Directorio de la entidad')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">

@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img
                class="img-fluid rounded mt-3 mb-2"
                src="/storage/{{$entidad->logo}}"
                height="110"
                width="110"
                alt="User avatar"
              />
              <div class="user-info text-center">
                <h4>{{$entidad->nombre}}</h4>
                <span class="badge bg-light-primary">{{$entidad->tipoentidad}}</span>
              </div>
            </div>
          </div>
          {{-- <div class="d-flex justify-content-around my-2 pt-75">
            <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">1.23k</h4>
                <small>Tasks Done</small>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">568</h4>
                <small>Projects Done</small>
              </div>
            </div>
          </div> --}}
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalles</h4>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-75">
                <span class="fw-bolder me-25">Introducción:</span>
                <span>{{$entidad->descripcion}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Link de la página:</span>
                <a href="{{$entidad->linkpagina}}" target="_blank">{{$entidad->linkpagina}}</a>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Link de los pqrsd:</span>
                <a href="{{$entidad->linkpqrsd}}" target="_blank">{{$entidad->linkpqrsd}}</a>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Fecha de creación:</span>
                <span>{{$entidad->created_at}}</span>
              </li>

            </ul>
            <div class="d-flex justify-content-center pt-2">
              <a href="javascript:;" class="btn btn-primary me-1" id="editentidad" data-bs-target="#editUser" data-bs-toggle="modal" data-id="{{$entidad->id}}">
                Editar
              </a>

            </div>
          </div>
        </div>
      </div>
      <!-- /User Card -->
      <!-- Plan Card -->

      <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="home-tab-center"
                  data-bs-toggle="tab"
                  href="#home-center"
                  aria-controls="home-center"
                  role="tab"
                  aria-selected="true"
                  >Líneas telefónicas</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link "
                  id="service-tab-center"
                  data-bs-toggle="tab"
                  href="#service-center"
                  aria-controls="service-center"
                  role="tab"
                  aria-selected="false"
                  >Correos de la entidad</a
                >
              </li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="home-center" aria-labelledby="home-tab-center" role="tabpanel">
                <div class="card">
                  <h4 class="card-header">Líneas telefónicas</h4>

                  <div class="table-responsive">

                    <table class="table datatable-telefonos" id="telefonos">
                      <thead>
                        <tr>
                          <th></th>
                          <th>nombre</th>
                          <th class="text-nowrap">línea</th>
                          <th>Opción</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="service-center" aria-labelledby="service-tab-center" role="tabpanel">
                <div class="card">
                  <h4 class="card-header">Correos de interes</h4>
                  <div class="table-responsive">
                    <table class="table datatable-correos" id="correos">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Correo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!--/ User Pills -->

      <!-- Project table -->

      <!-- /Project table -->


      <!-- /Invoice table -->
    </div>
    <!--/ User Content -->
  </div>

  <div class="modal modal-slide-in new-user-modal fade" id="modals-crear-linea">
    <div class="modal-dialog">
      <form class="add-new-user modal-content pt-0" id="data" method="post" action="/entidad/crearLinea" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="entidad_id" value="{{ $entidad->id }}">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Agregar linea telefónica</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="mb-1">
            <label class="form-label" for="nombre">Nombre</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="nombre"
              placeholder="Nombre de la entidad"
              name="nombre"
            />
          </div>

          <div class="mb-1">
            <label class="form-label" for="linea">linea</label>
            <input
              type="text"
              id="linea"
              class="form-control dt-contact"
              placeholder="link o enlace referente"
              name="linea"
            />
          </div>
          <div class="mb-1">
            <label class="form-label" for="linkpqrsd">Opcion</label>
            <input
              type="text"
              id="linkpqrsd"
              class="form-control dt-contact"
              placeholder="link o enlace referente"
              name="opcion"
            />
          </div>


          <button type="submit" class="btn btn-primary me-1 data-submit">Guardar</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal modal-slide-in new-user-modal fade" id="modals-editar-linea">
    <div class="modal-dialog">
      <form class="add-new-user modal-content pt-0" id="data1" action="/entidad/editarLinea" method="POST" enctype="multipart/form-data">
        {{ method_field('POST') }}
        @csrf
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Editar linea telefónica</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <input type="hidden" id="id2" name="id2">
          <div class="mb-1">
            <label class="form-label" for="nombre2">Nombre</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="nombre2"
              placeholder="Nombre"
              name="nombre"
            />
          </div>

          <div class="mb-1">
            <label class="form-label" for="linea2">Línea</label>
            <input
              type="text"
              id="linea2"
              class="form-control dt-contact"
              placeholder="Linea telefónica"
              name="linea"
            />
          </div>
          <div class="mb-1">
            <label class="form-label" for="opcion2">Opción</label>
            <input
              type="text"
              id="opcion2"
              class="form-control dt-contact"
              placeholder="opcion o extención"
              name="opcion"
            />
          </div>

          <button class="btn btn-primary me-1 data-submit">Guardar</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal modal-slide-in new-user-modal fade" id="modals-crear-correo">
    <div class="modal-dialog">
      <form class="add-new-user modal-content pt-0" id="data" method="post" action="/entidad/crearCorreo" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="entidad_id" value="{{ $entidad->id }}">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Agregar correo electrónico</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="mb-1">
            <label class="form-label" for="nombre">Nombre</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="nombre"
              placeholder="Nombre de la entidad"
              name="nombre"
            />
          </div>

          <div class="mb-1">
            <label class="form-label" for="linea">correo</label>
            <input
              type="text"
              id="correo"
              class="form-control dt-contact"
              placeholder="link o enlace referente"
              name="correo"
            />
          </div>


          <button type="submit" class="btn btn-primary me-1 data-submit">Guardar</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal modal-slide-in new-user-modal fade" id="modals-editar-correo">
    <div class="modal-dialog">
      <form class="add-new-user modal-content pt-0" id="data1" action="/entidad/editarCorreo" method="POST" enctype="multipart/form-data">
        {{ method_field('POST') }}
        @csrf
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Editar linea telefónica</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <input type="hidden" id="id3" name="id3">
          <div class="mb-1">
            <label class="form-label" for="nombre2">Nombre</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="nombre3"
              placeholder="Nombre"
              name="nombre"
            />
          </div>

          <div class="mb-1">
            <label class="form-label" for="linea2">Correo</label>
            <input
              type="text"
              id="correo3"
              class="form-control dt-contact"
              placeholder="Correo electrónico"
              name="correo"
            />
          </div>

          <button class="btn btn-primary me-1 data-submit">Guardar</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</section>

@include('content/_partials/_modals/modal-edit-user')
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script>
     $(document).ready(function(){
        cargar();
        $('#telefonos').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                    {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Exportar',
                    buttons: [
                        {
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Imprimir',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copiar',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2, 3] }
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Agregar nueva linea',
                    className: 'create-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#modals-crear-linea'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ]
        } );
        $('#correos').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                    {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Exportar',
                    buttons: [
                        {
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Imprimir',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2] }
                        },
                        {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2] }
                        },
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2] }
                        },
                        {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2] }
                        },
                        {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copiar',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1, 2] }
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Agregar nuevo correo',
                    className: 'create-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#modals-crear-correo'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ]
        } );
    });

    $('body').on('click', '#edit-lineas', function () {
      var entidad_id = $(this).data('id');

      $.get('/entidad/lineatelefonica/'+entidad_id, function (data) {
      $('#id2').val(data.id);
      $('#nombre2').val(data.nombre);
      $('#linea2').val(data.linea);
      $('#opcion2').val(data.opcion);
      });

    });
    $('body').on('click', '#edit-correos', function () {
      var entidad_id = $(this).data('id');

      $.get('/entidad/correo/'+entidad_id, function (data) {
      $('#id3').val(data.id);
      $('#nombre3').val(data.nombre);
      $('#correo3').val(data.correo);
      });

    });



    var confirmText = $('#eliminar');

    $('body').on('click', '#eliminar-linea', function () {
      var entidad_id = $(this).data('id');
        Swal.fire({
          title: 'Estas seguro?',
          text: "Esta acción es irreversible!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, eliminar esto!',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
          },
          buttonsStyling: false
        }).then(function (result) {
           /* Read more about isConfirmed, isDenied below */
           if (result.isConfirmed) {
                  $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/entidad/eliminarLinea/'+ entidad_id,
                    data: {
                      '_method': 'post'
                    },
                    success: function (response, textStatus, xhr) {
                      Swal.fire({
                        icon: 'success',
                          title: response,
                          showDenyButton: false,
                          showCancelButton: false,
                          confirmButtonText: 'Yes'
                      }).then((result) => {
                       cargar();
                      });
                    }
                  });
                }
              });

            });
            $(document).ready(function(){

    });
    $('body').on('click', '#eliminar-correo', function () {
      var entidad_id = $(this).data('id');
        Swal.fire({
          title: 'Estas seguro?',
          text: "Esta acción es irreversible!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, eliminar esto!',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
          },
          buttonsStyling: false
        }).then(function (result) {
           /* Read more about isConfirmed, isDenied below */
           if (result.isConfirmed) {
                  $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/entidad/eliminarCorreo/'+ entidad_id,
                    data: {
                      '_method': 'post'
                    },
                    success: function (response, textStatus, xhr) {
                      Swal.fire({
                        icon: 'success',
                          title: response,
                          showDenyButton: false,
                          showCancelButton: false,
                          confirmButtonText: 'Yes'
                      }).then((result) => {
                       cargar();
                      });
                    }
                  });
                }
              });

            });
            $(document).ready(function(){

    });

    function cargar(){


        $.ajax({
            type: "GET",
            url: "/entidad/lineastelefonicas/"+{{ $entidad->id}},
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                $("#telefonos > tbody").empty();//limpia solo los registros del body
                $.each(data, function (i, item) {
                var rows ="<tr>" +
                            "<td id='id1'>" + item.id + "</td>" +
                            "<td id='nombre'>" + item.nombre + "</td>" +
                            "<td id='telefono'>" + item.linea + "</td>" +
                            "<td id='opcion'>" + item.opcion + "</td>" +
                            "<td>"+
                                   "<a href='#' class='delete-record' id='eliminar-linea' data-id='"+item.id+"'>" +
                                        "</i>" +
                                        "Eliminar"+
                                    "</a><br>" +

                                "<a href='#' data-bs-toggle='modal' data-bs-target='#modals-editar-linea' data-id='"+item.id+"' id='edit-lineas' 'class='item-edit'>" +
                                "Editar" +
                                "</a>"
                            "</td>"+
                        "</tr>";
                    $('#telefonos tbody').append(rows);
                });
            },

            failure: function (data) {
                alert(data.responseText);
            },
            error: function (data) {
                alert(data.responseText);
            }

        });
        $.ajax({
            type: "GET",
            url: "/entidad/correos/"+{{ $entidad->id}},
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                $("#correos > tbody").empty();//limpia solo los registros del body
                $.each(data, function (i, item) {
                var rows ="<tr>" +
                            "<td >" + item.id + "</td>" +
                            "<td >" + item.nombre + "</td>" +
                            "<td >" + item.correo + "</td>" +
                            "<td>"+
                                   "<a href='#' class='delete-record' id='eliminar-correo' data-id='"+item.id+"'>" +
                                        "</i>" +
                                        "Eliminar"+
                                    "</a><br>" +

                                "<a href='#' data-bs-toggle='modal' data-bs-target='#modals-editar-correo' data-id='"+item.id+"' id='edit-correos' 'class='item-edit'>" +
                                "Editar" +
                                "</a>"
                            "</td>"+
                        "</tr>";
                    $('#correos tbody').append(rows);
                });
            },

            failure: function (data) {
                alert(data.responseText);
            },
            error: function (data) {
                alert(data.responseText);
            }

        });

    }

  </script>
@endsection

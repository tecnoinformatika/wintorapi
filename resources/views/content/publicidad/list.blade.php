@extends('layouts/contentLayoutMaster')

@section('title', 'Publicidad activa')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
@if(Session::get('success', false))
              <?php $data = Session::get('success'); ?>
              @if (is_array($data))
                  @foreach ($data as $msg)
                      <div class="alert alert-success" role="alert">
                          <i class="fa fa-check"></i>
                          {{ $msg }}
                      </div>
                  @endforeach
              @else
                  <div class="alert alert-success" role="alert">
                      <i class="fa fa-check"></i>
                      {{ $data }}
                  </div>
              @endif
            @endif
<!-- users list start -->
<section class="app-user-list">

  <!-- list and filter start -->
  <div class="card">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table id="entidades" class="table datatables-basic table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Duración</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                <div>
            </div>
        </div>
    </div>
    <!-- Modal to add new user starts-->
    <div class="modal modal-slide-in new-user-modal fade" id="modals-crear">
      <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" id="data" method="post" action="/publicidad/crear" enctype="multipart/form-data">

          @csrf

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Agregar publicidad</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="mb-1">
              <label class="form-label" for="nombre">Nombre</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="nombre"
                placeholder="Nombre de la publicidad"
                name="nombre"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="duracion">Duración</label>
              <input
                type="number"
                id="duracion"
                class="form-control dt-contact"
                placeholder="Duración de la publicidad"
                name="duracion"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="propietario">Propietario</label>
              <input
                type="text"
                id="propietario"
                class="form-control dt-contact"
                placeholder="Propietario de la publicidad"
                name="propietario"
              />
            </div>
            <div class="mb-1">
              <label for="customFile1" class="form-label">logo de la entidad</label>
              <input class="form-control" type="file" id="imagen_publicitaria" required="require" name="imagen_publicitaria">
            </div>


            <button type="submit" class="btn btn-primary me-1 data-submit">Guardar</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal modal-slide-in new-user-modal fade" id="modals-editar">
      <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" id="data1" action="/publicidad/editar" method="POST" enctype="multipart/form-data">
          {{ method_field('POST') }}
          @csrf
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Editar publicidad</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <input type="hidden" id="id1" name="id1">
            <div class="mb-1">
              <label class="form-label" for="nombre1">Nombre</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="nombre1"
                placeholder="Nombre de la publicidad"
                name="nombre"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="duracion1">Duración</label>
              <input
                type="number"
                id="duracion1"
                class="form-control dt-contact"
                placeholder="Duración de la publicidad"
                name="duracion"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="propietario1">Propietario</label>
              <input
                type="text"
                id="propietario1"
                class="form-control dt-contact"
                placeholder="Propietario de la publicidad"
                name="propietario"
              />
            </div>
            <img  id="imagen_publicitaria2" width="150px" style="background-color: #fff" alt="">
            <div class="mb-1">
              <label for="customFile1" class="form-label">logo de la entidad</label>
              <input class="form-control" type="file" id="imagen_publicitaria1"  name="imagen_publicitaria1">
            </div>

            <button class="btn btn-primary me-1 data-submit">Guardar</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal to add new user Ends-->


  </div>
  <!-- list and filter end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

@endsection

@section('page-script')

  {{-- Page js files --}}
  <script>
     $(document).ready(function(){
      cargar();
    });

    $('body').on('click', '#edit-entidades1', function () {
      var entidad_id = $(this).data('id');

      $.get('/publicidad/publicidad/'+entidad_id, function (data) {
      console.log(data);
      $('#btn-update').val("Update");
      $('#id1').val(data.id);
      $('#nombre1').val(data.nombre);
      $('#duracion1').val(data.duracion);
      $('#propietario1').val(data.propietario);
      $('#imagen_publicitaria2').attr("src","/storage/"+ data.imagen);
      });

    });


    var confirmText = $('#eliminar');

    $('body').on('click', '#eliminar', function () {
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
                    url: 'delete/'+ entidad_id,
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
                        window.location='/publicidad/list'
                      });
                    }
                  });
                }
              });

            });

    function cargar(){

      var dt_basic_table = $('.datatables-basic');
      var assetPath = '../../../app-assets/';

      if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
      }
      if (dt_basic_table.length) {

        var dt_basic = dt_basic_table.DataTable({
          ajax: assetPath + 'publicidad/listado',
          columns: [
            { data: 'id' }, // used for sorting so will hide this column
            { data: 'imagen' },
            { data: 'nombre' },
            { data: 'duracion' },
            { data: 'propietario' },
            { data: '' }
          ],

          columnDefs: [
            {
              responsivePriority: 0,
              targets: 0,
              render: function (data, type, full, meta) {

                return full['id'];
              }
            },
            {
              // Avatar image/badge, Name and post
              targets: 1,
              responsivePriority: 1,
              render: function (data, type, full, meta) {
                console.log(data);
                var $user_img = full['imagen'];

                  // For Avatar image
                  var $output =
                    '<img src="/storage/'+ $user_img +'" alt="Avatar" height="32">';



                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-left align-items-center">' +
                  '<div class="avatar ' +
                  ' me-1">' +
                  $output +
                  '</div>' +

                  '</div>';
                return $row_output;
              }
            },
            {
              responsivePriority: 2,
              targets: 2,
              render: function (data, type, full, meta) {

                return full['nombre'];
              }
            },
            {
              responsivePriority: 3,
              targets: 3,
              render: function (data, type, full, meta) {

                return full['duracion'];
              }
            },
            {
              // Label
              targets: 4,
              render: function (data, type, full, meta) {

                return full['propietario'];
                }
            },
            {
              // Actions
              targets: 5,
              orderable: false,
              render: function (data, type, full, meta) {
                return (
                  '<div class="d-inline-flex">' +
                  '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                  '</a>' +
                  '<div class="dropdown-menu dropdown-menu-end">' +

                  '<a href="javascript:;" class="dropdown-item delete-record" id="eliminar" data-id="'+ full['id']+'">' +
                  feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
                  'Eliminar</a>' +
                  '</div>' +
                  '</div>' +
                  '<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modals-editar" data-id="'+ full['id']+'" id="edit-entidades1" "class="item-edit">' +
                  feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                  '</a>'
                );
              }
            }
          ],
          order: [[2, 'desc']],
          dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 7,
          lengthMenu: [7, 10, 25, 50, 75, 100],
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
              text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Agregar nueva entidad',
              className: 'create-new btn btn-primary',
              attr: {
                'data-bs-toggle': 'modal',
                'data-bs-target': '#modals-crear'
              },
              init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
              }
            }
          ],
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                  var data = row.data();
                  return 'Detalles de ' + data['nombre'];
                }
              }),
              type: 'column',
              renderer: function (api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                  return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                    ? '<tr data-dt-row="' +
                        col.rowIdx +
                        '" data-dt-column="' +
                        col.columnIndex +
                        '">' +
                        '<td>' +
                        col.title +
                        ':' +
                        '</td> ' +
                        '<td>' +
                        col.data +
                        '</td>' +
                        '</tr>'
                    : '';
                }).join('');

                return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
              }
            }
          },
          language: {
            paginate: {
              // remove previous & next text from pagination
              previous: '&nbsp;',
              next: '&nbsp;'
            }
          }
        });
        $('div.head-label').html('<h6 class="mb-0">listado de publicidades activas</h6>');
      }
    }


  </script>
@endsection

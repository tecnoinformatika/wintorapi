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
                  class="nav-link"
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
                  class="nav-link active"
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
              <div class="tab-pane" id="home-center" aria-labelledby="home-tab-center" role="tabpanel">
                <div class="card">
                  <h4 class="card-header">Líneas telefónicas</h4>
                  <div class="table-responsive">
                    <table class="table datatable-telefonos">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Project</th>
                          <th class="text-nowrap">Total Task</th>
                          <th>Progress</th>
                          <th>Hours</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane active" id="service-center" aria-labelledby="service-tab-center" role="tabpanel">
                <div class="card">
                  <h4 class="card-header">Correos de interes</h4>
                  <div class="table-responsive">
                    <table class="table datatable-correos">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Project</th>
                          <th class="text-nowrap">Total Task</th>
                          <th>Progress</th>
                          <th>Hours</th>
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
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script>
     $(document).ready(function(){    
      cargar();
    });

    $('body').on('click', '#edit-entidades1', function () {
      var entidad_id = $(this).data('id');
      
      $.get('/entidad/entidad/'+entidad_id, function (data) {
      console.log(data);
      $('#btn-update').val("Update");
      $('#id1').val(data.id);
      $('#nombre1').val(data.nombre);
      $('#descripcion1').val(data.descripcion);
      $('#tipoentidad1').val(data.tipoentidad);
      $('#linkpagina1').val(data.linkpagina);
      $('#linkpqrsd1').val(data.linkpqrsd);
      $('#logo2').attr("src","/storage/"+ data.logo);
      $('#banner2').attr("src","/storage/"+ data.banner);
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
                        window.location='/entidad/list'
                      });
                    }
                  });
                }
              });

            });
    
    function cargar(){
      $("#entidades > tbody").empty();//limpia solo los registros del body

      var dt_basic_table = $('.datatables-basic');
      var assetPath = '../../../app-assets/';
      
      if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
      }
      if (dt_basic_table.length) {
        
        var dt_basic = dt_basic_table.DataTable({
          ajax: assetPath + 'entidad/listado',
          columns: [
            { data: 'id' }, // used for sorting so will hide this column
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: '' },
            { data: '' }
          ],
          columnDefs: [                     
            {
              responsivePriority: 1,
              targets: 0,
              render: function (data, type, full, meta) {
               
                return full['id'];
              }
            },
            {
              // Avatar image/badge, Name and post
              targets: 1,
              responsivePriority: 2,
              render: function (data, type, full, meta) {
                
                var $user_img = full['logo'],
                  $name = full['nombre'];
            
                  // For Avatar image
                  var $output =
                    '<img src="/storage/'+ $user_img +'" alt="Avatar" height="32">';
              

                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-left align-items-center">' +
                  '<div class="avatar ' +
                  colorClass +
                  ' me-1">' +
                  $output +
                  '</div>' +
        
                  '</div>';
                return $row_output;
              }
            },
            {
              responsivePriority: 3,
              targets: 2,
              render: function (data, type, full, meta) {
               
                return full['nombre'];
              }
            },
            {
              responsivePriority: 3,
              targets: 3,
              render: function (data, type, full, meta) {
               
                return full['descripcion'];
              }
            },
            {
              // Label
              targets: 4,
              render: function (data, type, full, meta) {               
               
                var $status_number = full['tipoentidad'];
                var $status = {
                  'Pública' : { title: 'Pública', class: 'badge-light-primary' },
                  'Financiera' : { title: 'Financiera', class: ' badge-light-success' },
                  'Servicios' : { title: 'Servicios', class: ' badge-light-info' }
                };
                if (typeof $status[$status_number] === 'undefined') {
                  return data;
                }
                return (
                  '<span class="badge rounded-pill ' +
                  $status[$status_number].class +
                  '">' +
                  $status[$status_number].title +
                  '</span>'
                );
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
                  '<a href="directorio/'+full['id']+'" class="dropdown-item" >' +
                  feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
                  'Detalles</a>' +                 
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
        $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
      }
    }

  </script>
@endsection

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
      <div class="card border-primary">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <span class="badge bg-light-primary">Standard</span>
            <div class="d-flex justify-content-center">
              <sup class="h5 pricing-currency text-primary mt-1 mb-0">$</sup>
              <span class="fw-bolder display-5 mb-0 text-primary">99</span>
              <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2">/month</sub>
            </div>
          </div>
          <ul class="ps-1 mb-2">
            <li class="mb-50">10 Users</li>
            <li class="mb-50">Up to 10 GB storage</li>
            <li>Basic Support</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
            <span>Days</span>
            <span>4 of 30 Days</span>
          </div>
          <div class="progress mb-50" style="height: 8px">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 80%"
              aria-valuenow="65"
              aria-valuemax="100"
              aria-valuemin="80"
            ></div>
          </div>
          <span>4 days remaining</span>
          <div class="d-grid w-100 mt-2">
            <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
              Upgrade Plan
            </button>
          </div>
        </div>
      </div>
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
                  >Home</a
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
                  >Service</a
                >
              </li>             
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="account-tab-center"
                  data-bs-toggle="tab"
                  href="#account-center"
                  aria-controls="account-center"
                  role="tab"
                  aria-selected="false"
                  >Account</a
                >
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="home-center" aria-labelledby="home-tab-center" role="tabpanel">
                <p>
                  Pie fruitcake lollipop. Chupa chups apple pie marzipan danish soufflé soufflé oat cake gingerbread.
                  Bonbon jujubes donut gummies sesame snaps cookie gingerbread cotton candy pastry. Biscuit sugar plum
                  jelly-o tootsie roll gummies cookie croissant cotton candy. Bear claw lollipop liquorice chocolate
                  topping dessert macaroon dessert dragée.
                </p>
                <p>
                  Jelly-o gingerbread chocolate carrot cake chocolate soufflé cake macaroon cheesecake. Donut sesame snaps
                  bear claw. Chocolate bar tootsie roll sweet wafer chocolate cake dessert icing. Cotton candy chocolate
                  bar soufflé lollipop. Jelly beans cookie sesame snaps donut.
                </p>
              </div>
              <div class="tab-pane active" id="service-center" aria-labelledby="service-tab-center" role="tabpanel">
                <p>
                  Lemon drops caramels macaroon muffin. Icing chupa chups cupcake chupa chups cheesecake chocolate cake
                  jelly marzipan. Candy icing apple pie powder dragée bear claw sweet roll. Dragée liquorice ice cream
                  jujubes. Lemon drops lollipop donut cupcake macaroon icing. Wafer lemon drops jelly. Bear claw candy
                  wafer wafer jelly cake biscuit.
                </p>
                <p>
                  Liquorice tootsie roll cheesecake muffin chupa chups toffee toffee. Pie sesame snaps biscuit sweet roll.
                  Tiramisu cake oat cake croissant halvah candy brownie croissant. Bonbon sugar plum muffin tart brownie
                  macaroon lollipop dragée. Jujubes halvah cheesecake.
                </p>
              </div>
              <div class="tab-pane" id="account-center" aria-labelledby="account-tab-center" role="tabpanel">
                <p>
                  Danish tiramisu donut chocolate bar. Toffee oat cake candy toffee pudding soufflé lemon drops. Gummi
                  bears cake oat cake. Tiramisu sugar plum sugar plum cake marzipan cake. Wafer muffin marshmallow biscuit
                  oat cake sweet roll danish. Chocolate jelly topping dessert donut. Cheesecake jelly-o carrot cake carrot
                  cake candy canes jelly.
                </p>
                <p>
                  Wafer chocolate caramels jujubes biscuit powder marzipan. Lollipop gingerbread muffin. Tiramisu brownie
                  tart marshmallow wafer sweet caramels croissant chocolate bar. Sweet marzipan toffee muffin sugar plum
                  marzipan. Soufflé bear claw muffin cake powder danish dragée.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link active" href="{{asset('app/user/view/account')}}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Account</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/security')}}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Security</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/billing')}}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Billing & Plans</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/notifications')}}">
            <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">Notifications</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/connections')}}">
            <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">Connections</span>
          </a>
        </li>
      </ul>
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

  <script>
    

  </script>
@endsection

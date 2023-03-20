@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection
@section('content')
<h3>Roles List</h3>
<p class="mb-2">
  Un ROL provee acceso a una persona a realizar ciertas funciones dentro de la plataforma <br />
  Un administrador podría accedera todas las funciones
</p>

<!-- Role cards -->
<div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 @foreach ( $roles as $rol )
 <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>Total 4 users</span>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="top"
              title="Vinnie Mostowy"
              class="avatar avatar-sm pull-up"
            >
              <img class="rounded-circle" src="{{asset('images/avatars/2.png')}}" alt="Avatar" />
            </li>
            <li
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="top"
              title="Allen Rieske"
              class="avatar avatar-sm pull-up"
            >
              <img class="rounded-circle" src="{{asset('images/avatars/12.png')}}" alt="Avatar" />
            </li>
            <li
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="top"
              title="Julee Rossignol"
              class="avatar avatar-sm pull-up"
            >
              <img class="rounded-circle" src="{{asset('images/avatars/6.png')}}" alt="Avatar" />
            </li>
            <li
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="top"
              title="Kaith D'souza"
              class="avatar avatar-sm pull-up"
            >
              <img class="rounded-circle" src="{{asset('images/avatars/11.png')}}" alt="Avatar" />
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
          <div class="role-heading">
            <h4 class="fw-bolder">{{ $rol->name }}</h4>
            <a href="/editroles/{{ $rol->id }}" class="role-edit-modal">

                <small class="fw-bolder">Edit Role</small>

            </a>
          </div>
          <a href="javascript:void(0);" class="text-body"></a>
        </div>
      </div>
    </div>
  </div>
 @endforeach
 @can('role-create')
 <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="row">
        <div class="col-sm-5">
          <div class="d-flex align-items-end justify-content-center h-100">
            <img
              src="{{asset('images/illustration/faq-illustrations.svg')}}"
              class="img-fluid mt-2"
              alt="Image"
              width="85"
            />
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <a
              href="javascript:void(0)"
              data-bs-target="#addRoleModal"
              data-bs-toggle="modal"
              class="stretched-link text-nowrap add-new-role"
            >
              <span class="btn btn-primary mb-1">Agregar nuevo ROL</span>
            </a>
            <p class="mb-0">Permite agregar un nuevo ROL</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endcan
</div>
<!--/ Role cards -->


@include('content/_partials/_modals/modal-add-role')
@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/modal-add-role.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-access-roles.js')) }}"></script>
@endsection


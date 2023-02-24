@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Un link de verificación ha sido enviado a su correo
            </div>
        @endif

        Antes de proceder, porfavor verifique su email para obtener su link de verificación. si aun no lo recibes,
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0">
                Click aquí para generar otro
            </button>.
        </form>
    </div>
@endsection

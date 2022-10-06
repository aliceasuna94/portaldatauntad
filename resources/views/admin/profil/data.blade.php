@extends('admin.layout.index')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Prodi /</span> Pangkalan Data </h4>

<!--INCLUDE -->
@include('trait._error')
@include('trait._success')

@include('admin.profil._data_mahasiswa')
@include('admin.profil._data_dosen')

@endsection
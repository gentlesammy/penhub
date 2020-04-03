@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT Visibility</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Visibility</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 visiblebox py-5 bg-black">

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script src="https://cdn.tiny.cloud/1/wtiq79cjzidqv1f2ogpv1kjy8un1zdsp4977km757nuhxhsi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
        selector: 'textarea',
        height : "480",

      });
    </script>
@endsection

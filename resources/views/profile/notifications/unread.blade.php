@extends('layouts.profile')

@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Unread Notifications</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{Route('profileemailhome')}}">inbox</a></li>
                    <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container py-0">

            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script>


  </script>

  @endsection


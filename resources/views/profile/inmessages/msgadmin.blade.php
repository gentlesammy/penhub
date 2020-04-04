@extends('layouts.profile')

@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Message</h1>
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
                <div class="row py-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{Route('profileemailadminupdate')}}" method="post">
                            @csrf
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Message Admin</h3>
                          </div>
                          @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('flash_message')}}</strong>
                            </div>

                          @endif
                          <!-- /.card-header -->

                          <div class="card-body">
                            <div class="form-group">
                                <input name="email" class="form-control"  value="To: Administrator" readonly>
                            </div>
                            <div class="form-group">
                              <input name="subject" class="form-control" placeholder="Subject:" value="{{@old('subject')}}">
                              <p class="text-danger">
                                @error('subject')
                                    {{$message}}
                                @enderror
                            </p>
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="compose-textarea" class="form-control" style="height: 300px">
                                    {{@old('body')}}
                                </textarea>
                                <p class="text-danger">
                                    @error('body')
                                        {{$message}}
                                    @enderror
                                </p>
                            </div>

                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <div class="float-right">
                              <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                          </div>
                          <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </form>
                      </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script>


  </script>

  @endsection

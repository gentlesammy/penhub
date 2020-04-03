@extends('layouts.profile')

@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Message Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{Route('profileemailhome')}}">inbox</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Message From {{$inMessage->sender->name}}</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <div class="mailbox-read-info">
                              <h5>{{$inMessage->subject}}</h5>
                              <h6>Email: {{$inMessage->sender->email}}
                                <span class="mailbox-read-time float-right">{{$inMessage->created_at->format('l  M, Y H:i')}}</span></h6>
                            </div>
                            <div class="mailbox-read-message py-5">
                                {{$inMessage->body}}
                            </div>
                            <!-- /.mailbox-read-message -->
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script>
    $(function () {
      $("#mailtable").DataTable({
        "ordering": false,
      });
    });
  </script>

  @endsection

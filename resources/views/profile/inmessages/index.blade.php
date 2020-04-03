@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inbox</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Message</li>
                    <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container py-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Inbox</h3>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <div class="table-responsive mailbox-messages p-2">
                              <table class="table table-hover table-striped" id="mailtable">
                                <thead>
                                    <tr>
                                        <td>SN</td>
                                        <td>From</td>
                                        <td>Subject</td>
                                        <td>Time</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1;?>
                                    @foreach($receivedmail as $rmail)
                                        <tr>
                                            <td>
                                                {{$sn++}}
                                            </td>
                                            <td class="mailbox-name">
                                                <a href="{{Route('profileemailshow', ['inMessage'=>$rmail->id])}}">{{$rmail->sender->name}}</a>
                                            </td>
                                            <td class="mailbox-subject">
                                                <b>{{$rmail->subject}}</b> - {{str_limit($rmail->body, 50)}}
                                            </td>
                                            <td class="mailbox-date">{{$rmail->created_at->diffForHumans()}}</td>
                                        </tr>

                                    @endforeach


                                </tbody>
                              </table>
                              <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer p-0">
                            <div class="mailbox-controls">
                              <!-- Check all button -->

                            </div>
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


@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ALL SERIES</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content content2">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Here are Series You created</h3>

                          @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('flash_message')}}</strong>
                            </div>

                          @endif





                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-4">
                          <table class="table table-hover text-nowrap table-dark" id="allseries">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Series Title</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Episode </th>
                                <th>Status</th>
                                <th>Summary</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                @foreach (auth()->user()->series as $series)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$series->title}}</td>
                                        <td>{{$series->created_at->format('d M, Y')}}</td>
                                        <td>{{$series->category->title}}</td>
                                        <td class="text-center">{{$series->episodes->count()}}</td>
                                        <td><span class="tag tag-success">Approved
                                            @if($series->active === 0)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </span></td>
                                        <td>{{str_limit($series->summary, 100)}}</td>

                                        <td>

                                            <a href="{{Route('profileseriesshow', ['series'=>$series->id])}}">Detail</a>
                                            &nbsp;
                                            @can('update', $series)
                                                <a href="{{Route('profileseriesedit', ['series'=>$series->id])}}">Edit</a>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach






                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
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
      $("#allseries").DataTable({
        "ordering": false,
      });
    });
  </script>

  @endsection

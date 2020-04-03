
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ALL EPISODES</h1>
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
                          <h3 class="card-title">Here are Episodes You created</h3>
                          @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('flash_message')}}</strong>
                            </div>
                          @endif


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">

                          <table class="table table-hover text-nowrap table-dark" id="allepisodes">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Episode Title</th>
                                <th>Series</th>
                                <th>Episode Body</th>
                                <th>Published Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1;   ?>
                                @foreach ($episodes as $episode)
                                    @can('view', $episode)
                                        <tr>
                                            <td>{{$sn++}}</td>
                                            <td>{{$episode->title}}</td>
                                            <td>{{$episode->series->title}}</td>
                                            <td>{{str_limit($episode->body, 100)}}</td>
                                            <td>
                                                {{$episode->published()}}
                                            </td>
                                            <td class="text-center">
                                                <a href="/pepisodes/detail/{{$episode->slug}}" class="btn btn-sm btn-link">Detail</a>
                                                @can('update', $episode->series)
                                                    &nbsp;
                                                    <a href="/pepisodes/edit/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Edit</a>

                                                @endcan
                                                @can('update', $episode->series)
                                                    @if ($episode->published ===0)
                                                        &nbsp;
                                                         <a href="/pepisodes/publish/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Publish</a>
                                                     @else
                                                     &nbsp;
                                                        <a href="/pepisodes/unpublish/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Unpublish</a>
                                                     @endif
                                                @endcan

                                            </td>

                                        </tr>




                                    @endcan

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
      $("#allepisodes").DataTable({
        "ordering": false,
      });
    });
  </script>

  @endsection




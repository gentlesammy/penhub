@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ALL SERIES</h2>
                <a href="{{Route('adSeriesCreate')}}" class="btn btn-primary btn-sm">CREATE SERIES</a>
                @if(Session::has('flash_message'))
                <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3">
                    <h3 class="">{{Session::get('flash_message')}}</h3>
                </div>
                @endif

                </div>

                <div class="card-body table-responsive">
                    <table class="table">
                        <thead class="table-head" style="font-weight:600;">
                            <tr>
                                <td>S/N</td>
                                <td>SERIES TITLE</td>
                                <td style="width: 40%;">Series Summary</td>
                                <td>Category</td>
                                <td>Author</td>
                                <td>Action</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($series->count() >0)
                                @foreach ($series as $seri)
                                    <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$seri->title}}</td>
                                    <td>{!!$seri->summary!!}</td>
                                    <td>{{$seri->Category->title}}</td>
                                    <td>{{$seri->User->name}}</td>
                                    <td class="d-flex align-items-center h-100">
                                        <a href="/admin/series/view/{{$seri->id}}-{{str_slug($seri->title)}}" class="btn btn-sm btn-info">Detail</a>
                                        @can('update', $seri)
                                            &nbsp;
                                            <a href="/admin/series/edit/{{$seri->id}}-{{str_slug($seri->title)}}" class="btn btn-sm btn-info my-2">Edit</a>
                                        @endcan
                                    </td>
                                    </tr>


                                @endforeach
                                {{$series->links()}}
                            @else

                                <h3 class="text-center text-danger py-5">No Series Available currently</h3>

                            @endif



                        </tbody>




                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

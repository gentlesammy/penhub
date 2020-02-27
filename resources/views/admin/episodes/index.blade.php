@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ALL EPISODES</h2>
                <a href="{{Route('adEpisodesCreate')}}" class="btn btn-primary btn-sm">CREATE EPISODE</a>
                @if(Session::has('flash_message'))
                <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3">
                    <h3 class="">{{Session::get('flash_message')}}</h3>
                </div>
                @endif

                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-head" style="font-weight:600;">
                            <tr>
                                <td>S/N</td>
                                <td>Episode TITLE</td>
                                <td style="width: 40%;">Episode body</td>
                                <td>Series Title</td>
                                <td>Published</td>
                                <td style="width: 10%;">Action</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($episodes->count() >0)
                                @foreach ($episodes as $episode)
                                    <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$episode->title}}</td>
                                    <td>{{substr($episode->body, 0, 100)}}</td>
                                    <td>{{$episode->Series->title}}</td>
                                    <td>
                                        @if ($episode->published ===0)
                                            Unpublished
                                        @else
                                            Published
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    <a href="/admin/episodes/view/{{$episode->slug}}" class="btn btn-sm btn-link">Detail</a>
                                        @can('update', $episode->series)
                                            &nbsp;
                                            <a href="/admin/episodes/edit/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Edit</a>

                                        @endcan
                                        @can('update', $episode->series)
                                            @if ($episode->published ===0)
                                                &nbsp;
                                                 <a href="/admin/episodes/publish/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Publish</a>
                                             @else
                                             &nbsp;
                                             <a href="/admin/episodes/unpublish/{{$episode->id}}-{{str_slug($episode->title)}}" class="btn btn-sm btn-link my-2">Unpublish</a>
                                            @endif
                                        @endcan

                                    </td>
                                    </tr>


                                @endforeach
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



@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ALL COMMENTS</h2>
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
                                <td>Commenter</td>
                                <td style="width: 40%;">Body</td>
                                <td>Commented On</td>
                                <td>Author</td>
                                <td>Status</td>
                                <td style="width: 10%;">Action</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($comments->count() >0)
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$comment->User->name}}</td>
                                                <td>{{str_limit(($comment->body), 50)}}</td>
                                                <td>{{$comment->Episode->title}}</td>
                                                <td>{{$comment->Episode->Series->User->name}}</td>
                                                <td>
                                                    @if ($comment->approved == 0)
                                                        Unapproved
                                                    @else
                                                        Approved
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{Route('adCommentsDetail', $comment->id)}}" class="btn btn-info mb-2" target="_new">Detail</a>
                                                    @if ($comment->approved == 0)
                                                        <form action="/admin/comments/aprove/{{$comment->id}}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="submit" name="aprove" id="appcombtn" class="btn btn-primary" value="Aprrove comment">
                                                        </form>
                                                    @else
                                                        <form action="/admin/comments/unaprove/{{$comment->id}}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="submit" name="unaprove" id="appcombtn" class="btn btn-danger" value="Dissaprrove comment">
                                                        </form>
                                                    @endif

                                                    <form action="/admin/comments/remove/{{$comment->id}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" name="delete" id="deletecombtn" class="btn btn-danger mt-2" value="Delete">
                                                    </form>

                                                </td>

                                            </tr>

                                        @endforeach

                                {{$comments->links()}}
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
























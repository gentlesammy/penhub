
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center align-content align-content-center justify-content-center">
                    <h2> MESSAGES <span class="badge badge-dark badge-pill">{{$messages->count()}}</span></h2>
                    <a href="{{Route('adMessagesIndex')}}">UnRead Messages</a> &nbsp;
                    <a href="{{Route('adarchievedMessagesIndex')}}">Archieved Messages</a> &nbsp;
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
                                <td>Sender</td>
                                <td>Phone</td>
                                <td style="width: 40%;">Message</td>
                                <td>Date</td>
                                <td style="width: 10%;">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($messages->count() >0)
                                        @foreach($messages as $msg)
                                            <tr>
                                                <td> {{$sn++}}</td>
                                            <td>{{$msg->name}}</td>
                                            <td>{{$msg->phone}}</td>
                                            <td>{{$msg->messages}}</td>
                                            <td>{{$msg->created_at}}</td>
                                            <td>
                                            <a href="archieve/{{$msg->id}}-{{str_slug($msg->name)}}" class="btn btn-primary">Archieve</a>
                                            </td>
                                            </tr>
                                        @endforeach

                                {{$messages->links()}}
                            @else

                                <h3 class="text-center text-danger py-5">No read Messages currently, Check Archieve</h3>

                            @endif



                        </tbody>





                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


























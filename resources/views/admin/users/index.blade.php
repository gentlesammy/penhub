@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ALL Users</h2>
                    <p>***Note: You can only see Users below you in Rank</p>
                <a href="/admin/users" class="btn btn-primary btn-sm">All Users</a> &nbsp;
                <a href="/admin/users/?muted=1" class="btn btn-primary btn-sm">muted Users</a> &nbsp;
                <a href="/admin/users/?blocked=1" class="btn btn-primary btn-sm">Blocked Users</a> &nbsp;
                <a href="/admin/users/?role=3" class="btn btn-primary btn-sm">Moderators</a> &nbsp;
                <a href="/admin/users/?role=2" class="btn btn-primary btn-sm">Writers</a> &nbsp;
                <a href="/admin/users/?role=1" class="btn btn-primary btn-sm">Readers </a> &nbsp;

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
                                <td style="width: 40%;">Name</td>
                                <td>Email</td>
                                <td>Post</td>
                                <td>Muted</td>
                                <td>Blocked</td>
                                <td>Joined</td>
                                <td>Series </td>
                                <td style="width: 10%;">Action</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($users->count() >0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{\App\User::getUserRank($user->role)}}
                                        </td>
                                        <td class="text-center">
                                            @if($user->muted ===0)
                                                No
                                                <a href="{{Route('adMuteUsers', $user->id)}}" class="btn btn-danger">Mute</a>
                                            @else
                                                Yes
                                                <a href="{{Route('adUnmuteUsers', $user->id)}}" class="btn btn-primary">Unmute</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->blocked ===0)
                                                No
                                                <a href="{{Route('adBlockUsers', $user->id)}}" class="btn btn-danger">Block</a>
                                            @else
                                                Yes
                                                <a href="{{Route('adUnblockUsers', $user->id)}}" class="btn btn-primary">Unbock</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{$user->created_at}}
                                        </td>
                                        <td>

                                        </td>

                                        <td class="text-center">
                                            Edit
                                            <a href="/admin/users/view/{{$user->id}}" class="btn btn-primary">Detail</a>
                                        </td>




                                    </tr>
                                @endforeach
                            @else

                                <h3 class="text-center text-danger py-5">Empty</h3>

                            @endif



                        </tbody>




                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



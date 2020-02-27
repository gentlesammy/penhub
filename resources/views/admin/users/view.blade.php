@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>USER DETAIL</h2>
                    <p>***Note: You can Promote/Demote Current User Here</p>
                @if(Session::has('flash_message'))
                <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3">
                    <h3 class="">{{Session::get('flash_message')}}</h3>
                </div>
                @endif

                </div>

                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- user details and profile details goes here when i update profile table-->

                        </div>

                        <div class="col-md-6">
                            <!--user upgrade/downgrade form goes here -->
                            <form action="/admin/users/view/{{$user->id}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Current Rank') }}</label>

                                    <div class="col-md-6">
                                    <input id="text" type="text" class="form-control" name="role" value="{{$user->getUserRank($user->role)}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                    <div class="col-md-6">
                                        <select name="role" id="" class="form-control">
                                            <option value="1">Reader</option>
                                            <option value="2">Writer</option>
                                            <option value="3">Moderator</option>
                                            <option value="4">Admin</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Promote" class="btn-primary form-control">
                                </div>




                            </form>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



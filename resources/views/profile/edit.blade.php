
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
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
            <div class="container">
                <div class="row profileformarea">
                    <!-- space on either side -->
                    <div class="col-md-8  pb-2">
                        <!--form -->


                        <h4 class="py-2 text-center text-white">Edit PROFILE</h4>
                    <form action="{{Route('updateProfile', $profile->id)}}" method="post" class="bg-white p-3">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="UserName" class="col-md-4 col-form-label">{{ __('Username') }}</label>

                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$profile->username ??old('username') }}" required autocomplete="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Phone" class="col-md-4 col-form-label">{{ __('Phone Number') }}</label>
                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $profile->phone ??old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Description" class="col-md-4 col-form-label description">{{ __('Short Intro') }}</label>

                                <div class="col-md-8">
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $profile->description ??old('description') }}" required autocomplete="description">
                                        {{ $profile->description ??old('description') }}
                                    </textarea>
                                    <p>Word Count: <span id="textcount"> 0 </span> </p>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Facebook" class="col-md-4 col-form-label">{{ __('Facebook Link') }}</label>

                                <div class="col-md-8">
                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $profile->facebook ??old('facebook') }}" required autocomplete="facebook">

                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Titter" class="col-md-4 col-form-label">{{ __('Twitter link') }}</label>

                                <div class="col-md-8">
                                    <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $profile->twitter ?? old('twitter') }}" required autocomplete="twitter">

                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="showsocial" class="col-md-4 col-form-label">{{ __('Social Links Settings') }}</label>

                                <div class="col-md-8">
                                    <select class="form-control @error('showsocial') is-invalid @enderror" name="showsocial" value="{{ old('showsocial') }}" required autocomplete="showsocial">
                                        @if($profile->showsocial ==1)
                                        <option value="1">Display My social Media links on my Profile</option>
                                        @else
                                        <option value="0">Dont Display My social Media links</option>
                                        @endif
                                        <option value="1">Display My social Media links on my Profile</option>
                                        <option value="0">Dont Display My social Media links</option>
                                    </select>
                                    @error('showsocial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="showphone" class="col-md-4 col-form-label">{{ __(' Phone Number Settings') }}</label>

                                <div class="col-md-8">
                                    <select class="form-control @error('showphone') is-invalid @enderror" name="showphone" value="{{ old('showphone') }}" required autocomplete="showphone">
                                        @if($profile->showphone ==1)
                                        <option value="1">Display My Phone Number links on my Profile</option>
                                        @else
                                        <option value="0">Dont Display My Phone Number </option>
                                        @endif
                                        <option value="1">Display My Phone Number links on my Profile</option>
                                        <option value="0">Dont Display My Phone Number </option>
                                    </select>
                                    @error('showphone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="text-danger">
                                ***NOTE:    By submitting this form, you agree to all our terms and conditions included on this page
                                </p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" name="submitprofileform" class="btn btn-primary btn-block"  value="Update Profile">
                                </div>
                            </div>







                        </form>
                    </div>
                    <div class="col-md-4 pb-2">

                        <h4 class="py-2 text-center">*****</h4>
                        <div class="py-3 bg-white h-100 infoarea">
                            <h4 class="py-2 text-center">Reminder</h4>
                            <ol style="">
                                <li>We will never use Your information nor transfer it to anyone for marketting purpose</li>
                                <li>
                                    If You do not want Your social media links displayed on your profile/write ups kindly turn
                                    display social option off. You can change it anytime
                                </li>
                                <li>
                                    If you prefer that all your writing/ contribution not to show any link to you, kindly turn on the anonymous
                                    option. We will not display anything in your profile nor on any of your writing
                                </li>
                                <li>
                                    Your short intro will be displayed on your contributions and your profile. (unless you turned anonymous option on)
                                </li>
                                <li>
                                    If You do not want Your phone number displayed on your profile/write ups kindly turn
                                    display phone number option off. You can change it anytime
                                </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

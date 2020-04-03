@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT Episode</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Episode</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container py-5">
                <div class="row">

                  <div class="col-md-8  bg-white">
                    <h4 class="text-center text-primary">Edit and Update your Story</h4>
                    <form action="{{Route('profileepisodeupdate', ['episode' =>$episode->id, 'slug'=>$episode->slug])}}" method="post" enctype="multipart/form-data" class="p-2">
                     @csrf
                     @method('PATCH')
                       <div class="form-group">
                         <label for="exampleFormControlInput1">Episode Title</label>
                         <input type="text" class="form-control"  name="title" value="{{$episode->title ?? @old('title')}}">
                         <p class="text-danger">
                             @error('title')
                                 {{$message}}
                             @enderror
                         </p>
                       </div>

                       <div class="form-group">
                         <label for="exampleFormControlInput1">Episode for Series</label>

                         <select class="custom-select" id="validationTooltip04" name="series_id" required>
                            <option value="{{$episode->series->id}}">{{$episode->series->title}}</option>
                             @foreach (auth()->user()->series as $seri)
                                 <option value="{{$seri->id}}">{{$seri->title}}</option>

                             @endforeach
                         </select>

                         <p class="text-danger">
                             @error('series_id')
                                 {{$message}}
                             @enderror
                         </p>
                       </div>

                       <div class="form-group">
                         <label for="exampleFormControlTextarea1">Episode Body</label>
                         <textarea class="form-control" column="5" rows="5" name="body">{{$episode->body ?? @old('body')}}</textarea>
                         <p class="text-danger">
                             @error('body')
                                 {{$message}}
                             @enderror
                         </p>
                       </div>


                       <div class="form-group">
                         <button type="submit" class="btn btn-primary">Update Episode</button>
                       </div>


                    </form>
                  </div>

                  <div class="col-md-4 bg-dark text-white pb-2">
                    <h4 class="text-center mb-3">** Important Notice **</h4>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action active">
                            It is important to name your episode using the rules below
                        </li>
                        <li class="list-group-item text-dark">Your Series Name in capital</li>
                        <li class="list-group-item text-dark">Episode keyword in small letter</li>
                        <li class="list-group-item text-dark">Episode Number in word, small letter</li>
                        <li class="list-group-item text-dark">Example:<strong> AGES OF EMPIRE: episode four</strong></li>
                    </ul>

                    <ul class="list-group mt-2">
                        <li class="list-group-item list-group-item-action active">
                            Episode Body
                        </li>
                        <li class="list-group-item text-dark">It is suggested you type your story in a word processor, eg Ms Wod and then copy and paste it
                            into the textarea of your episode body.
                        </li>
                        <li class="list-group-item text-dark">You can apply styling using the icons</li>
                        <li class="list-group-item text-dark">Any styling that does not add additional  meaning to the story should be avoided</li>
                    </ul>


                </div>



                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script src="https://cdn.tiny.cloud/1/wtiq79cjzidqv1f2ogpv1kjy8un1zdsp4977km757nuhxhsi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
        selector: 'textarea',
        height : "480",

      });
    </script>
@endsection

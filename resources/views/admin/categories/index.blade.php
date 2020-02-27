@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>All Categories</h2>
                <a href="{{Route('adCreateCat')}}" class="btn btn-primary btn-sm">CREATE CATEGORY</a>
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
                                <td>CATEGORY NAME</td>
                                <td>CATEGORY DESCRIPTION</td>
                                <td>ACTION</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>

                        @foreach ($categories as $category)


                            <tr>
                                <td>{{$sn ++}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="/admin/categories/detail/{{$category->id}}-{{$category->title}}" class="btn btn-sm btn-info">D</a>
                                <a href="/admin/categories/edit/{{$category->id}}-{{$category->title}}" class="btn btn-sm btn-primary">E</a>

                                <form action="/admin/categories/delete/{{$category->id}}" method="post" class="py-2">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>

                        @endforeach



                        </tbody>




                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

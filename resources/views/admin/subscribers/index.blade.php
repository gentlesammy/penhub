

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ALL SUBSCRIBERS</h2>
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
                                <td>Name</td>
                                <td style="width: 40%;">Email</td>
                                <td>Status</td>
                                <td style="width: 10%;">Payment</td>
                                <td style="width: 10%;">Action</td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php  $sn = 1;?>
                            @if ($subscribers->count() >0)
                                        @foreach($subscribers as $subscriber)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$subscriber->name}}</td>
                                                <td>{{$subscriber->email}}</td>
                                                <td>
                                                    @if ($subscriber->active == 0)
                                                    Inactive
                                                    @else
                                                     Active
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($subscriber->paid == 0)
                                                        <form action="/admin/subscribers/paid/{{$subscriber->id}}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="submit" name="paid" class="btn btn-primary btn-sm" value="Pay">
                                                        </form>
                                                    @else
                                                    Paid
                                                    @endif



                                                </td>
                                                <td>
                                                    @if ($subscriber->active==0)
                                                        <form action="/admin/subscribers/activate/{{$subscriber->id}}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="submit"  class="btn btn-primary btn-sm" value="Activate">
                                                        </form>
                                                    @else
                                                        <form action="/admin/subscribers/deactivate/{{$subscriber->id}}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="submit"  class="btn btn-primary btn-sm" value="Deactivate">
                                                        </form>
                                                    @endif
                                                </td>

                                            </tr>

                                        @endforeach

                                {{$subscribers->links()}}
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
























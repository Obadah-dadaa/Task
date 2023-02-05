@extends('layouts.app')
<style>
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
@section('content')

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-10">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Proudct</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                    @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group ( name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="proudct_name">Proudct name</label>
                                <input name="name" class="form-control" id="proudct_name" type="text" value="{{$product->name}}" >
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (image)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="proudct_image">Proudct image</label>
                                <input class="form-control" id="proudct_image" name="image" type="file" >{{$product->image}}
                            </div>
                        </div>

                            <div class="row gx-3 mb-3">
                            <!-- Form Group (description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="description">Proudct description</label>
                                <textarea class="form-control" style="height:60px;" rows="3" cols="50" name="description" Id="Text"> {{$product->description}}</textarea>
                            </div>


                            <div class="row gx-3 mb-3">
                                <!-- Form Group (image)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="user_id">User Owner</label>
                                    <select class="form-control" name="user_id">
                                        <option></option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}}</option>
                                        @endforeach
                                      
                                     </select> 
                                </div>
                            </div>

                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
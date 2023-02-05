@extends('layouts.app_admin')

@section('admin_content')

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{route('create')}}" class="btn btn-primary"style="margin-left:450px;">Add Product</a>
                </div>

@endsection

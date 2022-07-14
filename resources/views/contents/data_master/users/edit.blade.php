@extends('layouts.frontend')

@section('title', 'User Create')

@section('content')
@if(isset($data))
    <input type="hidden" id="name_data" value="{{$data->user_name}}">
    <input type="hidden" id="email_data" value="{{$data->email}}">
    <input type="hidden" id="gender_data" value="{{$data->gender}}">
    <script>
        const id = $('#id_data').val()
        const name = $('#name_data').val()
        const email = $('#email_data').val()
        const gender = $('#gender_data').val()

        $(document).ready(function(){
            const data = $('#data_edit').val()
            $('#name').val(name);
            $('#email').val(email);
            $('#password').val();
            $('#submit').replaceWith(`<button type="submit" class="btn btn-success me-1 mb-1" id="submit">Update</button>`);
            if(gender == "Male"){
                document.getElementById('male-checked').checked = true
            }else{
                document.getElementById('female-checked').checked = true
            }
        })
    </script> 
@endif
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form User Edit</h3>
                <p class="text-subtitle text-muted">User's Form Edit</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/users">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Users</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger" id="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form class="form form-horizontal" id="user_form_edit" method="POST" action="/users/{{$data->user_id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        id="name" name="name" value="{{old('name')}}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        id="email" name="email" value="{{old('email')}}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="radio" class="btn-check" name="gender" id="male-checked"
                                                autocomplete="off" value="Male">
                                            <label class="btn btn-outline-success" for="male-checked">Male</label>
                    
                                            <input type="radio" class="btn-check" name="gender" id="female-checked"
                                                autocomplete="off" value="Female">
                                            <label class="btn btn-outline-danger" for="female-checked">Female</label>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" id="submit">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div>
<script>
    setTimeout(() => {
        $('#error').slideUp('fast');
    }, 3000);
    </script>
@endsection
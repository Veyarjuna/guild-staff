@extends('layouts.frontend')

@section('title', 'User Create')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Menu Create</h3>
                <p class="text-subtitle text-muted">Menu's Form</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/ranks">Menu's</a></li>
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
                        <h4 class="card-title">Form Menu</h4>
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
                            <form class="form form-horizontal" method="POST" action="/menus" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Menu Name</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        id="name" name="name" value="{{old('name')}}" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-box-seam"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Menu</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" id="menu_number" placeholder="Nomor Diisi Manual Harap Cek terlebih Dahulu untuk Nomornya" name="menu_number">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-align-start"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Menu Parent</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="menu_parent" id="parent" value="1">
                                                    <label class="form-check-label" for="parent">
                                                      Parent
                                                    </label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="menu_parent" id="noparent" value="0" checked>
                                                    <label class="form-check-label" for="noparent">
                                                      No Parent
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Menu Sub</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="menusub" id="hassub" value="1">
                                                    <label class="form-check-label" for="hassub">
                                                      Has Sub Menu
                                                    </label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="menusub" id="nohassub" value="0" checked>
                                                    <label class="form-check-label" for="nohassub">
                                                      Not Has Sub Menu
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Menu Role Access</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <select class="form-select" style="max-width: 200px" name="role_menu">
                                                    <option value="" selected disabled>--- Pilih ---</option>
                                                    <option value="1">Staff</option>
                                                    <option value="2">Adventurer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Icon</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" id="menu_icon" placeholder="" name="menu_icon" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-app"></i>
                                                    </div>
                                                </div>
                                                <p><small class="text-muted"><a href="https://icons.getbootstrap.com/" target="_blank"><i class="bi bi-bootstrap"></i>  Bootstrap-icon</a></small></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Endpoint</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" id="menu_endpoint" placeholder="" name="menu_endpoint" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-link-45deg"></i>
                                                    </div>
                                                </div>
                                            </div>
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
@extends('layouts.frontend')

@section('title', 'Data Ranks')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ranks's Table</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ranks</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @if (isset($data))
        @if ($data->status == 200)
            <div class="alert alert-success" id="alert_badge">{{$data->msg}}.</div>        
        @else
            <div class="alert alert-danger" id="alert_badge">{{$data->msg}}.</div>        
        @endif
    @endif
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success" href="/ranks/create">Add +</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table_ranks">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rank Name</th>
                            <th>Minimum</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<script src="{{url('/proccess/RankProccess.js')}}"></script>
@endsection
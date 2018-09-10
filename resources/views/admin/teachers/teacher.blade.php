@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">{{$teacher->first_name}}</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">

                    <div class="col col-md-3"><label class=" form-control-label">First Name</label></div>
                    <div class="col-12 col-md-9">
                        {{$teacher->first_name}}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Last Name</label></div>
                    <div class="col-12 col-md-9">
                        {{$teacher->last_name}}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9">
                        {{$teacher->email}}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                    <div class="col-12 col-md-9">
                        @if($teacher->is_active == 1)
                            <span class="badge badge-pill badge-warning">Active</span>
                        @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
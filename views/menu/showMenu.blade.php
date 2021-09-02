@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2> Menu item</h2>
        </div> --}}
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('food.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $menuItem->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            {{ $menuItem->price }}
        </div>
    </div>
</div>
@endsection
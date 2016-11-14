@extends('layouts.master')

@section('page_content')
<div class="card">
 <div class="card-block">
    <div class="text-xs-center">
        <h3><i class="fa "></i> Edit car details:</h3>
        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif  
    </div>
  {!! Form::open(['route' => array('cars.update', $car['vin']), 'method' => 'put' ]) !!}
      @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ \Session::get('success')[0] }}</li>
            </ul>
        </div>
    @endif
    <div class="md-form">
        <i class="fa prefix"></i>
        {!! Form::label('VIN') !!}
        {!! Form::text('vin', $car['vin'], array('id' => 'form3', 'class' => 'form-control')) !!}
    </div>
    <div class="md-form">
        <i class="fa prefix"></i>
        {!! Form::label('Year') !!}
        {!! Form::text('year', $car['year'], array('id' => 'form3', 'class' => 'form-control')) !!}
    </div>
    <div class="md-form">
        <i class="fa prefix"></i>
        {!! Form::label('Make') !!}
        {!! Form::text('make', $car['make'], array('id' => 'form3', 'class' => 'form-control')) !!}
    </div>
    <div class="md-form">
        <i class="fa prefix"></i>
        {!! Form::label('Model') !!}
        {!! Form::text('model', $car['model'], array('id' => 'form3', 'class' => 'form-control')) !!}
    </div>
    <div class="md-form">
        <i class="fa prefix"></i>
        {!! Form::label('Price') !!}
        {!! Form::text('price', $car['price'], array('id' => 'form3', 'class' => 'form-control')) !!}
    </div>    
    <div class="text-xs-center">
    {!! Form::token() !!}
    {!! Form::submit('Edit Car', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
    </div>
  </div>
<!--Footer-->
</div>
@endsection

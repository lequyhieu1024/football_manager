@extends('admin.app')

@section('content')
    <div class="card p-4">
        <div class="card-title">
            <h1 class="text-primary">
                {{ $content = isset($club) ? __('Update Club') : __('Create Club') }}
            </h1>
        </div>
        @if (isset($club))
            {!! Form::model($club, [
                'route' => ['clubs.update', $club->id],
                'method' => 'PUT',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data', // For file uploads
            ]) !!}
        @else
            {!! Form::open([
                'route' => ['clubs.store'],
                'method' => 'POST',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data', // For file uploads
            ]) !!}
        @endif

        <div class="row">
            <div class="form-group mb-2 col-md-6">
                {!! Form::label('name', __('Club Name')) !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Club Name'),
                ]) !!}
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('logo', __('Club Logo')) !!}
                {!! Form::file('logo', [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('total_members', __('Total Members')) !!}
                {!! Form::number('total_members', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Total Members'),
                ]) !!}
                @if ($errors->has('total_members'))
                    <span class="text-danger">{{ $errors->first('total_members') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('phone', __('Phone')) !!}
                {!! Form::text('phone', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Phone Number'),
                ]) !!}
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('email', __('Email')) !!}
                {!! Form::email('email', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Email Address'),
                ]) !!}
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('founding_date', __('Founding Date')) !!}
                {!! Form::date('founding_date', null, [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('founding_date'))
                    <span class="text-danger">{{ $errors->first('founding_date') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('coach_id', __('Coach')) !!}
                {!! Form::select('coach_id', $coaches, null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Coach'),
                ]) !!}
                @if ($errors->has('coach_id'))
                    <span class="text-danger">{{ $errors->first('coach_id') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('manager_id', __('Manager')) !!}
                {!! Form::select('manager_id', $coaches, null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Manager'),
                ]) !!}
                @if ($errors->has('manager_id'))
                    <span class="text-danger">{{ $errors->first('manager_id') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-12">
                {!! Form::label('description', __('Description')) !!}
                {!! Form::textarea('description', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Description'),
                    'id' => 'editor'
                ]) !!}
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group mb-2 mt-2">
            {!! Form::submit($content, ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <a href="{{ route('clubs.index') }}" class="btn btn-info">{{ __('Back') }}</a>
            @can('destroy_department')
                @if (isset($club))
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['clubs.destroy', $club->id],
                        'style' => 'display:inline;',
                    ]) !!}
                    {!! Form::button(__('Delete'), [
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'onclick' => 'return confirm("' . __('Are you sure?') . '")',
                    ]) !!}
                    {!! Form::close() !!}
                @endif
            @endcan
        </div>
    </div>
@endsection

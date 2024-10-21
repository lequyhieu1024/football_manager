@extends('admin.app')

@section('content')
    <div class="card p-4">
        <div class="card-title">
            <h1 class="text-primary">
                {{ $content = isset($coach) ? __('Update Coach') : __('Create Coach') }}
            </h1>
        </div>

        @if (isset($coach))
            {!! Form::model($coach, [
                'route' => ['coaches.update', $coach->id],
                'method' => 'PUT',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open([
                'route' => ['coaches.store'],
                'method' => 'POST',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @endif

        <div class="row">
            <div class="form-group mb-2 col-md-6">
                {!! Form::label('name', __('Coach Name')) !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Coach Name'),
                ]) !!}
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('avatar', __('Avatar')) !!}
                {!! Form::file('avatar', [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('avatar'))
                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
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
                {!! Form::label('gender', __('Gender')) !!}
                {!! Form::select('gender', [1 => __('Male'), 0 => __('Female')], null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Gender'),
                ]) !!}
                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('yob', __('Year of Birth')) !!}
                {!! Form::number('yob', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Year of Birth'),
                ]) !!}
                @if ($errors->has('yob'))
                    <span class="text-danger">{{ $errors->first('yob') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('address', __('Address')) !!}
                {!! Form::text('address', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Address'),
                ]) !!}
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
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
            <a href="{{ route('coaches.index') }}" class="btn btn-info">{{ __('Back') }}</a>
{{--            @can('destroy_subject')--}}
                @if (isset($coach))
                    @if (!in_array($coach->id, $coachsHasClubs))
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['coaches.destroy', $coach->id],
                            'style' => 'display:inline;',
                        ]) !!}
                        {!! Form::button(__('Delete'), [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => 'return confirm("' . __('Are you sure?') . '")',
                        ]) !!}
                        {!! Form::close() !!}
                    @endif
                @endif
{{--            @endcan--}}
        </div>
    </div>
@endsection

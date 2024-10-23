@extends('admin.app')

@section('content')
    <div class="card p-4">
        <div class="card-title">
            <h1 class="text-primary">
                {{ $content = isset($yard) ? __('Update Yard') : __('Create Yard') }}
            </h1>
        </div>
        @if (isset($yard))
            {!! Form::model($yard, [
                'route' => ['yards.update', $yard->id],
                'method' => 'PUT',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data', // For file uploads
            ]) !!}
        @else
            {!! Form::open([
                'route' => ['yards.store'],
                'method' => 'POST',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data', // For file uploads
            ]) !!}
        @endif

        <div class="row">
            <div class="form-group mb-2 col-md-6">
                {!! Form::label('name', __('Name') ) !!} <small class="text-danger">*</small>
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Name'),
                ]) !!}
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-2">
                <div class="form-check form-switch mb-2 col-md-6">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{__('Is Active ?')}}</label>
                </div>
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('thumbnail', __('Image') . ' ' . __('illustration')) . ' (' . __('multiple photos can be selected') . ')'!!}
                {!! Form::file('thumbnail[]', [
                    'class' => 'form-control',
                    'multiple' => true,
                    'id' => "imageInput",
                    'accept' => "image/*"
                ]) !!}
                @if ($errors->has('thumbnail'))
                    <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                @endif
            </div>
            <div id="imagePreviewContainer"></div>
            @if( isset($yard) && $yard->images)
                <div class="mt-2">
                    @foreach($yard->images as $data)
                        <img style="width: 200px; height: 150px;" class="rounded-3 mb-1"
                             src="{{ asset('storage/' . $data['thumbnail']) }}"
                             alt="{{ $yard->name }}">
                    @endforeach
                </div>
            @endif
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
            <a href="{{ route('yards.index') }}" class="btn btn-info">{{ __('Back') }}</a>
            @can('destroy_department')
                @if (isset($yard))
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['yards.destroy', $yard->id],
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

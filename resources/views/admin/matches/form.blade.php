@extends('admin.app')

@section('content')
    <div class="card p-4">
        <div class="card-title">
            <h1 class="text-primary">
                {{ $content = isset($match) ? __('Update Match') : __('Create Match') }}
            </h1>
        </div>
        @if (isset($match))
            {!! Form::model($match, [
                'route' => ['matches.update', $match->id],
                'method' => 'PUT',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open([
                'route' => ['matches.store'],
                'method' => 'POST',
                'class' => 'w-100',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @endif

        <div class="row">
            <div class="form-group mb-2">
                {!! Form::label('title', __('Match Title')) !!}
                {!! Form::text('title', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Match Title'),
                ]) !!}
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('club1_id', __('Club 1')) !!}
                {!! Form::select('club1_id', $clubs, null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Club 1'),
                ]) !!}
                @if ($errors->has('club1_id'))
                    <span class="text-danger">{{ $errors->first('club1_id') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6 d-flex">
                <div class="col-md-6">
                    {!! Form::label('banner_club1', __('Banner Club 1')) !!}
                    {!! Form::file('banner_club1', [
                        'class' => 'form-control',
                        'id' => "imageInput",
                        'accept' => "image/*"
                    ]) !!}
                    @if ($errors->has('banner_club1'))
                        <span class="text-danger">{{ $errors->first('banner_club1') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <div id="imagePreviewContainer"></div>
                </div>
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('club2_id', __('Club 2')) !!}
                {!! Form::select('club2_id', $clubs, null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Club 2'),
                ]) !!}
                @if ($errors->has('club2_id'))
                    <span class="text-danger">{{ $errors->first('club2_id') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6 d-flex">
                <div class="col-md-6">
                    {!! Form::label('banner_club2', __('Banner Club 2')) !!}
                    {!! Form::file('banner_club2', [
                        'class' => 'form-control',
                        'id' => "imageInput2",
                        'accept' => "image/*"
                    ]) !!}
                    @if ($errors->has('banner_club2'))
                        <span class="text-danger">{{ $errors->first('banner_club2') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <div id="imagePreviewContainer2"></div>
                </div>
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('match_type', __('Match Type')) !!}
                {!! Form::select('match_type', [
                    '7' =>  __('Yard') . ' 7 ' . __('people'),
                    '9' => __('Yard') . ' 9 ' . __('people'),
                    '11' => __('Yard') . ' 11 ' . __('people'),
                    ]
                    , null, [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('match_type'))
                    <span class="text-danger">{{ $errors->first('match_type') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('match_duration', __('Match Duration')) !!}
                {!! Form::text('match_duration', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Match Duration'),
                ]) !!}
                @if ($errors->has('match_duration'))
                    <span class="text-danger">{{ $errors->first('match_duration') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('at_day', __('Match Date')) !!}
                {!! Form::date('at_day', null, [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('at_day'))
                    <span class="text-danger">{{ $errors->first('at_day') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('at_time', __('Match Time')) !!}
                {!! Form::time('at_time', null, [
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('at_time'))
                    <span class="text-danger">{{ $errors->first('at_time') }}</span>
                @endif
            </div>

            <div class="form-group mb-2 col-md-6">
                {!! Form::label('yard_id', __('Yard')) !!}
                {!! Form::select('yard_id', $yards, null, [
                    'class' => 'form-control',
                    'placeholder' => __('Select Yard'),
                ]) !!}
                @if ($errors->has('yard_id'))
                    <span class="text-danger">{{ $errors->first('yard_id') }}</span>
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
            <a href="{{ route('matches.index') }}" class="btn btn-info">{{ __('Back') }}</a>
            @can('destroy_match')
                @if (isset($match))
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['matches.destroy', $match->id],
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

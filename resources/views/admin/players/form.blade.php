@extends('admin.app')
@section('content')
    <div class="card p-4">
        <div class="card-title">
            <h1 class="text-primary">{{ empty($player) ? __('Create Player') : (!$is_disabled ? __('Update Player') : __('Show Player')) }}</h1>
        </div>
        <div class="card-form row">
            @if(!empty($player))
                {!! Form::model($player,['route' => ['players.update', $player], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            @else
                {!! Form::open(['route' => 'players.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @endif
            @csrf
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('name', __('Player Name'), ['class' => 'mb-1']) !!} <span
                        class="text-danger">(*)</span>
                    {!! Form::text('name', null, [
                        'class' => 'form-control',
                        'placeholder' => __('Player Name'),
                        'disabled' => $is_disabled
                    ]) !!}
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('email', __('Email'), ['class' => 'mb-1']) !!}
                    {!! Form::email('email', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Email'),
                    ]) !!}
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4 mb-3">
                    {!! Form::label('phone', __('Phone'), ['class' => 'mb-1']) !!}
                    {!! Form::number('phone', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Phone'),
                    ]) !!}
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4 mb-3">
                    {!! Form::label('gender', __('Gender'), ['class' => 'mb-1']) !!} <span
                        class="text-danger">(*)</span>
                    {!! Form::select('gender', \App\Enums\Gender::getSelectOptions(), null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                    ]) !!}
                    @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4 mb-3">
                    {!! Form::label('yob', __('Year of Birth'), ['class' => 'mb-1']) !!}
                    {!! Form::number('yob', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Year of Birth'),
                    ]) !!}
                    @error('yob')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('weight', __('Weight'), ['class' => 'mb-1']) !!}
                    {!! Form::number('weight', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Weight'). ' (kg)',
                    ]) !!}
                    @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('height', __('Height'), ['class' => 'mb-1']) !!}
                    {!! Form::number('height', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Height') . ' (cm)',
                    ]) !!}
                    @error('height')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('position', __('Position'), ['class' => 'mb-1']) !!}
                    {!! Form::text('position', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Position') . '( RM, CB, LB, ..)',
                    ]) !!}
                    @error('position')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('address', __('Address'), ['class' => 'mb-1']) !!}
                    {!! Form::text('address', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Address'),
                    ]) !!}
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('avatar', __('Avatar'), ['class' => 'mb-1']) !!}
                    {!! Form::file('avatar', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6 mb-3">
                    {!! Form::label('club_id', __('Choose Club'), ['class' => 'mb-1']) !!} <span
                        class="text-danger">(*)</span>
                    {!! Form::select('club_id', $clubs, null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => '--' . __('Choose Club') . '--',
                    ]) !!}
                    @error('club_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('description', __('Description'), ['class' => 'mb-1']) !!}
                    {!! Form::textarea('description', null, [
                        'class' => 'form-control',
                        'disabled' => $is_disabled,
                        'placeholder' => __('Description'),
                        'id' => 'editor'
                    ]) !!}
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if(!$is_disabled)
                    <div class="form-group">
                        @if(!empty($player))
                            {!! Form::submit(__('Update Player'), ['class' => 'btn btn-primary']) !!}
                        @else
                            {!! Form::submit(__('Create Player'), ['class' => 'btn btn-primary']) !!}
                        @endif
                        {!! Form::reset(__('Reset'), [
                            'type' => 'reset',
                            'class' => 'btn btn-secondary',
                        ]) !!}
                        <a href="{{ route('players.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                    </div>
                @else
                    <div class="form-group">
                        <a href="{{ route('players.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                    </div>
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

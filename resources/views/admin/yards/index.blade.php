@extends('admin.app')

@section('content')
    <div class="card p-4">
        <h1>{{ __('Yard List') }}</h1>

        <div class="mb-4">
            <a href="{{ route('yards.create') }}" class="btn btn-primary">+ {{ __('Create Yard') }}</a>
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'yards.index']) }}
        <div class="filter row mb-4">
            <div class="col-6 col-md-2">
                <div class="d-flex align-items-center gap-1">
                    <span>{{ __('Show') }}</span>
                    {!! Form::select(
                        'size',
                        [10 => 10, 20 => 20, 50 => 50, 100 => 100],
                        request('size'),
                        ['class' => 'form-select', 'id' => 'pagination', 'onchange' => 'this.form.submit()']
                    ) !!}
                    <span>{{ __('entries') }}</span>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="row">
            @foreach ($yards as $yard)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $yard->name }}</h5>
                            <div class="mb-3">
                                @foreach($yard->images as $index => $thumbnail)
                                    @if ($index < 3)
                                        <img style="width: 100px; height: 100px;" class="rounded-3 mb-1"
                                             src="{{ asset('storage/' . $thumbnail['thumbnail']) }}"
                                             alt="{{ $yard->name }}">
                                    @elseif ($index === 3)
                                        <div style="position: relative;">
                                            <img style="width: 100%; height: auto;" class="rounded-3"
                                                 src="{{ asset('storage/' . $thumbnail['thumbnail']) }}"
                                                 alt="{{ $yard->name }}">
                                            <div class="rounded-3"
                                                 style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0, 0, 0, 0.5); color: white; text-align: center; padding: 5px;">
                                                +{{ count($yard->images) - 3 }} {{ __('more') }}
                                            </div>
                                        </div>
                                        @break
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                @endforeach
                            </div>
                            <p class="card-text text-truncate">{!! $yard->description !!}</p>
                            <p><strong>{{ __('Active:') }}</strong> {{ $yard->is_active ? __('Yes') : __('No') }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <a href="{{ route('yards.edit', $yard->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['yards.destroy', $yard->id], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="bi bi-trash-fill"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'onclick' => 'return confirm("' . __('Are you sure?') . '")',
                                ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12 mt-2">
            {{ $yards->appends(request()->all())->links() }}
        </div>
    </div>
@endsection

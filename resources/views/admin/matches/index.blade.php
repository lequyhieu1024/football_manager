@extends('admin.app')

@section('content')
    <div class="card p-4">
        <h1>{{ __('Match List') }}</h1>

        <div class="mb-4">
            <a href="{{ route('matches.create') }}" class="btn btn-primary">+ {{ __('Create Match') }}</a>
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'matches.index']) }}
        <div class="filter row mb-4">
            <div class="col-6 col-md-2">
                <div class="d-flex align-items-center gap-1">
                    <span>{{ __('Show') }}</span>
                    {!! Form::select(
                        'size',
                        [20 => 20, 50 => 50, 100 => 100, 200 => 200],
                        request('size'),
                        ['class' => 'form-select', 'id' => 'pagination', 'onchange' => 'this.form.submit()']
                    ) !!}
                    <span>{{ __('entries') }}</span>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="mb-2 row">
                <div class="col-md-6 d-flex align-items-center gap-1">
                    <span>{{ __('Date From') }}</span>
                    {{ Form::date('date_from', request('date_from'), ['class' => 'form-control']) }}
                    <span>{{ __('To') }}</span>
                    {{ Form::date('date_to', request('date_to'), ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6 d-flex align-items-center gap-1">
                    <span>{{ __('Time From') }}</span>
                    {{ Form::time('time_from', request('time_from'), ['class' => 'form-control']) }}
                    <span>{{ __('To') }}</span>
                    {{ Form::time('time_to', request('time_to'), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-6 mb-2">
                {!! Form::select('club', $clubs, request('club'), [
                    'class' => 'form-control',
                    'placeholder' => __('Select Club')
                ])
                !!}
            </div>
            <div class="col-sm-6 mb-2">
                {!! Form::select('yard', $yards, request('yard'), [
                    'class' => 'form-control',
                    'placeholder' => __('Select Yard')
                ])
                !!}
            </div>
            <div class="">
                <a href="{{ route('matches.index') }}" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></a>
                {{ Form::button('<i class="bi bi-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
            </div>
        </div>
        {!! Form::close() !!}

        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <tbody>
                @foreach($matches as $match)
                    <tr class="align-middle">
                        <td>{{ \Carbon\Carbon::parse($match->at_time)->format('H:i') }}
                            - {{ \Carbon\Carbon::parse($match->at_day)->format('d/m/Y') }}</td>
                        <td><span
                                class="badge bg-secondary">{{ __('Yard') . ' ' . $match->match_type . ' ' . __('people')}}</span>
                        </td>
                        <td class="text-danger" data-bs-toggle="tooltip"
                            title="{{ $match->club1->name }}">{{ $match->club1->name }}</td>
                        <td><img src="{{ asset('storage/' . $match->club1->logo) }}"
                                 alt="{{ $match->club1->name }} Logo" width="30"></td>
                        <td><span class="badge bg-success">VS</span></td>
                        <td><img src="{{ asset('storage/' . $match->club2->logo) }}"
                                 alt="{{ $match->club2->name }} Logo" width="30"></td>
                        <td class="text-danger" data-bs-toggle="tooltip"
                            title="{{ $match->club2->name }}">{{ $match->club2->name }}</td>
                        <td>
                            <x-match-status-badge :status="$match->status" />
                        </td>
                        <td>
                            <a href="{{ route('matches.show', $match->id) }}" class="btn btn-outline-success"
                               data-bs-toggle="tooltip" title="{{ __('Match Details') }}">></a>
                            @if($match->status !== \App\Enums\Status::CANCELLED->value && $match->status !== \App\Enums\Status::COMPLETED->value)
                                {!! Form::open(['method' => 'PUT', 'route' => ['matches.cancelMatch', $match], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="bi bi-x-circle"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-outline-danger',
                                    'data-bs-toggle' => "tooltip",
                                    'title' => __('Cancel This Match'),
                                    'onclick' => 'return confirm("' . __('Are you sure want to cancel this match ?') . '")',
                                ]) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 mt-2">
            {{ $matches->appends(request()->all())->links() }}
        </div>
    </div>
@endsection

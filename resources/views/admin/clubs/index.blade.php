@extends('admin.app')

@section('content')
    <div class="card p-4">
        <h1>{{ __('Club List') }}</h1>

        <div class="mb-4">
            <a href="{{ route('clubs.create') }}" class="btn btn-primary">+ {{ __('Create Club') }}</a>
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'clubs.index']) }}
        <div class="filter row mb-4">
            <div class="col-6 col-md-2">
                <div class="d-flex align-items-center gap-1">
                    <span>{{ __('Show') }}</span>
                    {!! Form::select(
                        'size',
                        [
                            10 => 10,
                            20 => 20,
                            50 => 50,
                            100 => 100,
                        ],
                        request('size'),
                        [
                            'class' => 'form-select',
                            'id' => 'pagination',
                            'onchange' => 'this.form.submit()',
                        ],
                    ) !!}
                    <span>{{ __('entries') }}</span>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Logo') }}</th>
                    <th>{{ __('Club Name') }}</th>
                    <th>{{ __('Total Members') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Founding Date') }}</th>
                    <th>{{ __('Coach') }}</th>
                    <th>{{ __('Manager') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th class="col-2">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clubs as $club)
                    <tr>
                        <td>{{ $club->id }}</td>
                        <td>
                            @if ($club->logo)
                                <img style="width: 100px; height: 100px;" class="rounded-3" src="{{ asset('storage/' . $club->logo) }}" alt="{{ $club->name }}">
                            @else
                                <span>{{ __('No Image') }}</span>
                            @endif
                        </td>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->total_members }}</td>
                        <td>{{ $club->phone }}</td>
                        <td>{{ $club->email }}</td>
                        <td>{{ $club->founding_date }}</td>
                        <td>{{ $club->coach ? $club->coach->name : __('N/A') }}</td>
                        <td>{{ $club->manager ? $club->manager->name : __('N/A') }}</td>
                        <td class="text-truncate">{!! $club->description !!}</td>
                        <td>
                            <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['clubs.destroy', $club->id],
                                'style' => 'display:inline;',
                            ]) !!}
                            {!! Form::button('<i class="bi bi-trash-fill"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'onclick' => 'return confirm("' . __('Are you sure?') . '")',
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 mt-2">
            {{ $clubs->appends(request()->all())->links() }}
        </div>
    </div>
@endsection

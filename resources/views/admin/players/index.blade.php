@extends('admin.app')

@section('content')
    <style>
        .badges {
            width: 25px;
            font-size: 1em;
            border-radius: 20px;
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
        }
    </style>

    <div class="card p-4">
        <h1>{{ __('Player List') }}</h1>

        <div class="mb-4">
            <a href="{{ route('players.create') }}" class="btn btn-primary">+ {{ __('Create Player') }}</a>
            {{--            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importExcel">--}}
            {{--                <i class="bi bi-filetype-xlsx"></i> {{ __('Import Scores By Excel') }}--}}
            {{--            </button>--}}
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'players.index']) }}
        <div class="filter row mb-4">
            <!-- PAGINATION -->
            <div class="col-6 col-md-2">
                <div class="d-flex align-items-center gap-1">
                    <span>{{ __('Show') }}</span>
                    {!! Form::select(
                        'size',
                        [10 => 10, 50 => 50, 200 => 200, 500 => 500, 1000 => 1000, 2000 => 2000, 3000 => 3000],
                        request('size'),
                        ['class' => 'form-select', 'id' => 'pagination'],
                    ) !!}
                    <span>{{ __('entries') }}</span>
                </div>
            </div>
            <!-- PAGINATION END -->
        </div>

        <div class="row mb-4">
            <!-- Age Filter -->
            <div class="col-md-3">
                <div class="d-flex align-items-center gap-1">
                    <span>{{ __('Age From') }}</span>
                    {{ Form::number('age_from', request('age_from'), ['class' => 'form-control']) }}
                    <span>{{ __('To') }}</span>
                    {{ Form::number('age_to', request('age_to'), ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- Actions -->
            <div class="col-md-2">
                <a href="{{ route('players.index') }}" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></a>
                {{ Form::button('<i class="bi bi-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
            </div>
        </div>
        {{ Form::close() }}

        <div class="display_mode mb-2">
            <p>{{ __('Display Mode') }}</p>
            <div class="btn-group">
                <button type="button" id="display_table" class="active btn btn-outline-primary">
                    <i class="bi bi-table"></i>
                </button>
                <button type="button" id="display_grid" class="btn btn-outline-primary">
                    <i class="bi bi-grid-3x3"></i>
                </button>
            </div>
        </div>

        <div id="playerContainer" class="table-responsive">
            <!-- Table Display -->
            <table id="playerTable" class="table table-bordered" style="display: table;">
                <thead>
                <tr>
                    <th>{{ __('Player Name') }}</th>
                    <th>{{ __('Avatar') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Gender') }}</th>
                    <th>{{ __('Year of Birth') }}</th>
                    <th>{{ __('Weight') }}</th>
                    <th>{{ __('Height') }}</th>
                    <th>{{ __('Position') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Club') }}</th>
                    <th class="col-3 mb-1">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td><img class="rounded-3" src="/storage/{{ $player->avatar }}" alt="{{ $player->name }}"
                                 style="width: 100px; height: 100px;"></td>
                        <td>{{ $player->phone }}</td>
                        <td>{{ $player->email }}</td>
                        <td>{{ \App\Enums\Gender::getLabel($player->gender) }}</td>
                        <td>{{ $player->yob }}</td>
                        <td>{{ $player->weight }} kg</td>
                        <td>{{ $player->height }} cm</td>
                        <td>{{ $player->position }}</td>
                        <td>{{ $player->address }}</td>
                        <td>{!! $player->description !!}</td>
                        <td>{{ $player->club->name }}</td>
                        <td>
                            <a href="{{ route('players.show', $player->id) }}" class="btn btn-info"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['players.destroy', $player->id], 'style' => 'display:inline;']) !!}
                            {!! Form::button('<i class="bi bi-trash-fill"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("' . __('Are you sure?') . '")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Grid Display -->
            <div id="playerGrid" class="row" style="display: none;">
                <div class="row">
                    @foreach ($players as $player)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top rounded-3" src="/storage/{{ $player->avatar }}"
                                     alt="{{ $player->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $player->name }}</h5>
                                    <p class="card-text"><strong>{{ __('Phone') }}:</strong> {{ $player->phone }}</p>
                                    <p class="card-text">
                                        <strong>{{ __('Gender') }}
                                            :</strong> {{ \App\Enums\Gender::getLabel($player->gender) }}
                                    </p>
                                    <p class="card-text"><strong>{{ __('Year of Birth') }}:</strong> {{ $player->yob }}
                                    </p>
                                    <p class="card-text"><strong>{{ __('Weight') }}:</strong> {{ $player->weight }} kg
                                    </p>
                                    <p class="card-text"><strong>{{ __('Height') }}:</strong> {{ $player->height }} cm
                                    </p>
                                    <p class="card-text"><strong>{{ __('Position') }}:</strong> {{ $player->position }}
                                    </p>
                                    </p>
                                    <p class="card-text"><strong>{{ __('Club') }}:</strong> {{ $player->club->name }}
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ route('players.show', $player->id) }}" class="btn btn-info">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['players.destroy', $player->id], 'style' => 'display:inline;']) !!}
                                    {!! Form::button('<i class="bi bi-trash-fill"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("' . __('Are you sure?') . '")']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-between mt-2">
                <div>
                    {{ __('Show') }} {{ $players->count() }} {{ __('of') }} {{ $players->total() }} {{ __('players') }}
                </div>
                <div>
                    {{ $players->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/js/upload-excel.js') }}"></script>
    <script>
        document.getElementById('display_table').addEventListener('click', function () {
            document.getElementById('playerTable').style.display = 'table';
            document.getElementById('playerGrid').style.display = 'none';
            this.classList.add('active');
            document.getElementById('display_grid').classList.remove('active');
        });

        document.getElementById('display_grid').addEventListener('click', function () {
            document.getElementById('playerTable').style.display = 'none';
            document.getElementById('playerGrid').style.display = 'grid';
            this.classList.add('active');
            document.getElementById('display_table').classList.remove('active');
        });
    </script>

@endsection

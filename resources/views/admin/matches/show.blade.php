@extends('admin.app')

@section('content')
    <div class="card p-4">
        <h1 class="text-center">{{ __('Match Details') }}</h1>
        <hr>

        <div class="text-center mb-4">
            <h2 class="text-primary">{{$match->title}}</h2>
        </div>

        <div class="row mb-4">
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $match->club1->logo) }}"
                     alt="{{ $match->club1->name }} Logo" width="50" class="mb-2">
                <h3>{{ $match->club1->name }}</h3>
                <img class="img-fluid rounded mb-3" src="{{ asset('storage/' . $match->banner_club1) }}"
                     alt="{{ $match->club1->name }} Banner" style="max-height: 200px; object-fit: cover;">
            </div>

            <div class="col-md-2 text-center">
                <small class="text-muted">{{ __('Match result') }}</small>
                <h1 class="text-danger">
                    @if($match->result)
                        {{ $match->result }}
                    @else
                        ? - ?
                    @endif
                </h1>
            </div>

            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $match->club2->logo) }}"
                     alt="{{ $match->club2->name }} Logo" width="50" class="mb-2">
                <h3>{{ $match->club2->name }}</h3>
                <img class="img-fluid rounded mb-3" src="{{ asset('storage/' . $match->banner_club2) }}"
                     alt="{{ $match->club2->name }} Banner" style="max-height: 200px; object-fit: cover;">
            </div>
        </div>

        <div class="mb-4">
            <span class="badge bg-primary me-2">{{ __('Match Type') . ': ' . __('Yard') . ' ' . $match->match_type . ' ' . __('people') }}</span>
            <span class="badge bg-primary me-2">{{ __('Match Time') . ': ' . \Carbon\Carbon::parse($match->at_time)->format('H:i') }}</span>
            <span class="badge bg-primary">{{ __('Match Date') . ': ' . \Carbon\Carbon::parse($match->at_day)->format('d/m/Y') }}</span>
        </div>

        <div class="mb-4">
            <h4 class="text-muted">{{ __('Status') }}</h4>
            <x-match-status-badge :status="$match->status" />
        </div>

        <div class="mb-4">
            <h4 class="text-muted">{{ __('Description') }}</h4>
            <p class="border">{!! $match->description !!}</p>
        </div>

        <div class="text-center">
            <a href="{{ route('matches.edit', $match->id) }}" class="btn btn-warning">{{ __('Update Match') }}</a>
            <a href="{{ route('matches.index') }}" class="btn btn-info">{{ __('Back') }}</a>
        </div>
    </div>
@endsection

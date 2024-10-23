@php
    $statusClass = match ($status) {
        \App\Enums\Status::IN_PROGRESS->value => 'bg-info',
        \App\Enums\Status::COMPLETED->value => 'bg-success',
        \App\Enums\Status::CANCELLED->value => 'bg-danger',
        default => 'bg-primary',
    };
@endphp

<span class="badge {{ $statusClass }}">{{ \App\Enums\Status::getLabel($status) }}</span>

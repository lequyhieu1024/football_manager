@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-title">
                    <h1>{{ __('System') }}</h1>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ isset($system->logo) ? asset('storage/' . $system->logo) : '/uploads/default-avatar.png' }}" alt="user-avatar" class="d-block rounded" height="100" width="100"/>
                        <form class="button-wrapper" method="post" action="{{ route('profile.update-avatar', @$system->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                                <span><i class="bi bi-upload"></i> {{ __('Change Avatar') }} </span>
                                <input type="file" id="upload" name="logo" class="account-file-input" hidden accept="image/*" onchange="this.form.submit()"/>
                            </label>
                            @if ($errors->has('avatar'))
                                <span class="text-danger">{{ $errors->first('avatar') }}</span>
                            @endif
                        </form>
                    </div>
                </div>
                <hr class="my-0"/>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Info') }}</th>
                            <th>{{ __('Value') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ __('Website Name') }}</td>
                            <td>{{ @$system->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Logo') }}</td>
                            <td><img style="height: 100px; width: 100px" src="{{ isset($system->logo) ? asset('storage/' . $system->logo) : '/uploads/default-avatar.png' }}" >
                        </tr>
                        <tr>
                            <td>{{ __('Phone') }}</td>
                            <td>{{ @$system->phone }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Email') }}</td>
                            <td>{{ @$system->email }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Address Text') }}</td>
                            <td>{{ @$system->address_text }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Map Embedded') }}</td>
                            <td>{!! @$system->address_embedded !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Opening Hour') }}</td>
                            <td>{{ @$system->opening_hour }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Closing Hour') }}</td>
                            <td>{{ @$system->closing_hour }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Opening Day') }}</td>
                            <td>
                                {{ @$system->openingDay->monday ? 'Thứ 2,' : ''}}
                                {{ @$system->openingDay->tuesday ? 'Thứ 3,' : ''}}
                                {{ @$system->openingDay->wednesday ? 'Thứ 4,' : ''}}
                                {{ @$system->openingDay->thursday ? 'Thứ 5,' : ''}}
                                {{ @$system->openingDay->friday ? 'Thứ 6,' : ''}}
                                {{ @$system->openingDay->saturday ? 'Thứ 7,' : ''}}
                                {{ @$system->openingDay->sunday ? 'Chủ nhật' : ''}}
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Primary Color') }}</td>
                            <td><div style="width: 50px;height: 50px ;background-color: {{ @$system->primary_color }};"></div></td>
                        </tr>
                        <tr>
                            <td>{{ __('Manager') }}</td>
                            <td>{{ @$system->manager }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Description') }}</td>
                            <td>{{ @$system->description }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

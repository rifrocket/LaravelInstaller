@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.permissions.templateTitle') }}
@endsection

@section('sub_title')
    <i class="fa fa-key fa-fw" aria-hidden="true"></i>
    {{ trans('installer_messages.permissions.title') }}
@endsection

@section('wizard-body')

    <ul class="list">
        @foreach($permissions['permissions'] as $permission)
        <li class="alert alert-{{ $permission['isSet'] ? 'success' : 'error' }}">
            <i class="fa fa-fw fa-{{ $permission['isSet'] ? 'check-circle-o' : 'exclamation-circle' }}"></i>
            {{ $permission['folder'] }}
            <span>
                {{ $permission['permission'] }}
            </span>
        </li>
        @endforeach
    </ul>

    @if ( ! isset($permissions['errors']))
        <div class="buttons text-center">
            <a href="{{ route('LaravelInstaller::environment') }}" class="btn btn-success flat">
                {{ trans('installer_messages.permissions.next') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection

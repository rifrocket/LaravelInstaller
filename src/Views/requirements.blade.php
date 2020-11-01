@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.requirements.templateTitle') }}
@endsection

@section('sub_title')
    <i class="fa fa-server" aria-hidden="true"></i>
    {{ trans('installer_messages.requirements.title') }}
@endsection

@section('wizard-body')

    @foreach($requirements['requirements'] as $type => $requirement)
        <ul class="list">
            <li class="alert alert-{{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">
                <i class="fa fa-fw fa-{{ $phpSupportInfo['supported'] ? 'check-circle-o' : 'exclamation-circle' }} row-icon" aria-hidden="true"></i>
                <strong>{{ ucfirst($type) }}</strong>
                @if($type == 'php')

                    <strong>
                        <small>
                            (version {{ $phpSupportInfo['minimum'] }} required)
                        </small>
                    </strong>
                    <span class="float-right">
                        <strong>
                            {{ $phpSupportInfo['current'] }}
                        </strong>

                    </span>
                @endif
            </li>
            @foreach($requirements['requirements'][$type] as $extention => $enabled)
                <li class="alert alert-{{ $enabled ? 'success' : 'error' }}">
                    <i class="fa fa-fw fa-{{ $enabled ? 'check-circle-o' : 'exclamation-circle' }} row-icon" aria-hidden="true"></i>
                    {{ $extention }}

                </li>
            @endforeach
        </ul>
    @endforeach

    @if ( ! isset($requirements['errors']) && $phpSupportInfo['supported'] )
        <div class="buttons text-center">
            <a class="btn btn-success flat" href="{{ route('LaravelInstaller::permissions') }}">
                {{ trans('installer_messages.requirements.next') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection

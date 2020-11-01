@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.welcome.templateTitle') }}
@endsection

@section('sub_title')
    {{ trans('installer_messages.welcome.title') }}
@endsection

@section('wizard-body')
    <div class="wizard-body">
        <div class="step initial active">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="firstname">{{ trans('installer_messages.environment.wizard.form.app_name_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('APP_NAME') ? ' is-invalid ' : '' }}"
                               name="APP_NAME" id="APP_NAME"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.app_name_placeholder') }}">
                        @if ($errors->has('APP_NAME'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('APP_NAME') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="text">{{ trans('installer_messages.environment.wizard.form.app_domain_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('APP_DOMAIN') ? ' is-invalid ' : '' }}"
                               name="APP_DOMAIN" id="APP_DOMAIN"
                               placeholder="{{trans('installer_messages.environment.wizard.form.app_domain_placeholder')}}">
                        @if ($errors->has('APP_DOMAIN'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('APP_DOMAIN') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="text">{{ trans('installer_messages.environment.wizard.form.app_url_label') }}</label>
                        <input type="url"
                               class="form-control {{ $errors->has('APP_URL') ? ' is-invalid ' : '' }}"
                               name="APP_URL" id="APP_URL"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.app_url_placeholder') }}">
                        @if ($errors->has('APP_URL'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('APP_URL') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group ">
                        <label
                            for="text"> {{ trans('installer_messages.environment.wizard.form.app_debug_label') }}</label>
                        <select
                            class="form-control {{ $errors->has('APP_DEBUG') ? ' is-invalid ' : '' }} "
                            name="APP_DEBUG" id="APP_DEBUG">
                            <option
                                value="true"> {{ trans('installer_messages.environment.wizard.form.app_debug_label_true') }}</option>
                            <option
                                value="false"> {{ trans('installer_messages.environment.wizard.form.app_debug_label_false') }}</option>
                        </select>
                        @if ($errors->has('APP_DEBUG'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('APP_DEBUG') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="step">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group ">
                        <label
                            for="text"> {{ trans('installer_messages.environment.wizard.form.db_connection_label') }}</label>
                        <select
                            class="form-control {{ $errors->has('DB_CONNECTION') ? ' is-invalid ' : '' }} "
                            name="DB_CONNECTION" id="DB_CONNECTION">
                            <option value="mysql"> {{ trans('installer_messages.environment.wizard.form.db_connection_label_mysql') }}</option>
                            <option value="sqlite"> {{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlite') }}</option>
                            <option value="pgsql"> {{ trans('installer_messages.environment.wizard.form.db_connection_label_pgsql') }}</option>
                            <option value="sqlsrv"> {{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlsrv') }}</option>
                        </select>
                        @if ($errors->has('DB_CONNECTION'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_CONNECTION') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="text">{{ trans('installer_messages.environment.wizard.form.db_port_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('DB_PORT') ? ' is-invalid ' : '' }}"
                               name="DB_PORT" id="DB_PORT" value="3306"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.db_port_placeholder') }}">
                        @if ($errors->has('DB_PORT'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_PORT') }}</div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="firstname">{{ trans('installer_messages.environment.wizard.form.db_host_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('DB_HOST') ? ' is-invalid ' : '' }}"
                               name="DB_HOST" id="DB_HOST" value="127.0.0.1"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.db_host_placeholder') }}">
                        @if ($errors->has('DB_HOST'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_HOST') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="text">{{ trans('installer_messages.environment.wizard.form.db_name_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('DB_DATABASE') ? ' is-invalid ' : '' }}"
                               name="DB_DATABASE" id="DB_DATABASE"
                               placeholder="{{trans('installer_messages.environment.wizard.form.db_name_placeholder')}}">
                        @if ($errors->has('DB_DATABASE'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_DATABASE') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="text">{{ trans('installer_messages.environment.wizard.form.db_username_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('DB_USERNAME') ? ' is-invalid ' : '' }}"
                               name="DB_USERNAME" id="DB_USERNAME"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.db_username_placeholder') }}">
                        @if ($errors->has('DB_USERNAME'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_USERNAME') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label
                            for="text">{{ trans('installer_messages.environment.wizard.form.db_password_label') }}</label>
                        <input type="text"
                               class="form-control {{ $errors->has('DB_PASSWORD') ? ' is-invalid ' : '' }}"
                               name="DB_PASSWORD" id="DB_PASSWORD"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.db_password_placeholder') }}">
                        @if ($errors->has('DB_PASSWORD'))
                            <div class="invalid-feedback"
                                 style="display: block !important; ">{{ $errors->first('DB_PASSWORD') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

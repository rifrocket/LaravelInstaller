<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{config('installer.wizard-title')}}</title>

    <link rel="stylesheet" href="{{ asset('installer/css/style.css') }}">

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="wizard card-like">
                <form action="#">
                    <div class="wizard-header">
                        <div class="row justify-content-center">
                            <div class="col-xs-12">
                                <h1 class="text-center">
                                    Welcome to an amazing Experience
                                    <br>
                                    <small>Provide us some details to get you started
                                    </small>
                                </h1>
                                <hr />
                                <div class="steps text-center">
                                    <div class="wizard-step active"></div>
                                    <div class="wizard-step"></div>
                                    <div class="wizard-step"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-body">
                        <div class="step initial active">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label
                                            for="firstname">{{ trans('laravel_installer.environment.wizard.form.app_name_label') }}</label>
                                        <input type="text"
                                               class="form-control {{ $errors->has('app_debug') ? ' is-invalid ' : '' }}"
                                               name="APP_NAME" id="APP_NAME"
                                               placeholder="{{ trans('laravel_installer.environment.wizard.form.app_name_placeholder') }}">
                                        @if ($errors->has('APP_NAME'))
                                            <div class="invalid-feedback"
                                                 style="display: block !important; ">{{ $errors->first('APP_NAME') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label
                                            for="text">{{ trans('laravel_installer.environment.wizard.form.app_domain_label') }}</label>
                                        <input type="text"
                                               class="form-control {{ $errors->has('app_debug') ? ' is-invalid ' : '' }}"
                                               name="APP_DOMAIN" id="APP_DOMAIN"
                                               placeholder="{{ trans('laravel_installer.environment.wizard.form.app_domain_placeholder') }}">
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
                                            for="text">{{ trans('laravel_installer.environment.wizard.form.app_url_label') }}</label>
                                        <input type="url"
                                               class="form-control {{ $errors->has('app_debug') ? ' is-invalid ' : '' }}"
                                               name="APP_URL" id="APP_URL"
                                               placeholder="{{ trans('laravel_installer.environment.wizard.form.app_url_placeholder') }}">
                                        @if ($errors->has('APP_URL'))
                                            <div class="invalid-feedback"
                                                 style="display: block !important; ">{{ $errors->first('APP_URL') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label
                                            for="text"> {{ trans('laravel_installer.environment.wizard.form.app_debug_label') }}</label>
                                        <select
                                            class="form-control {{ $errors->has('app_debug') ? ' is-invalid ' : '' }} "
                                            name="APP_DEBUG" id="APP_DEBUG">
                                            <option
                                                value="true"> {{ trans('laravel_installer.environment.wizard.form.app_debug_label_true') }}</option>
                                            <option
                                                value="false"> {{ trans('laravel_installer.environment.wizard.form.app_debug_label_false') }}</option>
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
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="firstname">First Name:</label>--}}
{{--                                        <input type="text" class="form-control" id="firstname">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="lastname">Last Name:</label>--}}
{{--                                        <input type="text" class="form-control" id="lastname">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="email">Email address:</label>--}}
{{--                                        <input type="email" class="form-control" id="email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatEmail">Repeat Email address:</label>--}}
{{--                                        <input type="email" class="form-control" id="repeatEmail">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatPassword">Repeat Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="repeatPassword">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatPassword">Repeat Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="repeatPassword">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="step">
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="firstname">First Name:</label>--}}
{{--                                        <input type="text" class="form-control" id="firstname">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="lastname">Last Name:</label>--}}
{{--                                        <input type="text" class="form-control" id="lastname">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="email">Email address:</label>--}}
{{--                                        <input type="email" class="form-control" id="email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatEmail">Repeat Email address:</label>--}}
{{--                                        <input type="email" class="form-control" id="repeatEmail">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatPassword">Repeat Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="repeatPassword">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="repeatPassword">Repeat Password:</label>--}}
{{--                                        <input type="password" class="form-control" id="repeatPassword">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="wizard-footer">
                        <div class="row">
                            <div class="col-xs-6 pull-left block-center">
                                <button id="wizard-prev" style="display:none" type="button" class="btn btn-irv btn-irv-default">
                                    Previous
                                </button>
                            </div>
                            <div class="col-xs-6 pull-right text-center">
                                <button id="wizard-next" type="button" class="btn btn-irv">
                                    Next
                                </button>
                            </div>
                            <div class="col-xs-6 pull-right block-center">
                                <button id="wizard-subm"  style="display:none" type="submit" class="btn btn-irv">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('installer/js/script.js') }}"></script>
</body>
</html>

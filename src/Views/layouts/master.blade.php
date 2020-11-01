<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ trans('installer_messages.title') }} </title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('installer/css/style.css')}}">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="wizard card-like">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/install/environment/saveWizard" method="post">
                    @csrf
                    <div class="wizard-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="text-center">
                                    {{ config('installer.config.title') }}
                                    <br>
                                    <small>@yield('sub_title')</small>
                                </h1>

                                @if(! \Request::is('install'))
                                <div class="progress">
                                    <div class="progress-bar" id="progress_bar"  style="width: {{\Illuminate\Support\Facades\Session::get('currentProgress')}}%" role="progressbar"  aria-valuenow="{{\Illuminate\Support\Facades\Session::get('currentProgress')}}" aria-valuemin="0" aria-valuemax="100">{{number_format(\Illuminate\Support\Facades\Session::get('currentProgress'))}}%</div>
                                </div>
                                @endif

                                @if(\Request::is('install/environment/*') || \Request::is('install/environment') )
                                <div class="steps text-center">
                                    @for( $i=1; $i <= config('installer.config.num_of_environment_steps'); $i++)
                                    <div class="wizard-step {{\RifRocket\LaravelInstaller\Helpers\ProgressHelper::envoirment_states()==$i ?'active':''}}"></div>
                                    @endfor
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{--main body content--}}
                    @section('wizard-body')
                    @show
                    {{--main body content--}}



                    <div class="wizard-footer">
                        <div class="row">
                           @if(\Request::is('install/environment/*') || \Request::is('install/environment'))
                                <div class="col-xs-6 pull-left block-center">
                                    <button id="wizard-prev" style="display:none" type="button" class="btn btn-success flat btn-irv wizard-prev btn-irv-default">
                                        Previous
                                    </button>
                                </div>
                                <div class="col-xs-6 pull-right text-center">
                                    <button id="wizard-next" type="button" class="btn btn-success flat btn-irv wizard-next">
                                        Next
                                    </button>
                                </div>
                                <div class="col-xs-6 pull-right block-center">
                                    <button id="wizard-subm" style="display:none" type="submit" class="btn btn-success flat btn-irv">
                                        Submit
                                    </button>
                                </div>
                            @else
                               @yield('navigation')
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="{{asset('installer/js//script.js')}}"></script>

</body>
</html>

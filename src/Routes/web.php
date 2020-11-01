<?php

Route::group(['prefix' => 'install', 'as' => 'LaravelInstaller::', 'namespace' => 'RifRocket\LaravelInstaller\Controllers', 'middleware' => ['web', 'install']], function () {

    Route::get('/', [
        'as' => 'welcome',
        'uses' => 'WelcomeController@welcome',
    ]);
    Route::get('environment', [
        'as' => 'environment',
        'uses' => 'EnvironmentController@environmentMenu',
    ]);

    Route::get('environment/wizard', [
        'as' => 'environmentWizard',
        'uses' => 'EnvironmentController@environmentWizard',
    ]);

    Route::post('environment/saveWizard', [
        'as' => 'environmentSaveWizard',
        'uses' => 'EnvironmentController@saveWizard',
    ]);

    Route::get('requirements', [
        'as' => 'requirements',
        'uses' => 'RequirementsController@requirements',
    ]);

    Route::get('permissions', [
        'as' => 'permissions',
        'uses' => 'PermissionsController@permissions',
    ]);

    Route::get('database', [
        'as' => 'database',
        'uses' => 'DatabaseController@database',
    ]);

    Route::get('final', [
        'as' => 'final',
        'uses' => 'FinalController@finish',
    ]);

    Route::post('api/progress_url_add', [
        'as' => 'apiProgress_url_add',
        'uses' => 'ProgressBarController@add_session_complete_steps',
    ]);
    Route::post('api/progress_url_sub', [
        'as' => 'apiProgress_url_sub',
        'uses' => 'ProgressBarController@sub_session_complete_steps',
    ]);
});

Route::group(['prefix' => 'update', 'as' => 'LaravelUpdater::', 'namespace' => 'RifRocket\LaravelInstaller\Controllers', 'middleware' => 'web'], function () {
    Route::group(['middleware' => 'update'], function () {
        Route::get('/', [
            'as' => 'welcome',
            'uses' => 'UpdateController@welcome',
        ]);

        Route::get('overview', [
            'as' => 'overview',
            'uses' => 'UpdateController@overview',
        ]);

        Route::get('database', [
            'as' => 'database',
            'uses' => 'UpdateController@database',
        ]);
    });

    // This needs to be out of the middleware because right after the migration has been
    // run, the middleware sends a 404.
    Route::get('final', [
        'as' => 'final',
        'uses' => 'UpdateController@finish',
    ]);
});

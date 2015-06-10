@extends('layouts.default')

@section('page')

    <div class="ui form" id="get_password">
        <div class="field">
            <label for="">{{ trans('vault.form.decrypt_password_label') }}</label>
            <input type="text" name="decrypt_password" id="decrypt_password" placeholder="{{ trans('vault.form.decrypt_password_placeholder') }}">
        </div>
        <div class="field">
            <button class="ui right labeled button icon primary" id="display_message">
                {{ trans('vault.form.decrypt_button') }}
                <i class="eye icon"></i>
            </button>
        </div>
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="content">
                <div class="header">
                    {{ trans('vault.incorrect_password_title') }}
                </div>
                <p>{{ trans('vault.incorrect_password_text')}}</p>
            </div>
        </div>
    </div>
    <h4 class="ui header">{{ trans('vault.form.secret_text_label') }} </h4>
    <div class="ui secondary segment" id="view_body">
        <!-- Loader -->
        <div class="ui dimmer">
            <div class="ui text loader">{{ trans('vault.loader_text') }}</div>
        </div>
        <span>{{ trim($encrypted_text) }}</span>
    </div>

@stop

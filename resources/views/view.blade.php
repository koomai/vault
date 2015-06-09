@extends('layouts.default')

@section('page')

    <div class="ui form" id="get_password">
        <div class="field">
            <label for="">{{ trans('vault.decrypt_password') }}
                ({{ trans('vault.decrypt_password_info') }})</label>
            <input type="text" name="decrypt_password" id="decrypt_password">
        </div>
        <div class="field">
            <button class="ui right labeled button icon primary" id="display_message">
                {{ trans('vault.display_message') }}
                <i class="eye icon"></i>
            </button>
        </div>
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="content">
                <div class="header">
                    Incorrect Password
                </div>
                <p>Please try again with the correct password.</p>
            </div>
        </div>
    </div>
    <h4 class="ui header">{{ trans('vault.message') }} </h4>
    <div class="ui secondary segment" id="view_body" style="word-wrap:break-word">
        <!-- Loader -->
        <div class="ui dimmer">
            <div class="ui text loader">Decrypting</div>
        </div>
        <span>{{ trim($encrypted_text) }}</span>
    </div>

@stop

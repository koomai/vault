@extends('layouts.default')

@section('page')

    <form method="POST" action="{{ $app->url->to('/') }}" id="create_form" class="ui form" novalidate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field">
            <label>{{ trans('vault.text') }}</label>
            <textarea name="textbox" id="textbox" required></textarea>
        </div>
        <div class="two fields">
            <div class="field">
                <label>{{ trans('vault.shared_password_info') }}</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="field">
                <label>{{ trans('vault.expire_after') }}</label> 
                <select name="expire" id="expire" class="ui dropdown" required>
                    @foreach (config('vault.minutes') as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <button type="submit" class="ui fluid right labeled icon button primary" id="encode_button">
                    {{ trans('vault.submit') }}
                    <i class="lock icon"></i>
                </button>
            </div>
        </div>
    </form>

    <div id="results" class="ui modal">
        <div class="header">
            {{ trans('vault.modal_title') }}
        </div>
        <div class="content">
            <div class="ui form">
                <div class="field">
                    <label>{{ trans('vault.modal_message') }}</label>
                    <textarea name="copy_text" id="copy_text"></textarea>
                </div>
            </div>
        </div>
        <div style="background: #efefef;padding: 1rem 2rem;border-top: 1px solid rgba(39,41,43,.15);text-align: right;">
            <button class="ui right labeled button icon blue" id="copy_button" data-clipboard-target="copy_text">
                {{ trans('vault.copy_to_clipboard') }}
                <i class="copy icon"></i>
            </button>
        </div>
    </div>

    <!-- Error Template -->
    <div id="error" style="display:none">
        <div class="ui icon negative message">
            <i class="warning sign icon"></i>
            <div class="content">
                <div class="header">
                    Oops! Something went wrong.
                </div>
                <p>There was an error encrypting your text. Please refresh the page and try again.</p>
            </div>
        </div>
    </div>

    <script type="text/template" id="response_template">
        {{ trans('vault.copymessage') }}
    </script>
@stop

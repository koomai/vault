@extends('layouts.default')

@section('page')

    <form method="POST" action="/" class="ui form" novalidate>
        <div class="field">
            <label>{{ trans('vault.form.text_label') }}</label>
            <textarea name="textbox" id="textbox" placeholder="{{ trans('vault.form.text_placeholder') }}"required></textarea>
        </div>
        <div class="two fields">
            <div class="field">
                <label>{{ trans('vault.form.password_label') }}</label>
                <input type="password" id="password" name="password" placeholder="{{ trans('vault.form.password_placeholder')  }}" required>
            </div>
            <div class="field">
                <label>{{ trans('vault.form.expire_label') }}</label>
                <select name="expire" id="expire" class="ui dropdown" required>
                    @foreach (config('vault.minutes') as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <button type="submit" class="ui fluid right labeled icon button primary">
                    {{ trans('vault.form.submit_button') }}
                    <i class="lock icon"></i>
                </button>
            </div>
            <div class="field"></div>
        </div>

        <div class="hidden field" id="error">
            <div class="ui icon negative message">
                <i class="warning sign icon"></i>
                <div class="content">
                    <div class="header">
                        {{ trans('vault.error_title') }}
                    </div>
                    <p>{{ trans('vault.error_text') }}</p>
                </div>
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
                    <label>{{ trans('vault.modal_text') }}</label>
                    <textarea name="copy_text" id="copy_text"></textarea>
                </div>
            </div>
        </div>
        <div class="footer">
            <button class="ui right labeled button icon blue" id="copy_button" data-clipboard-target="#copy_text">
                {{ trans('vault.copy_to_clipboard') }}
                <i class="copy icon"></i>
            </button>
        </div>
    </div>
    <script type="text/template" id="response_template">
        {{ trans('vault.modal_message') }}
    </script>
@stop

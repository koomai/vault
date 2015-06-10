@extends('layouts.default')

@section('page')
    <div class="ui icon negative message">
        <i class="warning sign icon"></i>
        <div class="content">
            <div class="header">
                {{ trans('vault.expired_link_title')}}
            </div>
            <p>{{ trans('vault.expired_link_text') }}</p>
        </div>
    </div>
@stop

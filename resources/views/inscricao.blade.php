@extends('admin::layouts.out')

@section('page_title')
    {{ __('admin::app.leads.create-title') }}
@stop

@section('content-wrapper')
    <div class="content full-page adjacent-center">
        {!! view_render_event('admin.leads.create.header.before') !!}

        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.leads.create-title') }}</h1>
            </div>
        </div>

        {!! view_render_event('admin.leads.create.header.after') !!}

        <form method="POST" action="{{ route('admin.leads.store') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-content">
                <div class="form-container">

                    <div class="panel">
                        <div class="panel-header">
                            {!! view_render_event('admin.leads.create.form_buttons.before') !!}

                            <button type="submit" class="btn btn-md btn-primary">
                                {{ __('admin::app.leads.save-btn-title') }}
                            </button>

                            <a href="{{ route('admin.leads.index') }}">{{ __('admin::app.leads.back') }}</a>

                            {!! view_render_event('admin.leads.create.form_buttons.after') !!}
                        </div>
        
                        {!! view_render_event('admin.leads.create.form_controls.before') !!}

                        @csrf()
                        
                            <input type="hidden" id="lead_pipeline_stage_id" name="lead_pipeline_stage_id" value="{{ request('stage_id') }}" />

                            {!! view_render_event('admin.leads.create.form_controls.contact_person.before') !!}

                            <div name="{{ __('admin::app.leads.contact-person') }}">
                                {{-- <div class="form-group">
                                    <label for="person[name]" class="required">Nome</label> 
                                    <input type="text" name="person[name]" id="person[name]" autocomplete="off" placeholder="Digite Seu Nome" data-vv-as="&quot;Nome&quot;" class="control" aria-required="true" aria-invalid="false">
                                    <div class="lookup-results">
                                        <ul></ul>
                                    </div>
                                </div>
                                <div class="form-group email">
                                    <label for="person[emails]" class="required">E-mail</label> 
                                    <div class="emails-control">
                                        <div class="form-group input-group">
                                            <input type="text" placeholder="Digite Seu E-mail" name="person[emails]" data-vv-as="Email" class="control" aria-required="true" aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div> --}}
                                @include('admin::leads.common.contact')

                                <contact-component :data='@json(old('person'))'></contact-component>
                            </div>

                            {!! view_render_event('admin.leads.create.form_controls.contact_person.after') !!}

                        {!! view_render_event('admin.leads.create.form_controls.after') !!}

                        {!! view_render_event('admin.leads.create.form_buttons.before') !!}

                        <button type="submit" class="btn btn-primary" style="width: -webkit-fill-available;">
                            {{ __('admin::app.leads.save-btn-title') }}
                        </button>

                        {!! view_render_event('admin.leads.create.form_buttons.after') !!}

                    </div>

                </div>

            </div>

        </form>

    </div>
@stop
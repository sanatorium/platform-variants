@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
{{{ trans("action.{$mode}") }}} {{ trans('sanatorium/variants::variants/common.title') }}
@stop

{{-- Queue assets --}}
{{ Asset::queue('validate', 'platform/js/validate.js', 'jquery') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- Page content --}}
@section('page')

<section class="panel panel-default panel-tabs">

	{{-- Form --}}
	<form id="variants-form" action="{{ request()->fullUrl() }}" role="form" method="post" data-parsley-validate>

		{{-- Form: CSRF Token --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<header class="panel-heading">

			<nav class="navbar navbar-default navbar-actions">

				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#actions">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="btn btn-navbar-cancel navbar-btn pull-left tip" href="{{ route('admin.sanatorium.variants.variants.all') }}" data-toggle="tooltip" data-original-title="{{{ trans('action.cancel') }}}">
							<i class="fa fa-reply"></i> <span class="visible-xs-inline">{{{ trans('action.cancel') }}}</span>
						</a>

						<span class="navbar-brand">{{{ trans("action.{$mode}") }}} <small>{{{ $variant->exists ? $variant->id : null }}}</small></span>
					</div>

					{{-- Form: Actions --}}
					<div class="collapse navbar-collapse" id="actions">

						<ul class="nav navbar-nav navbar-right">

							@if ($variant->exists)
							<li>
								<a href="{{ route('admin.sanatorium.variants.variants.delete', $variant->id) }}" class="tip" data-action-delete data-toggle="tooltip" data-original-title="{{{ trans('action.delete') }}}" type="delete">
									<i class="fa fa-trash-o"></i> <span class="visible-xs-inline">{{{ trans('action.delete') }}}</span>
								</a>
							</li>
							@endif

							<li>
								<button class="btn btn-primary navbar-btn" data-toggle="tooltip" data-original-title="{{{ trans('action.save') }}}">
									<i class="fa fa-save"></i> <span class="visible-xs-inline">{{{ trans('action.save') }}}</span>
								</button>
							</li>

						</ul>

					</div>

				</div>

			</nav>

		</header>

		<div class="panel-body">

			<div role="tabpanel">

				{{-- Form: Tabs --}}
				<ul class="nav nav-tabs" role="tablist">
					<li class="active" role="presentation"><a href="#general-tab" aria-controls="general-tab" role="tab" data-toggle="tab">{{{ trans('sanatorium/variants::variants/common.tabs.general') }}}</a></li>
					<li role="presentation"><a href="#attributes" aria-controls="attributes" role="tab" data-toggle="tab">{{{ trans('sanatorium/variants::variants/common.tabs.attributes') }}}</a></li>
				</ul>

				<div class="tab-content">

					{{-- Tab: General --}}
					<div role="tabpanel" class="tab-pane fade in active" id="general-tab">

						<fieldset>

							<div class="row">

								<div class="form-group{{ Alert::onForm('slug', ' has-error') }}">

									<label for="slug" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.slug_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.slug') }}}
									</label>

									<input type="text" class="form-control" name="slug" id="slug" placeholder="{{{ trans('sanatorium/variants::variants/model.general.slug') }}}" value="{{{ input()->old('slug', $variant->slug) }}}">

									<span class="help-block">{{{ Alert::onForm('slug') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('code', ' has-error') }}">

									<label for="code" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.code_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.code') }}}
									</label>

									<input type="text" class="form-control" name="code" id="code" placeholder="{{{ trans('sanatorium/variants::variants/model.general.code') }}}" value="{{{ input()->old('code', $variant->code) }}}">

									<span class="help-block">{{{ Alert::onForm('code') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('ean', ' has-error') }}">

									<label for="ean" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.ean_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.ean') }}}
									</label>

									<input type="text" class="form-control" name="ean" id="ean" placeholder="{{{ trans('sanatorium/variants::variants/model.general.ean') }}}" value="{{{ input()->old('ean', $variant->ean) }}}">

									<span class="help-block">{{{ Alert::onForm('ean') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('weight', ' has-error') }}">

									<label for="weight" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.weight_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.weight') }}}
									</label>

									<input type="text" class="form-control" name="weight" id="weight" placeholder="{{{ trans('sanatorium/variants::variants/model.general.weight') }}}" value="{{{ input()->old('weight', $variant->weight) }}}">

									<span class="help-block">{{{ Alert::onForm('weight') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('stock', ' has-error') }}">

									<label for="stock" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.stock_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.stock') }}}
									</label>

									<input type="text" class="form-control" name="stock" id="stock" placeholder="{{{ trans('sanatorium/variants::variants/model.general.stock') }}}" value="{{{ input()->old('stock', $variant->stock) }}}">

									<span class="help-block">{{{ Alert::onForm('stock') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('parent_id', ' has-error') }}">

									<label for="parent_id" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/variants::variants/model.general.parent_id_help') }}}"></i>
										{{{ trans('sanatorium/variants::variants/model.general.parent_id') }}}
									</label>

									<input type="text" class="form-control" name="parent_id" id="parent_id" placeholder="{{{ trans('sanatorium/variants::variants/model.general.parent_id') }}}" value="{{{ input()->old('parent_id', $variant->parent_id) }}}">

									<span class="help-block">{{{ Alert::onForm('parent_id') }}}</span>

								</div>


							</div>

						</fieldset>

					</div>

					{{-- Tab: Attributes --}}
					<div role="tabpanel" class="tab-pane fade" id="attributes">
						@attributes($variant)
					</div>

				</div>

			</div>

		</div>

	</form>

</section>
@stop

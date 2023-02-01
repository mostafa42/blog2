@extends('admin.layouts.app')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->

                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url('/dashboard')}}" class="text-muted text-hover-primary">{{
                                __("language.Dashboard") }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">{{__("language.questions")}}</span>
                            {{-- <span class="text-muted mt-1 fw-semibold fs-7">Over {{ $currency->count() }} --}}
                                {{-- currencies</span> --}}
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <form style="display: contents"
                                action="{{route('questions-titles.update' , $question->id)}}" method="post">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="fv-row mb-8">
                                    <!--begin::Type Code-->
                                    <input type="text" name="type" hidden value="{{ $question->type }}">
                                    <label> {{ __("language.Title") }} in english </label>
                                    <input type="text" value="{{ $question->getTranslations('title')["en"] }}"
                                        placeholder="{{ __(" language.Title") }}" name="title_en" autocomplete="off"
                                        class="form-control bg-transparent" />
                                    <!--end::Type Code-->
                                </div>

                                <div class="fv-row mb-8">
                                    <!--begin::Type Code-->
                                    <label> {{ __("language.Title") }} in arabic </label>
                                    <input type="text" value="{{ $question->getTranslations('title')["ar"] }}"
                                        placeholder="{{ __(" language.Title") }}" name="title_ar" autocomplete="off"
                                        class="form-control bg-transparent" />
                                    <!--end::Type Code-->
                                </div>

                                @if ($question->details->count() > 0)
                                    @foreach ($question->details as $details)
                                        <div class="fv-row mb-8">
                                            <!--begin::Type Code-->
                                            <label> {{ __("language.choice") }} in arabic </label>
                                            <input type="text" value="{{ $details->getTranslations('details')["ar"] }}"
                                                placeholder="{{ __(" language.Title") }}" name="choice_ar[]" autocomplete="off"
                                                class="form-control bg-transparent" />
                                            <!--end::Type Code-->
                                        </div>

                                        <div class="fv-row mb-8">
                                            <!--begin::Type Code-->
                                            <label> {{ __("language.choice") }} in english </label>
                                            <input type="text" value="{{ $details->getTranslations('details')["en"] }}"
                                                placeholder="{{ __(" language.Title") }}" name="choice_en[]" autocomplete="off"
                                                class="form-control bg-transparent" />
                                            <!--end::Type Code-->
                                        </div>
                                    @endforeach
                                @endif

                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Update</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                </div>
                            </form>
                            <hr>
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>



            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->

    <!--end::Footer-->
</div>



@endsection
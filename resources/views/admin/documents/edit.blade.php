@extends('admin.layouts.app')
@section('content')
<nav aria-label="breadcrumb" style="padding: 40px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/documents-types">Types</a>></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Type</li>
    </ol>
</nav>
<div class="mb-10" style="background-color: #fff; width: 60%; margin: auto; padding: 10px;">
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="{{route('types.update' , $type->id)}}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Updating Type {{ $type->type_code }}</h1>
            <!--end::Title-->
        </div>
        <div class="text-center py-3">
            @if(session()->has('message'))

            <div class="alert alert-success" role="alert" id="alert">
                {{session()->get('message')}}
            </div>

            @endif
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Type Code-->
            <input type="text" placeholder="Type Code" name="type_code" value="{{$type->type_code}}" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Type Code-->
        </div>
        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Type Description in english" name="type_description_en"
                value="{{$type->getTranslations('type_description')['en']}}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Type Description-->
        </div>

        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Type Description in arabic" name="type_description_ar"
                value="{{$type->getTranslations('type_description')['ar']}}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Type Description-->
        </div>

        <div class="fv-row mb-8">
            <!--begin::Document Code-->
            <input type="text" placeholder="Document Code" name="document_code" value="{{$type->document_code}}"
                autocomplete="off" class="form-control bg-transparent" />
            <!--end::Document Code-->
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Document Description in english" name="document_description_en"
                value="{{$type->getTranslations('document_description')['en']}}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Document Description-->
        </div>

        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Document Description in arabic" name="document_description_ar"
                value="{{$type->getTranslations('document_description')['ar']}}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Document Description-->
        </div>

        <!--end::Hint-->
</div>

<!--end::Input group=-->
<!--begin::Submit button-->
<div class="d-grid mb-10">
    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
        <!--begin::Indicator label-->
        <span class="indicator-label">Update</span>
        <!--end::Indicator label-->
        <!--begin::Indicator progress-->
        <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        <!--end::Indicator progress-->
    </button>
</div>
</form>
</div>

@endsection

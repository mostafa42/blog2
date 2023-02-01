@extends('admin.layouts.app')
@section('content')
<nav aria-label="breadcrumb" style="padding: 40px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/provinces">Provinces</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Province</li>
    </ol>
</nav>
<div class="mb-10" style="background-color: #fff; width: 60%; margin: auto; padding: 10px;">
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="{{route('provinces.update' , $province->id)}}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Updating Province "{{ $province->province_code }}"</h1>
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
            <input type="text" placeholder="Province Code" name="province_code" value="{{$province->province_code}}" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Type Code-->
        </div>
        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Province Name in english" name="province_name_en"
                value="{!!$province->getTranslations('province_name')["en"]!!}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Type Description-->
        </div>
        <div class="fv-row mb-8">
            <!--begin::Type Description-->
            <input type="text" placeholder="Province Name in arabic" name="province_name_ar"
                value="{!!$province->getTranslations('province_name')["ar"]!!}" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Type Description-->
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

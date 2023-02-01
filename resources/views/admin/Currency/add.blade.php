@extends('admin.layouts.app')

@section('content')
<nav aria-label="breadcrumb" style="padding: 40px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('currency')}}">Currency</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add new currency</li>
    </ol>
</nav>
<!--begin::Modal body-->
<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
    <!--begin::Users-->
    <div class="mb-10">
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="{{url('currency')}}"
            method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Creating currency</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-6">
                <!--begin::Name-->
                <input type="text" placeholder="Name" name="name" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Name-->
            </div>
            <div class="fv-row mb-6">
                <!--begin::Name-->
                <input type="text" placeholder="Arabic Name" name="ar_name" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Name-->
            </div>
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Rate" name="rate" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
          
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
        </form>
    </div>
    <!--end::Users-->
</div>
<!--end::Modal body-->

@endsection
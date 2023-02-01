<!--begin::Modal - Invite Friends-->
<div class="modal fade" id="select_box" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Users-->
                <div class="mb-10">
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"
                        action="{{url('store-question' , $document->id)}}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">{{__("language.Creating input text question")}}</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-6">
                            <!-- begin:Input contain document id -->
                            <input type="text" value="{{$document->id}}" hidden name="document_id">
                            <input type="text" name="type" hidden value="select_box">
                            <!-- end:Input contain document id -->
                            <!--begin::Name-->
                            <input type="text" placeholder="{{ __(" language.Title") }} in english" name="title_en"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Name-->
                        </div>

                        <div class="fv-row mb-6">
                            <!--begin::Name-->
                            <input type="text" placeholder="{{ __(" language.Title") }} in arabic" name="title_ar"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Name-->
                        </div>

                        <p class="btn btn-primary" onclick="addChoice()">{{__("language.add choice")}}</p>

                        <div id="form_choice_details"></div>

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
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Invite Friend-->

<script>
    function addChoice() {
            var x = 1;
            var x = x + $("#form_choice_details *").length;

            $('#form_choice_details').append('<div class="container"><div class="row"><div class="col-lg-6"><input class="form-control" name="choice_ar[' + x + ']" type="text" placeholder="choice in arabic"></div><div class="col-lg-6"><input class="form-control" name="choice_en[' + x + ']" type="text" placeholder="choice in english"></div></div></div><br>');
            
            
    }
</script>
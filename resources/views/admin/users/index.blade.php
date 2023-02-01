@extends('admin.layouts.app')

@section('content')


<!--begin::Body-->
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
                            <a href="{{url('/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <a href="{{url('/users')}}" class="text-muted text-hover-primary">Users</a>
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
                            <span class="card-label fw-bold fs-3 mb-1">Users</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Over {{ $users->count() }} Users</span>
                        </h3>
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
                            <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->New User
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted">
                        <th class="min-w-200px">Name</th>
                        <th class="min-w-150px">Email</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @if ($users->count() > 0)
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px me-5">
                                    <img src="{{asset('media/avatars/300-14.jpg')}}" alt="" />
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <p class="text-dark fw-bold fs-6">{{$user->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-dark fw-bold d-block fs-6">{{$user->email}}</p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                @if ($user->active == 0) <!-- inactive -->
                                    <a href="{{route('users.active' , $user->id)}}" class="btn btn-success">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        activation
                                        <!--end::Svg Icon-->
                                    </a>
                                @else <!-- active -->
                                    <a href="{{route('users.inactive' , $user->id)}}" class="btn btn-danger">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        inactive
                                        <!--end::Svg Icon-->
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h3 class="card-title align-items-start flex-column">
                        <span class="text-muted mt-1 fw-semibold fs-7">No inactive users</span>
                    </h3>
                    @endif

                </tbody>
                <!--end::Table body-->
            </table>
                            <!--end::Table-->
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
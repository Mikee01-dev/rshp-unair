@extends('layouts.lte.main')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            </div>
        </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l.868 5.839a.75.75 0 00.732.632h11.451a.75.75 0 00.732-.632l.868-5.839a.375.375 0 00.362-.278h1.386a.75.75 0 000-1.5H2.25z"></path>
                                <path fill-rule="evenodd" d="M1.5 8.25a.75.75 0 01.75.75v8.25a.75.75 0 00.75.75h11.25a.75.75 0 00.75-.75v-8.25a.75.75 0 011.5 0v8.25a2.25 2.25 0 01-2.25 2.25H3a2.25 2.25 0 01-2.25-2.25v-8.25a.75.75 0 01.75-.75zM10.875 12a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0v-4.5zM8.25 10.5a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM13.5 12.75a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0v-3.75a.75.75 0 01.75-.75z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                    </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>53<sup class="fs-7">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.035-.84-1.875-1.875-1.875h-.75zM9.75 8.625c-1.035 0-1.875.84-1.875 1.875v10.5c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V10.5c0-1.035-.84-1.875-1.875-1.875h-.75zM3 15.375c-1.035 0-1.875.84-1.875 1.875v3.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875v-3.75c0-1.035-.84-1.875-1.875-1.875h-.75z"></path>
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
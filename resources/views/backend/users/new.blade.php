@extends('layouts.backend')

@section('content')


<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12 col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="p-3 rounded">
                        <h6 class="mb-0">Add User</h6>
                        <hr />
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <div style="border-radius: 50%;height:200px;width:200px;overflow:hidden" class="m-auto">
                                    <img src="{{asset('backend_assets/images/avatars/avatar-1.png')}}" id="uppic" alt="" style="background-size: cover;height:100%;width:100%;">
                                </div>
                            </div>
                            <div class="col-6">
                                <form class="row g-3">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Name <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Enter your name">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email <small class="text-danger">*</small></label>
                                        <input type="email" class="form-control" placeholder="Enter your email">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Phone <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Enter your phone">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Role <small class="text-danger">*</small></label>
                                        <select name="" id="" class="form-control">
                                            <option value="">-- Select a option</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Developer</option>
                                            <option value="3">Office Staff</option>
                                            <option value="4">Freelancer</option>
                                            <option value="5">Visitor</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Enter your password">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Upload Photo</label>
                                        <input type="file" class="form-control" onchange="document.getElementById('uppic').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Add User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

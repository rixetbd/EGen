@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <div class="profile-avatar text-center">
                    <img src="{{asset('uploads')}}/{{$data->photo}}" class="rounded-circle shadow" width="120"
                        height="120" alt="" id="uppic">
                </div>
                <div class="text-center mt-4">
                    <h4 class="mb-1">{{$data->name}}</h4>
                    <p class="mb-0 text-secondary">{{$data->role}}</p>
                    <div class="mt-4"></div>

                </div>
                <hr>
                <div class="text-start">
                    <h5 class="">About</h5>
                    <p class="mb-0">{{$data->about != "" ? Str::limit($data->about, 200) : "Write your bio ..."}}</p>
                </div>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Designation <span class="">{{$data->role}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                        City <span class="">{{$data->city}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Join Date
                        <span class="">{{$data->created_at->format('d M Y')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Last Update
                        <span class="">{{$data->updated_at != ""? $data->updated_at->diffForHumans():"Not yet"}}</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-0">Account Info</h5>
                <hr>
                <div class="card shadow-none border">
                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{route('user_update')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$data->name}}"
                                    >
                                <input type="hidden" name="id" value="{{$data->id}}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" value="{{$data->email}}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{$data->city}}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">About Me</label>
                                <textarea name="about" class="form-control" rows="4" cols="4"
                                    placeholder="Describe yourself...">{{$data->about}}</textarea>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Role <span class="text-danger">*</span></label>
                                @if ($data->role == "Admin" || $data->role == "Developer")
                                <select name="role" class="form-control">
                                    <option value="">-- Select a option</option>
                                    <option value="Admin" {{$data->role == "Admin"?"Selected":""}}>Admin</option>
                                    <option value="Developer" {{$data->role == "Developer"?"Selected":""}}>
                                        Developer</option>
                                    <option value="Office Staff" {{$data->role == "Office Staff"?"Selected":""}}>
                                        Office Staff</option>
                                    <option value="Freelancer" {{$data->role == "Freelancer"?"Selected":""}}>
                                        Freelancer</option>
                                    <option value="Visitor" {{$data->role == "Visitor"?"Selected":""}}>Visitor
                                    </option>
                                </select>
                                @else
                                <input name="role" class="form-control" readonly value="{{$data->role}}">
                                </select>
                                @endif
                            </div>
                            <div class="col-6">
                                <label class="form-label">Upload Photo</label>
                                <input type="file" name="photo" class="form-control"
                                    onchange="document.getElementById('uppic').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <input type="new_password" class="form-control" placeholder="Enter new password">
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--end row-->

@endsection

@extends('layouts.backend')

@section('style')
<link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="d-flex justify-content-between">
    <h6 class="mb-0">Users Information</h6>
    @if (Auth::user()->role == "Admin" || Auth::user()->role == "Developer")
    <a href="{{route('user_new')}}" class="mb-0 btn btn-sm btn-primary"><i class="bx bx-plus"></i> Add User</a>
    @endif
</div>

<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Start Date</th>
                        @if (Auth::user()->role == "Admin" || Auth::user()->role == "Developer")
                        <th class="text-center">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all_users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at->format('d M Y')}}</td>
                        @if (Auth::user()->role == "Admin" || Auth::user()->role == "Developer")
                        <td class="text-center">
                                {{-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a> --}}
                                <a href="{{route('user_edit', Crypt::encrypt($user->id))}}" class="text-warning mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="{{route('user_delete', Crypt::encrypt($user->id))}}" class="text-danger mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection



@section('script')
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('backend_assets')}}/js/table-datatable.js"></script>
@endsection

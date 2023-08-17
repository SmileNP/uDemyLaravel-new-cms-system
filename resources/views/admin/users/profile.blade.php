<x-admin-master>
    @section('content')
        <h1>User Profile for: {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <img class="img-profile rounded-circle" height="60px" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               name="username"
                               class="form-control @error('username') is-invalid @enderror"
                               id="username"
                               aria-describedby=""
                               value="{{$user->username}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               aria-describedby=""
                               value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               aria-describedby=""
                               value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               id="password"
                               aria-describedby="">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               id="password-confirmation"
                               aria-describedby="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('message'))
                    {{--        <div class="alert alert-danger">{{Session::get('message')}}</div>--}}
                    <div class="alert alert-danger">{{session('message')}}</div>
                @elseif(session('post-created-message'))
                    <div class="alert alert-success">{{session('post-created-message')}}</div>

                @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <td>Name</td>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <td>Name</td>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td><input type="checkbox"
                                                   @foreach($user->roles as $user_role)
                                                       @if($user_role->slug == $role->slug)
                                                           checked
                                                @endif
                                                @endforeach
                                            ></td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form action="{{route('user.role.attach', $user)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-primary"
                                                        @if($user->roles->contains($role)) disabled @endif
                                                >Attach
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('user.role.detach', $user)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger"
                                                        @if(!$user->roles->contains($role)) disabled @endif
                                                >Detach</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{--        <div class="d-flex">--}}
                {{--            <div class="mx-auto">--}}
                {{--                {{$posts->links('pagination::bootstrap-4')}}--}}
                {{--            </div>--}}
                {{--        </div>--}}

                @section('scripts')
                    <!-- Page level plugins -->
                    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
                    <!-- Page level custom scripts -->
                    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
                @endsection
            </div>
        </div>
    @endsection
</x-admin-master>

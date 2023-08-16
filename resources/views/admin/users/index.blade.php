<x-admin-master>
    @section('content')
        <h1>All Users</h1>

        @if(Session::has('message'))
            {{--        <div class="alert alert-danger">{{Session::get('message')}}</div>--}}
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('user-created-message'))
            <div class="alert alert-success">{{session('user-created-message')}}</div>

        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <td>Username</td>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <td>Username</td>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td><img height="50px" src="{{$user->avatar}}" alt=""></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
{{--                {{$users->links('pagination::bootstrap-4')}}--}}
{{--            </div>--}}
{{--        </div>--}}
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>

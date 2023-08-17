<x-admin-master>
    @section('content')
        @if(Session::has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>
        @endif
        <div class="row">

            <div class="col-sm-6">
                <h1>Edit Permission {{$permission->name}}</h1>


                <form action="{{route('permissions.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$permission->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                @if($roles->isNotEmpty())--}}
{{--                    <div class="card shadow mb-4">--}}
{{--                        <div class="card-header py-3">--}}
{{--                            <h6 class="m-0 font-weight-bold text-primary">Roles Table</h6>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Options</th>--}}
{{--                                        <th>Id</th>--}}
{{--                                        <td>Name</td>--}}
{{--                                        <th>Slug</th>--}}
{{--                                        <th>Attach</th>--}}
{{--                                        <th>Detach</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>Options</th>--}}
{{--                                        <th>Id</th>--}}
{{--                                        <td>Name</td>--}}
{{--                                        <th>Slug</th>--}}
{{--                                        <th>Attach</th>--}}
{{--                                        <th>Detach</th>--}}
{{--                                    </tr>--}}
{{--                                    </tfoot>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <tr>--}}
{{--                                            <td><input type="checkbox"--}}
{{--                                                       @foreach($permission->roles as $permission_role)--}}
{{--                                                           @if($role_permission->slug == $permission->slug)--}}
{{--                                                               checked--}}
{{--                                                    @endif--}}
{{--                                                    @endforeach--}}
{{--                                                ></td>--}}
{{--                                            <td>{{$permission->id}}</td>--}}
{{--                                            <td>{{$permission->name}}</td>--}}
{{--                                            <td>{{$permission->slug}}</td>--}}
{{--                                            <td>--}}
{{--                                                <form action="{{route('roles.permission.attach', $role->id)}}" method="post">--}}
{{--                                                    @method('PUT')--}}
{{--                                                    @csrf--}}
{{--                                                    <input type="hidden" name="permission" value="{{$permission->id}}">--}}
{{--                                                    <button class="btn btn-primary"--}}
{{--                                                            @if($role->permissions->contains($permission)) disabled @endif--}}
{{--                                                    >Attach--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <form action="{{route('roles.permission.detach', $role->id)}}" method="post">--}}
{{--                                                    @method('PUT')--}}
{{--                                                    @csrf--}}
{{--                                                    <input type="hidden" name="permission" value="{{$permission->id}}">--}}
{{--                                                    <button class="btn btn-danger"--}}
{{--                                                            @if(!$role->permissions->contains($permission)) disabled @endif--}}
{{--                                                    >Detach</button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
    @endsection
</x-admin-master>

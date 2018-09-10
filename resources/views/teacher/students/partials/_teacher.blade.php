<thead>

<tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Active</th>
    <th scope="col">Actions</th>
</tr>

</thead>
<tbody>
@foreach($teachers as $teacher)
    <tr>
        <td>{{ $teacher->first_name }}</td>
        <td>{{ $teacher->last_name }}</td>
        <td>
            @if($teacher->is_active == 1)
                <span class="badge badge-pill badge-warning">Active</span>
            @else
                <span class="badge badge-pill badge-danger">No Active</span>
            @endif

        </td>

        <td>
            <a href="#" class="btn btn-primary btn-xs">View</a>
            <a href="#" class="btn btn-success btn-xs">Update</a>
            <a href="{{route('admin.teachers.delete',$teacher->id)}}" class="btn btn-danger btn-xs" >Delete</a>
        </td>
    </tr>
@endforeach
</tbody>
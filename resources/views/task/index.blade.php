@include('header');

<div class="container">
    <h3>Task List <a class="btn btn-success pull-right" href="{{route('add.task')}}">Add Task</a></h3>
    <div class="table-responsive">
        <table class="table table-striped  mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Assign To</th>
                <th scope="col">Assign By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($task as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->emp_name}}</td>
                        <td>{{$item->assign_by}}</td>
                        <td>
                            <a href="{{route('task.edit',$item->id)}}" class="btn btn-success text-light"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{route('task.delete',$item->id)}}" class="btn btn-danger text-light" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
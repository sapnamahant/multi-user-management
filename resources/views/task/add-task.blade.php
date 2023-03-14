@include('header');

<div class="container">
  <h3>Add Task</h3>
    <form action="{{route('add.task')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" name="title" value="@if(isset($task)) {{$task->title}} @endif">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Assign To</label>
            <select class="form-control" name="employee" id="exampleFormControlSelect1">
              <option>Select Employee</option>
              @foreach ($employee as $item)
                <option value="{{$item->id}}" @if(isset($task) && $task->employee == $item->id) {{'selected'}} @endif>{{$item->name}}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="id" value="@if(isset($task)) {{$task->id}} @endif">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
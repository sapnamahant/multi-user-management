@include('header');

<div class="container">
  <h3>Manager Registration</h3>
    <form action="{{route('add.manager')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="@if(isset($manager)) {{$manager->name}} @endif">
        </div>
        <span class="danger" >
            @error('name')
            {{$message}}
            @enderror
        </span> 
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="@if(isset($manager)) {{$manager->email}} @endif">
        </div>
        <span class="danger" >
            @error('email')
            {{$message}}
            @enderror
        </span>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="@if(isset($manager)) {{$manager->password}} @endif">
        </div>
        <span class="danger" >
            @error('password')
              {{$message}}
            @enderror
        </span>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="@if(isset($manager)) {{$manager->mobile}} @endif">
        </div>
        <span class="danger" >
            @error('mobile')
              {{$message}}
            @enderror
        </span>
        <input type="hidden" name="id" value="@if(isset($manager)) {{$manager->id}} @endif">
        <div class="form-actions form-group">
            @if(isset($manager))
            <button type="submit" class="btn btn-success btn-sm">Update</button>
            @else
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
            @endif
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
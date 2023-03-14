@include('header')

<div class="container mt-5">
    <h3>Task List</h3>
    <div class="row my-3">
       @if(isset($task))
       @foreach ($task as $item)
       <div class="col-md-4 mt-2">
           <div class="card">
               <div class="card-body">
                   <h4 class="cart-title">
                       {{$item->title}}
                   </h4>
                   
                   <p class="card-text">
                       @if(Auth::user()->role != 3)
                      <b>Assign To</b> {{$item->emp_name}} <br>
                      @endif
                      <b>Assign By</b> {{$item->assign_by}}
                   </p>
               </div>
           </div>
       </div>
       @endforeach
       @endif
    </div>
</div>
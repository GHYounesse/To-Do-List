<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2bbc5eb9b7.js" crossorigin="anonymous"></script>
        <title>To-Do-List</title>
    </head>
<body>
<style>
    #list1 .form-control {
  border-color: transparent;
}
#list1 .form-control:focus {
  border-color: transparent;
  box-shadow: none;
}
#list1 .select-input.form-control[readonly]:not([disabled]) {
  background-color: #fbfbfb;
}
body{
    background-color: #0d6efd;
}
</style>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
          <div class="card-body py-4 px-4 px-md-5">

            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
              <i class="fas fa-check-square me-1"></i>
              <u>To-Do-List</u>
            </p>

            <div class="pb-2">
              <div class="card">
                <div class="card-body">
                <form action="{{route('tasks.store')}}" method="post">
                  <div class="d-flex flex-row align-items-center">
                  
                        @csrf
                        <input type="text" class="form-control form-control-lg" name="title" placeholder="New Task">
                        

                    
                    
                    
                    
                      <button  type="submit"   class="btn btn-primary">Add</button>
                    
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <hr class="my-4">

            
            @foreach($tasks as $task)
            <ul class="list-group list-group-horizontal rounded-0 bg-transparent">
            
               


              <li
                class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                
                <form action="{{ route('tasks.modify',$task)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input me-0" name="completed" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()" />
                    </div>
                    

                </form>
              </li>
              <li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">{{$task->title}}</p>
              </li>
              <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                <div class="d-flex flex-row justify-content-end mb-1">
                    
                  
                      <form action="{{ route('tasks.destroy',$task)}}" method="post" >
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i
                            class="fas fa-trash-alt"></i></button>
                            
                        </form>     

                 
                </div>
                <div class="text-end text-muted">
                  <a href="#!" class="text-muted" data-mdb-tooltip-init title="Created date">
                    <p class="small mb-0"><i class="fas fa-info-circle me-2"></i>{{$task->updated_at}}</p>
                  </a>
                </div>
              </li>
            </ul>
            @endforeach
            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<script>
    window.setTimeout(function() {
        // Automatically close the success alert after 5 seconds
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            const alert = new bootstrap.Alert(successAlert);
            alert.close();
        }

        
        
    }, 5000); 
</script>
</body>
</html>
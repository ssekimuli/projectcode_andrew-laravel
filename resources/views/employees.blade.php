@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
     @include('layouts.sideMenu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                       <a href="" type="submit" class="btn-sm btn btn-dark" data-toggle="modal" data-target="#name0" style="color:gold; float: right;">Add</a>
                </div> 
                   
                <div class="card-body">
                     @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($errors->all() as $error)
                        <i class="text-danger text-sm">{{$error}}</i><br>
                    @endforeach
                    
                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Company</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td colspan="2" class="bg-dark text-white text-center">Commands</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Employe as $Emp)
                            <tr>
                                <td class="text-uppercase">{{$Emp->firstname}}</td>
                                <td class="text-uppercase">{{$Emp->lastname}}</td>
                                <td>{{$Emp->company->name}}</td>
                                <td>{{$Emp->phone}}</td>
                                <td>{{$Emp->email}}</td>
                                 <td><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#name{{$Emp->id}}">Edit</a>
                                    <!----MODAL FORM Edit COMPANY---->
                                    <div class="modal fade mt-5" id="name{{$Emp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form method="POST" action="{{ route('employees.update' ,$Emp->id)}}" enctype="multipart/form-data">
            {{ csrf_field()}}
             @method('PATCH')
          <div class="modal-header">
            <h6 class="modal-title text-sm text-muted" id="exampleModalLabel">Edit  {{$Emp->firstname}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="panel-body">
                 <div class="col">
                    <label for="formGroupExampleInput">First Name</label>
                    <input type="text" class="form-control" name="fname" required="" value="{{$Emp->firstname}}">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="{{$Emp->lastname}}">
                  </div>
                  <div class="col row">
                    <div  class="col-md-3">
                        <label>Company</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <select class="col-md-10" name="company">
                         @foreach($company as $comp)
                        <option value="{{$comp->id}}">{{$comp->name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$Emp->phone}}">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$Emp->email}}">
                  </div>
                  <div class="row justify-content-center">
                    <button type="submit" class="btn rounded-pill text-center btn-dark col-md-3 mt-2" style="color:gold;">SUBMIT</button>
               </div>
              </div>
            </div>
        </form>
    </div>
    </div>
</td>
                                <td><a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#namd{{$Emp->id}}">Delete</a>
                                    <!----MODAL FORM delete COMPANY---->
                                    <div class="modal fade mt-5" id="namd{{$Emp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form method="POST" action="{{ route('employees.destroy' ,$Emp->id)}}" enctype="multipart/form-data">
            {{ csrf_field()}}
             @method('DELETE ')
          <div class="modal-header">
            <h6 class="modal-title text-sm text-danger" id="exampleModalLabel">Delete  {{$Emp->firstname}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="panel-body">
                 <div class="col">
                    <label for="formGroupExampleInput">Do you whatt to delete the record</label>
                    
                  </div>
                  </div>
                  <div class="row justify-content-center">
                    <button type="submit" class="btn rounded-pill text-center btn-danger col-md-3 mt-2" style="color:gold;">Delete</button>
               </div>
              </div>
            </div>
        </form>
    </div>
    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$Employe->links()}}
        </div>
    </div>
</div>

<!----MODAL FORM ADD COMPANY---->
<div class="modal fade mt-5" id="name0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form method="POST" action="{{ route('employees.store')}}" enctype="multipart/form-data">
            {{ csrf_field()}}
          <div class="modal-header">
            <h6 class="modal-title text-sm text-muted" id="exampleModalLabel">Add employee</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="panel-body">
                 <div class="col">
                    <label for="formGroupExampleInput">First Name</label>
                    <input type="text" class="form-control" name="fname" required="">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Last Name</label>
                    <input type="text" class="form-control" name="lname">
                  </div>
                  <div class="col row">
                    <div  class="col-md-3">
                        <label>Company</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <select class="col-md-10" name="company">
                         @foreach($company as $comp)
                        <option value="{{$comp->id}}">{{$comp->name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Phone</label>
                    <input type="text" class="form-control" name="phone">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="text" class="form-control" name="email">
                  </div>
                  <div class="row justify-content-center">
                    <button type="submit" class="btn rounded-pill text-center btn-dark col-md-3 mt-2" style="color:gold;">SUBMIT</button>
               </div>
              </div>
            </div>
        </form>
    </div>
    </div>
              
@endsection

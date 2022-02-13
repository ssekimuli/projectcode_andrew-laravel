@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     @include('layouts.sideMenu')
        <div class="col-md-8">
            <div class="shadow-sm">
                <div class="card-header">{{ __('Dashboard') }}
                       <a href="" type="submit" class="btn-sm btn btn-dark" data-toggle="modal" data-target="#name0" style="color:gold; float: right;">Add Company</a>
                </div> 
                   
                <div class="card-body py-5">
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
                    <table class="table table-striped table-sm">
                        <thead>
                        <th>
                            <tr>
                                <td>Company Logo</td>
                                <td >Name</td>
                                <td>Email</td>
                                <td>Website</td>
                                <td colspan="2" class="bg-dark text-white text-center">Commands</td>
                            </tr>
                        </th>
                        </thead>
                        <tbody>
                            @foreach($company as $compy)
                            <tr>
                                <td><img src="{{asset('storage/CompaniesLogo/'.$compy->logo)}}" height="45px"></td>
                                
                                <td class="text-uppercase">{{$compy->name}}</td>
                                <td>{{$compy->email}}</td>
                                <td>{{$compy->website}}</td>
                                <td><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#name{{$compy->id}}">Edit</a>
                                    <!----MODAL FORM Edit COMPANY---->
<div class="modal fade mt-5" id="name{{$compy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" action="{{ route('company.update',$compy->id)}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PATCH')
          <div class="modal-header">
            <h6 class="modal-title text-sm text-muted fw-bold" id="exampleModalLabel">Edit {{$compy->name}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="panel-body">
                 <div class="col">
                    <label for="formGroupExampleInput">Company Name</label>
                    <input type="text" class="form-control" name="Company_Name" required="" value="{{$compy->name}}">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput" >Email</label>
                    <input type="email" class="form-control" name="email" value="{{$compy->email}}">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Website</label>
                    <input type="text" class="form-control" name="website" value="{{$compy->website}}">
                  </div>
                  <div class="row justify-content-center">
                    <button class="btn rounded-pill text-center btn-dark col-md-3 mt-2" style="color:gold;">SUBMIT</button>
               </div>
              </div>
            </div>
            </form>
    </div>
    </div>
</td>
                                <td><a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#namd{{$compy->id}}">Delete</a>
                                    <!----MODAL FORM delete COMPANY---->
                                    <div class="modal fade mt-5" id="namd{{$compy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form method="POST" action="{{ route('company.destroy' ,$compy->id)}}" enctype="multipart/form-data">
            {{ csrf_field()}}
             @method('DELETE ')
          <div class="modal-header">
            <h6 class="modal-title text-sm text-danger" id="exampleModalLabel">Delete  {{$compy->name}}</h6>
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
    </div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                {{$company->links()}}
        </div>
    </div>
</div>


<!----MODAL FORM ADD COMPANY---->
<div class="modal fade mt-5" id="name0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" action="{{ route('company.store')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
          <div class="modal-header">
            <h6 class="modal-title text-sm text-muted fw-bold" id="exampleModalLabel">Add Company</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="panel-body">
                 <div class="col">
                    <label for="formGroupExampleInput">Company Name</label>
                    <input type="text" class="form-control" name="Company_Name" required="">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput" >Email</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Website</label>
                    <input type="text" class="form-control" name="website">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">Company Logo</label>
                    <input type="file" class="form-control" name="CompanyLogo">
                  </div>
                  <div class="row justify-content-center">
                    <button class="btn rounded-pill text-center btn-dark col-md-3 mt-2" style="color:gold;">SUBMIT</button>
               </div>
              </div>
            </div>
            </form>
    </div>
    </div>
@endsection

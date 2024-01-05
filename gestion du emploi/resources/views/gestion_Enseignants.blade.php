@extends('layouts.master')
@section('title','Gestion Enseignants')
@section('content')
<div class="breadcrumbs">{!! Toastr::message() !!}  
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard">Dashboard</a></li>
                                    <li><a href="compte">Gestion Enseignants</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Gestion Enseignants</strong>
                            </div>
                            <div class="card-body">

                            <div class="col col-xs-6 text-right">
                            <button href="#addetudient" type="button" class="btn btn-info add-new btn-sm"data-toggle="modal"><i class="fa fa-plus"></i>Add </button>
                            <a href="" class="btn btn-success btn-sm" ><i class="fa fa-file-excel-o" ></i> Export</a>            
                          <!-- export excel  <button onclick="tablesToExcel(['mytable'],['compte','compte.xls','Excel'])">ex</button>-->
                            <button class="btn btn-warning text-white btn-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download" ></i> import</button>  

                           					
                  </div><br>
                            <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                  
                   
                    <thead>
               
                     <th>Nom</th>
                     <th>Prenom	</th>
                     <th>Email</th>
                     <th>Adresse</th>
                     <th>NomMod</th>

                     <th>Action</th>
                    </thead> 
                      
                       
                   
    <tbody>
    @foreach($Enseignants as $data) 
    <tr >
    <td class="nom" >{{$data->nom}}</td>
    <td class="prenom" >{{$data->prenom}}</td>
    <td class="email" >{{$data->email}}</td>
    <td class="Adresse" >{{$data->Adresse}}</td>
    <td >{{$data->NomMod}}<p class="id_module"  hidden >{{$data->idMod}}</p></td>

    
    <td >
    <p class="password"  hidden >{{$data->password}}</p>
    <p class="id"  hidden >{{$data->id}}</p>

    <a class="edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil-square-o fa-2x" ></i></a>
    <a class="delete" data-toggle="modal" data-target="#delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
    
    </td>
  


   
    </tr> 
    
    @endforeach

    

 
   
    
   
    
    </tbody>
        
</table>




</div>

<!-- edit Modal HTML -->
<div class="modal fade" id="edit"  tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    <form action="/update_Enseignants" method="POST" id="editform">
    {{csrf_field()}}
{{method_field('PUT')}}
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
 			
						<div class="form-group">
							
        
            <div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control"  name="nom" id="nom" required>
						</div>
            <div class="form-group">
							<label>Prenom</label>
							<input type="text" class="form-control"  name="prenom" id="prenom"  required>
						</div>
            <div class="form-group">
							<label>Email</label>
							<input type="Email" class="form-control"  name="email" id="email" required>
						</div>
            <div class="form-group">
							<label>Adresse</label>
							<input type="Adresse" class="form-control"  name="Adresse" id="Adresse" required>
						</div>
            <div class="form-group">
							<label>password</label>
							<input type="password" class="form-control"  name="password" id="password" required>
						</div>
            <div class="form-group">
							<label>Num module</label>
              <select  class="form-control" id="id_module" name="id_module" >
              <option selected disabled>Choose...</option>
                 @foreach($modules as $row)
                 <option value="{{$row->id}}" >{{$row->NomMod}}</option>
                @endforeach
                 </select>
		
					  </div>

    </div>
				         	</div>
          <div class="modal-footer ">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <button type="submit" class="btn btn-warning " ><span class="glyphicon glyphicon-ok-sign"></span>Update</button>
      </div>
    </form>
       </div> 
    <!-- /.modal-content --> 
    </div>
      <!-- /.modal-dialog --> 
 </div>
<!-- add Modal HTML -->
<div id="addetudient" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
  
				<form action="{{ route('Enseignants.add') }}" method="POST" >
        @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Enseignant</h4>
					
					</div>
					<div class="modal-body">	
   				
	
					
						<div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control"  name="nom" placeholder="Saisir Nom" required>
						</div>
            <div class="form-group">
							<label>Prenom</label>
							<input type="text" class="form-control"  name="prenom" placeholder="Saisir  prenom" required>
						</div>
            <div class="form-group">
							<label>Email</label>
							<input type="Email" class="form-control"  name="email" placeholder="Saisir Email" required>
						</div>
            <div class="form-group">
							<label>Adresse</label>
							<input type="Adresse" class="form-control"  name="Adresse" placeholder="Saisir Adresse" required>
						</div>
            <div class="form-group">
							<label>password</label>
							<input type="password" class="form-control"  name="password" placeholder="Saisir password" required>
						</div>
            <div class="form-group">
							<label>Num module</label>
              <select  class="form-control" id="id_module" name="id_module" >
              <option selected disabled>Choose...</option>
                 @foreach($modules as $row)
                 <option value="{{$row->id}}" >{{$row->NomMod}}</option>
                @endforeach
                 </select>
		
					  </div>

    </div>
			
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
 
    
    <!-- Delete Modal HTML -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    <form action="/delete_en" method="POST" id="deletform">
                      @method('DELETE')
                        {{ csrf_field() }} 
          <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </form>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
</div> 
<!-- import Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="" method="POST"  enctype="multipart/form-data" >
    @csrf
   
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">import</h5>
      </div>
      <div class="modal-body">
    
          <div class="file-field">
          
              <span>Choose file</span>
              <input type="file" name="file" required><br>
              @error('file')
              <span class="text-danger">{{$message}}</span>
              @enderror
          
          
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script src="//code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="export.js"></script>
 <!-- buttons -->


<script >

$(document).ready(function() {
    $('#mytable').DataTable();
} );

$(document).on('click', '.edit', function()
    {
        var _this = $(this).parents('tr');

$('#nom').val(_this.find('.nom').text());
$('#prenom').val(_this.find('.prenom').text());
$('#email').val(_this.find('.email').text());
$('#Adresse').val(_this.find('.Adresse').text());
$('#password').val(_this.find('.password').text());
$('#id_module').val(_this.find('.id_module').text());

        $('#editform').attr('action','/update_Enseignants/'+_this.find('.id').text());
    });

$(document).on('click', '.delete', function()
{
      var _this = $(this).parents('tr');

 $('#deletform').attr('action','/delete_en/'+_this.find('.id').text());

});














</script>
<!-- export excel -->








@endsection
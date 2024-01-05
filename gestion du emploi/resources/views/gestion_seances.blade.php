@extends('layouts.master')
@section('title','Gestion seances')
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
                                    <li><a href="compte">Gestion seances </a></li>
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
                                <strong class="card-title">Gestion seances</strong>
                            </div>
                            <div class="card-body">

                            <div class="col col-xs-6 text-right">
                            <button href="#addmodele" type="button" class="btn btn-info add-new btn-sm"data-toggle="modal"><i class="fa fa-plus"></i>Add </button>
                            <a href="" class="btn btn-success btn-sm" ><i class="fa fa-file-excel-o" ></i> Export</a>            
                          <!-- export excel  <button onclick="tablesToExcel(['mytable'],['compte','compte.xls','Excel'])">ex</button>-->
                            <button class="btn btn-warning text-white btn-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download" ></i> import</button>  

                           					
                  </div><br>
                            <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                  
                   
                    <thead>
                     <th>Code 	</th>
                     <th>date Debut 	</th>
                     <th>date Fin </th>
                    
                      <th>classe</th>
                    
                     <th>nom module</th>
                     <th>enseignant</th>
                     <th>Action</th>
                    </thead> 
                      
                       
                   
    <tbody>
    @foreach($seances as $data) 
    <tr >

    <td class="id" >{{$data->id}}</td>
    <td class="date_Debut" >{{$data->date_Debut}}</td>
    <td class="date_Fin" >{{$data->date_Fin}}</td>
    <td>{{$data->idc}} {{$data->niv}} </td>
    <td >{{$data->mn}}</td>
    <td>{{$data->en}} {{$data->ep}}</td>






 
    <td >
      <p class="classe_id" hidden >{{$data->idc}}</p>
      <p class="module_id" hidden >{{$data->idmn}}</p>
      <p class="enseignant_id" hidden >{{$data->ide}}</p>
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
    <form action="/" method="POST" id="editform">
    {{csrf_field()}}
{{method_field('PUT')}}
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
							<label>Code </label>
							<input type="text" class="form-control" id="id" name="id"  required>
						</div>
            <div class="form-group">
							
              <div class="row">
              <div class="col">
							<label>classe </label>
              <select  class="form-control" id="classe_id" name="classe_id" >
              <option selected disabled>Choose...</option>
                 @foreach($classe as $row)
                 <option value="{{$row->id}}" >{{$row->id}}</option>
                @endforeach
                 </select>
		
					  </div>
            <div class="col">
							<label>Module </label>
              <select  class="form-control" id="module_id" name="module_id" >
              <option selected disabled>Choose...</option>
                 @foreach($modules as $row)
                 <option value="{{$row->id}}" >{{$row->NomMod}}</option>
                @endforeach
                 </select>
		
					  </div>
            <div class="col">
							<label>Enseignants </label>
              <select  class="form-control" id="enseignant_id" name="enseignant_id" >
              <option selected disabled>Choose...</option>
                 @foreach($Enseignants as $row)
                 <option value="{{$row->id}}" >{{$row->nom}}{{$row->prenom}}</option>
                @endforeach
                 </select>
		
					  </div>
              </div>


    
  </div>
          
           
          
            <div class="form-group">
							<label>heure debut </label>
							<input type="time" class="form-control"  id="date_Debut" name="date_Debut"  required>
						</div>
            <div class="form-group">
							<label>heure Fin </label>
							<input type="time" class="form-control"  id="date_Fin" name="date_Fin"  required>
						</div>
            <div class="form-group">
							<label>jour </label>
              <select  class="form-control" id="JOUR" name="JOUR" required>
              <option selected disabled>Choose...</option>

                 <option value="LUNDI" >LUNDI</option>

                 </select>
		
					  </div>

				    </div>
          <div class="modal-footer ">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <button type="submit" class="btn btn-warning " ><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
    </form>
       </div> 
    <!-- /.modal-content --> 
    </div>
      <!-- /.modal-dialog --> 
 </div>
<!-- add Modal HTML -->
<div id="addmodele" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
      
				<form action="{{ route('Seances.add') }}" method="POST" >
        @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add seances</h4>
					
					</div>
					<div class="modal-body">	
   				
          <div class="form-group">
							<label>Code </label>
							<input type="text" class="form-control" id="id" name="id"  required>
						</div>
            <div class="form-group">
							
              <div class="row">
              <div class="col">
							<label>classe </label>
              <select  class="form-control" id="classe_id" name="classe_id" >
              <option selected disabled>Choose...</option>
                 @foreach($classe as $row)
                 <option value="{{$row->id}}" >{{$row->id}}</option>
                @endforeach
                 </select>
		
					  </div>
            <div class="col">
							<label>Module </label>
              <select  class="form-control" id="module_id" name="module_id" >
              <option selected disabled>Choose...</option>
                 @foreach($modules as $row)
                 <option value="{{$row->id}}" >{{$row->NomMod}}</option>
                @endforeach
                 </select>
		
					  </div>
            <div class="col">
							<label>Enseignants </label>
              <select  class="form-control" id="enseignant_id" name="enseignant_id" >
              <option selected disabled>Choose...</option>
                 @foreach($Enseignants as $row)
                 <option value="{{$row->id}}" >{{$row->nom}}{{$row->prenom}}</option>
                @endforeach
                 </select>
		
					  </div>
              </div>


    
  </div>
          
           
          
            <div class="form-group">
							<label>heure debut </label>
							<input type="datetime-local" class="form-control"  id="date_Debut" name="date_Debut"  required>
						</div>
            <div class="form-group">
							<label>heure Fin </label>
							<input type="datetime-local" class="form-control"  id="date_Fin" name="date_Fin"  required>
						</div>
            <div class="form-group">
							<label>jour </label>
              <select  class="form-control" id="JOUR" name="JOUR" required>
              <option selected disabled>Choose...</option>

                 <option value="LUNDI" >LUNDI</option>

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
    <form action="/deletes" method="POST" id="deletform">
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

$('#id').val(_this.find('.id').text());
$('#date_Debut').val(_this.find('.date_Debut').text());
$('#date_Fin').val(_this.find('.date_Fin').text());
$('#classe_id').val(_this.find('.classe_id').text());
$('#module_id').val(_this.find('.module_id').text());
$('#enseignant_id').val(_this.find('.enseignant_id').text());
        $('#editform').attr('action','/update/'+_this.find('.id').text());
    });

$(document).on('click', '.delete', function()
{
      var _this = $(this).parents('tr');

 $('#deletform').attr('action','/deletes/'+_this.find('.id').text());

});











$('table').on('click','.cin', function()
{
      var data = $(this).parents('tr');
      var url = $(this).data("url"); 
      var cin = data.find('.cin').text();
      
      window.location.href = url+"?cin="+cin;

});



</script>
<!-- export excel -->








@endsection
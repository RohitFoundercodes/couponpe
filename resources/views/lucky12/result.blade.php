
    
@extends('layouts.app')

@section('app')





  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-12 bg-white shadow sm:rounded-lg">
               


<div class="card ">
  <div class="card-header">
      <div class="d-flex justify-content-between"> 
      <h4> Lucky 12 Result Lists </h4>
      <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" > Back </a>
                                   
     
      </div>
    
  </div>
  <div class="card-body">

          <div class="card-box table-responsive">

  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:120%">
    <thead>
      <tr>
        <th>Id</th></th>
        <th>Gamesno</th></th>
        <th>Win Number</th></th>
        <th>Colore index</th>
        <th>status</th>
        
      </tr>
    </thead>


    <tbody>
       @foreach($lucky12Result as $key=>$item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->period_no}}</td>
        <td>{{$item->win_number}}</td>
        <td>{{$item->color_index}}</td>
        <td>{{$item->status}}</td>
       
      </tr>
    @endforeach
    </tbody>
  </table>
  
    <div class="mt-5">
        {{ $lucky12Result->links() }}
    </div>
  
</div>
</div>
</div>




@endsection
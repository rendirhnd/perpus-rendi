@extends('layouts.admin') 
 
@section('content') 
<section class="content"> 
  <div class="container-fluid"> 
    <div class="row"> 
      <!-- left column --> 
      <div class="col-md-12"> 
        <!-- general form elements --> 
        <div class="card card-primary"> 
          <div class="card-header"> 
            <h3 class="card-title">Tambah Data</h3> 
          </div> 
 
          <div class="card-body"> 
            <form action="{{ route('kategori_store') }}" method="POST" enctype="multipart/form-data"> 
              @csrf 
              <div class="form-group"> 
                <label for="nama">Nama</label> 
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama"> 
              </div> 
                
          </div> 
          <div class="card-footer"> 
            <button type="submit" class="btn btn-primary">Submit</button> 
          </div> 
          </form> 
        </div> 
        <!-- /.card --> 
      </div> 
    </div> 
  </div> 
</section> 
 
 
@endsection
@extends('pages.datatable_jacket')

@section('title', 'catigories Page')
@section('content')        
@include('modal.cat_modal')
            
                <!-- Page Title Start -->
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title bold"><button type="button" class="ml-3 effect-btn btn btn-dark squer-btn sm-btn" data-toggle="modal" data-target=".bd-example-modal-lg">
						  Add Categories
						</button> | Categories</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered item_datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>discription</th>
                                        <th>Status</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>  
@stop


@push('script')
<script>
    $(document).ready(function() {
       
        $('#exampleModalLong').on('hidden.bs.modal', function () {
    $(this).find('#formid').trigger('reset');
    $("#pic").html("")
    $("#cat_id").val("")
    $("#old_pic_name").val("")
})

$(function () {
    var table = $('.item_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cat.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'cat_title', name: 'cat_title'},
            {data: 'cat_discription', name: 'cat_discription'},
            {data: 'cat_status', name: 'cat_status'}, 
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });



//   <!-- -------------------- insert or update function -------------------------- 

    $('#formid').on('submit', function(event){
    event.preventDefault();
    $('.btn-submite').prop('disabled', true);
           $(".btn-submite").html('Please wait..');
    $.ajax({
    url:"{{ route('cat.insert') }}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    {
    $("#exampleModalLong").modal("hide");
    $('.btn-submite').prop('disabled', false);
                   $(".btn-submite").html('Submite');
    $('.item_datatable').DataTable().ajax.reload();
    $("#formid")[0].reset();
    }
    })
    });


    // <!-- -------------------- Select function -------------------------- -->

$(document).on('click', '.upd', function(){

var id =  $(this).attr("id");
$.ajax({
    type : 'post',
    url  : '/cat/edit',
    data : {'id':id , "_token" : "{{ csrf_token() }}"},
    success:function(data){
        $(".modal").modal("show");       
    $('#cat_name').val(data.Data_One.cat_title);
    $('#cat_discription').val(data.Data_One.cat_discription);
    $('#b_status').val(data.Data_One.cat_status);
    $('#cat_id').val(data.Data_One.catid);
}
});
});


// <!-- -------------------- delete function -------------------------- -->

$(document).on('click', '.del', function(){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
 
var id =  $(this).attr("id");
var el =  this;
$.ajax({
type : 'post',
url  : '/cat/destroy',
data : {'id':id , "_token" : "{{ csrf_token() }}"},
success:function(data){
    
    $(el).closest('tr').css('background','#d31027');
    $(el).closest('tr').fadeOut(1000, function(){      
    $(this).remove();
        });
}
});
}
})
});



	} );
           
    </script>
@endpush

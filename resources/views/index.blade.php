@extends('pages.front')

@section('title', 'My Feedback Tool')
@section('content')

{{-- function ///// --}}
@php
function fetch_reviews($item) {
$replay =
App\Models\Reviews::join("users","users.id","=","reviews.user_id")->where("rev_featured",$item)->orderBy('reviewid',
'DESC')->get();
if ($replay->count() <= 0) { $html='<div class="reply_main_div"><form class="new_reply_form">
    ' . csrf_field() . '
  <input name="parent_item" type="hidden" value="' .$item.'">
  <div class="new_reply_div" style="font-size: 14px; color: #f15050; font-weight: 600;"><span
      class="add_a_review_icon"><i class="fa-solid fa-feather"></i>&nbsp;Add a Review</span></div>
  </form>
  </div>';
  return $html;
  }
  $html = '<div class="reply_main_div">
    <form class="new_reply_form">
      ' . csrf_field() . '
      <input name="parent_item" type="hidden" value="'.$item.'">
      <div class="new_reply_div" style="font-size: 14px; color: #f15050; font-weight: 600;"><span
          class="add_a_review_icon"><i class="fa-solid fa-feather"></i>&nbsp;Add a Review</span></div>
    </form>
  </div>';
  foreach ($replay as $rep) {
  $html .='<div class="comment m-1 ms-3">
    <span class="" style="font-size: 14px; color: #f15050;">~'.$rep->name.'.</span>
    &nbsp;';
    if (Auth::user()) {
      if (Auth::user()->is_admin || (Auth::user()->id == $rep->user_id) ) {
        $html .='<span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_review" style="font-size: 14px;"
            id="'.$rep->reviewid.'" aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_reply"
            style="font-size: 14px;" id="'.$rep->reviewid.'" aria-hidden="true"></i></span>';
      }
    }

        $html .='<p class="m-0 ms-2 update_msg_text" style="font-size: small;"><span
        style=" color: rgb(93, 92, 92); font-style: italic;">~'.$rep->name. ': </span>'.$rep->rev_msg.'</p>
    <small class="ms-2">'.$rep->rev_date.'</small>';
    $html .='<form class="reply_form">
      ' . csrf_field() . '
      <input name="child" type="hidden" value="'.$rep->reviewid.'">
      <div class="reply_div text-body-secondary" style="font-size: small;"><small class="ms-2 reply_text">replay</small>
      </div>
    </form>';

    $child = App\Models\Reviews::select("reviewid")->where("child_of",$rep->reviewid)->count();
    if ($child > 0) {
    $html.= fetch_child($rep->reviewid , $rep->name) ;
    }

    $html .='
  </div>';
  }
  return $html;
  }



  function fetch_child($parent , $p_name) {
  $replay = App\Models\Reviews::join("users","users.id","=","reviews.user_id")->where("child_of",$parent)->get();
  $html = '';
  foreach ($replay as $rep) {
  $html .='<div class="comment m-1 ms-3">
    <span class="" style="font-size: 14px; color: #f15050;">~'.$rep->name.'.</span>
    &nbsp;';
    if (Auth::user()) {
      if (Auth::user()->is_admin || (Auth::user()->id == $rep->user_id) ) {
        $html .='<span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_review" style="font-size: 14px;"
        id="'.$rep->reviewid.'" aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_reply"
        style="font-size: 14px;" id="'.$rep->reviewid.'" aria-hidden="true"></i></span>';
      }
    }
  

        $html .='<p class="m-0 ms-2 update_msg_text" style="font-size: small;"><span
        style=" color: rgb(93, 92, 92); font-style: italic;">~'.$p_name. ': </span>'.$rep->rev_msg.'</p>
    <small class="ms-2">'.$rep->rev_date.'</small>';
    $html .='<form class="reply_form">
      ' . csrf_field() . '
      <input name="child" type="hidden" value="'.$rep->reviewid.'">
      <div class="reply_div text-body-secondary" style="font-size: small;"><small class="ms-2 reply_text">replay</small>
      </div>
    </form>';
    $child = App\Models\Reviews::select("reviewid")->where("child_of",$rep->reviewid)->count();
    if ($child > 0) {
    $html.= fetch_child($rep->reviewid , $rep->name ) ;
    }
    $html .='
  </div>';
  }
  return $html;
  }
  @endphp
  {{-- function end --------}}
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="container-flued my-5 feedback-container">
          @foreach ($item as $items)
          <div class="list-group mb-1">
            <a class="list-group-item list-group-item-action rounded-4 p-4">
              <div class="d-flex w-100 justify-content-between">
                <div>
                  <h5 class="m-0">{{$items->item_title}}</h5>
                  <span class="text-body-secondary"
                    style="font-size: 14px; color: rgb(73, 73, 73); font-style: italic;">~{{$items->name}}</span>
                  &nbsp;
                  @if (Auth::user())
                  @if (Auth::user()->is_admin || (Auth::user()->id == $items->user_id))    
                  <span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_feedback" style="font-size: 14px;"
                      id="{{$items->itemid}}" aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_feedback"
                      style="font-size: 14px;" id="{{$items->itemid}}" aria-hidden="true"></i></span>
                  @endif    
                  @endif
                </div>

                @php
                if (Auth::user()) {
                  $voted =
                  App\Models\item_votes::select('item_id')->where("item_id",$items->itemid)->where("user_id",
                  Auth::user()->id)->count();
                }else {
                  $voted = 0 ;
                }
                @endphp
                <small class="text-body-secondary">
                  <button class="{{$voted <= 0 ? " vot-btn" : "vot-btn-active" }} voted_btn btn rounded-5 px-3 py-2"
                    id="{{$items->itemid}}"><i class="fa-regular fa-heart"></i>&nbsp;&nbsp;&nbsp;Votes {{$items->vote
                    == ""
                    ? 0 : $items->vote}}
                  </button><input type="hidden" class="vot-input" value="{{$items->vote == ""
                                    ? 0 : $items->vote}}">
                </small>
              </div>
              <small class="">{{$items->item_discription}}</small>
              <div>
                <button class="comment_button p-0 my-2 text-body-secondary" type="button" data-bs-toggle="collapse"
                  data-bs-target="#h46b125{{$items->itemid}}" aria-expanded="false"
                  aria-controls="h46b125{{$items->itemid}}">
                  <i class="fa-regular fa-comments"></i> Comments
                </button>
              </div>
              <div class="collapse" id="h46b125{{$items->itemid}}">
                <div class="card card-body">
                  {!! fetch_reviews($items->itemid); !!}
                </div>
              </div>
            </a>
          </div>
          @endforeach
          <div class="m-2">
            {{ $item->links("pagination::bootstrap-5")}}
          </div>
        </div>
      </div>
      <div class="col-md-5">
        @if (Auth::user())
        <div class="container-fluid my-5">
          <div class="" style="">
            <h3>Your's Feadback Item</h3>
            <form id="formid">
              <div class="row">
                {{csrf_field()}}
                <div class="col-md-12">
                  <label class="my-2" style="color: #f15050; font-weight: 600" for="title">Item
                    title</label>
                  <input type="text" name="item_name" id="item_name" class="form-control">
                </div>
                <div class="col-md-12">
                  <label class="my-2" style="color: #f15050; font-weight: 600" for="title">Discription</label>
                  <textarea name="item_discription" id="item_discription" class="form-control" cols="20"
                    rows="5"></textarea>
                </div>
                <div class="col-md-6">
                  <label class="my-2" style="color: #f15050; font-weight: 600" for="discription">Catigory</label>
                  <select name="cat_id" id="cat_id" class="form-control">
                    @foreach($catigories as $catigorie)
                    <option value="{{$catigorie->catid}}">{{$catigorie->cat_title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-12" id="pic"></div>
                <input type="hidden" name="i_id" id="i_id">
              </div>
              <div class="mt-4 d-grid gap-2">
                <button type="submit" class="btn btn-submite" style="background-color: #f15050;  color: #fff">Save
                  changes</button>
              </div>
            </form>
          </div>
        </div>
        @else
        <div class="container-fluid my-5">
          <div class="card border-danger mb-3 rounded-3" style="max-width: 23rem;">
            <div class="card-header">Feedback Submission</div>
            <div class="card-body text-danger">
              <h5 class="card-title">Please Log in to Add Feedback</h5>
              <p class="card-text">Your feedback is important to us! To submit your feedback, please
                log
                in to your account or create one if you haven't already.</p>
              {{-- <div class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                  Title</cite></div> --}}
              <a href="#" class="btn btn-sm" style="background-color: #f15050; color: #fff"><i
                  class="fa-solid fa-circle-user"></i>&nbsp; Signup Now</a>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>


  {{-- toast message .... --}}

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

  @stop


  @push('script')
  <script>
    $(document).ready(function() {

      const toastTrigger = document.getElementById('liveToastBtn')
      const toastLiveExample = document.getElementById('liveToast')

      if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () => {
          toastBootstrap.show()
      })
      }


      $('#exampleModalLong').on('hidden.bs.modal', function () {
      $(this).find('#formid').trigger('reset');
      $("#i_id").val("");
      })
     

    
     
     
     
     //   <!-- -------------------- insert or update function -------------------------- 
     
         $('#formid').on('submit', function(event){
         event.preventDefault();

         $('.btn-submite').prop('disabled', true);
         $(".btn-submite").html('Please wait..');
         $.ajax({
         url:"item/insert",
         method:"POST",
         data:new FormData(this),
         dataType:'JSON',
         contentType: false,
         cache: false,
         processData: false,
         success:function(data)
         {
          if (data.updated) {
              location.reload();
          }else{

          
          $('.btn-submite').prop('disabled', false);
          $(".btn-submite").html('Submite');
          $("#formid")[0].reset();
          var html = $(".feedback-container").html();
          $(".feedback-container").html(`<div class="list-group mb-1">
                      <a class="list-group-item list-group-item-action rounded-4 p-4">
                          <div class="d-flex w-100 justify-content-between">
                              <div>
                                  <h5 class="m-0">${data.data.item_title}</h5>
                                  <span class="text-body-secondary"
                                      style="font-size: 14px; color: rgb(73, 73, 73); font-style: italic;">~${data.data.name}</span>
                                      &nbsp;
                                      <span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_feedback"
                                              style="font-size: 14px;" id="${data.data.itemid}"
                                              aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_feedback"
                                              style="font-size: 14px;" id="${data.data.itemid}"
                                              aria-hidden="true"></i></span>
                              </div>
                              <small class="text-body-secondary">
                                  <button class="vot-btn voted_btn btn
                                      rounded-5 px-3 py-2" id="${data.data.itemid}"><i
                                          class="fa-regular fa-heart"></i>&nbsp;&nbsp;&nbsp;Votes 0
                                  </button><input type="hidden" class="vot-input" value="0">
                              </small>
                          </div>
                          <small class="">${data.data.item_discription}</small>
                          <div>
                              <button class="comment_button p-0 my-2 text-body-secondary" type="button"
                                  data-bs-toggle="collapse" data-bs-target="#h6b125${data.data.itemid}"
                                  aria-expanded="false" aria-controls="h6b125${data.data.itemid}">
                                  <i class="fa-regular fa-comments"></i> Comments
                              </button>
                          </div>
                          <div class="collapse" id="h6b125${data.data.itemid}">
                              <div class="card card-body">
                                  <div class="reply_main_div"><form class="new_reply_form">
                                      @csrf
                                      <input name="parent_item" type="hidden" value="${data.data.itemid}">
                                  <div class="new_reply_div" style="font-size: 14px; color: #f15050; font-weight: 600;"><span class="add_a_review_icon"><i class="fa-solid fa-feather"></i>&nbsp;Add a Review</span></div></form></div>
                              </div>
                          </div>
                      </a>
                  </div> ${html}`)
             }
           }
         })
         });

      //    submite new replay form .... 

         
         $(document).on('submit', '.new_reply_form', function(event){
         event.preventDefault();
         var el = this;
              $.ajax({
              url:"/new/reviews",
              method:"POST",
              data: new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success:function(data)
              {
                if (!data.Success) {
                      $(".toast-body").html(data.message);
                      var myToast = document.getElementById("liveToast");

                      // Use jQuery to trigger the 'show' method
                      $(myToast).toast('show');
                     }else{
                  if (!data.update) {
                      $(el).find(".new_reply_div").html(`<span class="add_a_review_icon"><i class="fa-solid fa-feather"></i>&nbsp;Add a Review</span>`);
                      var olddata = $(el).siblings(".comment").first().html();

                      $(el).parent(".reply_main_div").append(`<div class="comment m-1 ms-2">
                      <span class="" style="font-size: 14px; color: #f15050;">~${data.replay.name}</span>
                      <span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_review" style="font-size: 14px;" id="${data.replay.reviewid}" aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_reply" style="font-size: 14px;" id="${data.replay.reviewid}" aria-hidden="true"></i></span>
                      <p class="m-0 ms-2 update_msg_text" style="font-size: small;"><span style=" color: rgb(93, 92, 92); font-style: italic;" >~${data.replay.name}:</span>  ${data.replay.rev_msg}</p>
                      <small class="ms-2">${data.replay.rev_date}</small>
                      <form class="reply_form">
                          @csrf
                          <input name="child" type="hidden" value="${data.replay.reviewid}">
                          <div class="reply_div text-body-secondary" style="font-size: small;"><small class="ms-2 reply_text">replay</small></div></form></div>
                      `);
                      
                  }else{
                      $(el).closest("div").find("p").first().html(`<span style=" color: rgb(93, 92, 92); font-style: italic;" >updated: </span> ${data.replay.rev_msg}`)
                      $(el).closest("div").find("form").html(`<small class="ms-2 reply_text">replay</small>`)
                      // alert($(el).closest("div").first(".update_msg_text").html())
                  }
                  }
                  
              }
              })
         });

          //   <!-- -------------------- submite reply form function -------------------------- 
     
         $(document).on('submit', '.reply_form', function(event){
         event.preventDefault();
         var el = this;
              $.ajax({
              url:"/reviews",
              method:"POST",
              data: new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success:function(data)
              {
                if (!data.Success) {
                      $(".toast-body").html(data.message);
                      var myToast = document.getElementById("liveToast");

                      // Use jQuery to trigger the 'show' method
                      $(myToast).toast('show');
                     }else{
                  if (!data.update) {
                      $(el).parent(".comment").find(".reply_div").html(`<small class="ms-2 reply_text">replay</small>`);
                      $(el).parent(".comment").append(`<div class="comment m-1 ms-2">
                      <span class="" style="font-size: 14px; color: #f15050;">~${data.replay.name}</span>
                      <span class="text-body-secondary"><i class="fa pr-1 fa-edit upd_review" style="font-size: 14px;" id="${data.replay.reviewid}" aria-hidden="true"></i>&nbsp;<i class="fa-solid fa-trash del_reply" style="font-size: 14px;" id="${data.replay.reviewid}" aria-hidden="true"></i></span>
                      <p class="m-0 ms-2 update_msg_text" style="font-size: small;"><span style=" color: rgb(93, 92, 92); font-style: italic;" >~${data.replay.name}:</span>  ${data.replay.rev_msg}</p>
                      <small class="ms-2">${data.replay.rev_date}</small>
                      <form class="reply_form">
                          @csrf
                          <input name="child" type="hidden" value="${data.replay.reviewid}">
                          <div class="reply_div text-body-secondary" style="font-size: small;"><small class="ms-2 reply_text">replay</small></div></form></div>
                      `);
                      
                  }else{
                      $(el).closest("div").find("p").first().html(`<span style=" color: rgb(93, 92, 92); font-style: italic;" >updated: </span> ${data.replay.rev_msg}`)
                      $(el).closest("div").find("form").first(".reply_div").html(` @csrf
                          <input name="child" type="hidden" value="${data.replay.reviewid}">
                          <div class="reply_div text-body-secondary" style="font-size: small;"><small class="ms-2 reply_text">replay</small></div>`)
                      // alert($(el).closest("div").first(".update_msg_text").html())
                  }
                  }
                  
              }
              })
         });
     
      
      $(document).on('click', '.add_a_review_icon', function(){
             $(this).parent('.new_reply_div').html(`<div class="my-1">
                      <input name="reply_message" type="text" class="form-control">
                      <button class="btn btn-sm my-2" type="submit" style="background-color: #f15050; color: #fff;">submit</button>
              </div>`);
         });
     
         $(document).on('click', '.reply_text', function(){
             $(this).parent(".reply_div").html(`<div class="my-1">
                      <input name="reply_message" type="text" class="form-control">
                      <button class="btn btn-sm my-2" type="submit" style="background-color: #f15050; color: #fff;">submit</button>
              </div>`);
         });
     
     
     

     $(document).on('click', '.upd_review', function(){
     var id =  $(this).attr("id");
     var el = this;
     $.ajax({
         type : 'post',
         url  : '/review/edit',
         data : {'id':id , "_token" : "{{ csrf_token() }}"},
         success:function(data){
          $(el).closest("div").find("form").first(".reply_div").html(`<div class="my-1">
                   <input name="reply_message" value="${data.Data_One.rev_msg}" type="text" class="form-control">
                   @csrf
                   <input name="rird" value="${data.Data_One.reviewid}" type="hidden" class="form-control">
                    <button class="btn btn-sm my-2" type="submit" style="background-color: #f15050; color: #fff;">Edit</button>
               </div>`)
     }
     });
     });  

     // <!-- -------------------- add fvrt function -------------------------- -->

          $(document).on('click', '.voted_btn', function(){
              var id =  $(this).attr("id");
              var el =  this;
              $.ajax({
                  type : 'post',
                  url  : '/vote/fvrt',
                  data : {'id':id , "_token" : "{{ csrf_token() }}"},
                  success:function(data){
                      if (!data.Success) {
                      $(".toast-body").html(data.message);
                      var myToast = document.getElementById("liveToast");

                      // Use jQuery to trigger the 'show' method
                      $(myToast).toast('show');
                     }else{
                      if (data.vote) {
                          $(el).addClass('vot-btn-active').removeClass('vot-btn');
                          var value = $(el).closest("small").find(".vot-input").val()
                          $(el).html(`<i class="fa-regular fa-heart"></i>&nbsp;&nbsp;&nbsp;Votes ${parseInt(value)+1}`)
                          $(el).closest("small").find(".vot-input").val(parseInt(value)+1)
                      }else{
                          $(el).addClass('vot-btn').removeClass('vot-btn-active');
                          var value = $(el).closest("small").find(".vot-input").val()
                          $(el).html(`<i class="fa-regular fa-heart"></i>&nbsp;&nbsp;&nbsp;Votes ${parseInt(value)-1}`)
                          $(el).closest("small").find(".vot-input").val(parseInt(value)-1)
                      }
                      }
                  }
              });
          });
     
     // <!-- -------------------- delete function -------------------------- -->
     
     $(document).on('click', '.del_reply', function(){
      
          var id =  $(this).attr("id");
          var el =  this;
          $.ajax({
          type : 'post',
          url  : '/review/destroy',
          data : {'id':id , "_token" : "{{ csrf_token() }}"},
          success:function(data){
              $(el).closest('div').css('background','#d31027');
              $(el).closest('div').fadeOut(1000, function(){      
              $(this).remove();
                  });
          }
          });
          })
     
          // add a new review ..... 
          
          $(document).on('click', '.add_a_new_review', function(){
      
          var id =  $(this).attr("id");
          var el =  this;
          $.ajax({
          type : 'post',
          url  : '/review/destroy',
          data : {'id':id , "_token" : "{{ csrf_token() }}"},
          success:function(data){
              $(el).closest('div').css('background','#d31027');
              $(el).closest('div').fadeOut(1000, function(){      
              $(this).remove();
                  });
          }
          });
          })

          // upd_feedback


          $(document).on('click', '.upd_feedback', function(){
              var id =  $(this).attr("id");
              $.ajax({
              type : 'post',
              url  : '/item/edit',  
              data : {'id':id , "_token" : "{{ csrf_token() }}"},
              success:function(data){
                  $('#item_name').val(data.Data_One.item_title);
                  $('#item_discription').val(data.Data_One.item_discription);
                  $('#cat_id').val(data.Data_One.cat_id);
                  $('#i_id').val(data.Data_One.itemid);
                  $('#old_pic_name').val(data.Data_One.item_image);
              }
              });
          })




          $(document).on('click', '.del_feedback', function(){
      
      var id =  $(this).attr("id");
      var el =  this;
      $.ajax({
      type : 'post',
      url  : '/item/destroy',
      data : {'id':id , "_token" : "{{ csrf_token() }}"},
      success:function(data){
          $(el).closest('.list-group').css('background','#d31027');
          $(el).closest('.list-group').fadeOut(1000, function(){      
          $(this).remove();
              });
      }
      });
      })

         } );


  </script>
  @endpush
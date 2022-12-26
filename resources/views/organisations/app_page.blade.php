@extends('layouts.app')
@section('header')
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/css/summernote-bs4.css') }}">
@endsection

@section('content')



<div class="single-pdt-page  py-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-xl-4">
            <aside class="sidebar sidebar-user">
               <div class="user-card shadow border bg-white p-4 text-center">
                  <div class="user-info">
                     <div class="user-avatar mb-4">
                        <img src="assets/img/pdt-owner-img.jpg" alt="User Avatar"
                           class="img-fluid rounded-circle border-theme">
                     </div>
                     <div class="user-details">
                        @if(!is_null($organisation->logo))
                        <img src="{{ asset('storage/'.$organisation->logo) }}" alt="organisation logo"
                           class="rounded-circle">
                        @endif

                        <h4>Steve Bell</h4>
                     </div>
                     <div class="rating-blk text-center d-inline-block">
                        <ul class="list-group list-group-horizontal">
                           <li class="pr-1">
                              <span class="fa fa-star"></span>
                           </li>
                           <li class="pr-1">
                              <span class="fa fa-star"></span>
                           </li>
                           <li class="pr-1">
                              <span class="fa fa-star"></span>
                           </li>
                           <li class="pr-1">
                              <span class="fa fa-star"></span>
                           </li>
                           <li class="pr-1">
                              <span class="fa fa-star"></span>
                           </li>
                        </ul>
                        <span class="rating__count">( 5 Rating )</span>
                     </div>
                     <hr>
                     <div class="pdt-contact-btn">
                        <span class="display-5">
                           <a href="tel:1234567890" class="btn btn-outline-theme d-inline-block radius-5">
                              <span class="lnr lnr-phone-handset align-middle"></span>
                           </a>
                        </span>
                        <span class="display-5">
                           <a href="mailto:nookx@example.com" class="btn btn-outline-theme d-inline-block radius-5">
                              <span class="lnr lnr-inbox align-middle"></span>
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               @if ($organisation->categories->count() > 0)
               <div class="sidebar-pdt-desc mt-4">
                  <div class="shadow border p-4 text-center">
                     @foreach ($organisation->categories as $category)
                     <div class="d-inline-block mx-2 mb-2">
                        @include('components.tag', ['name' => $category->name])
                     </div>
                     @endforeach
                  </div>
               </div>
               @endif
         


         <div class="quicklink-sidebar-menu shadow border mt-4 p-4">
            <div class="user-title-info">
               <h4>Connect with me</h4>
            </div>
            <hr class="my-4">
            <ul class="list-group border-0">
               <li class="list-group-item border-0 p-0 mb-2">
                  <div class="bg-fb px-3 py-1">
                     <a class="text-white display-5" href="javascript:;">
                        <i class="fa fa-facebook"></i>
                        <h5 class="d-inline-block ml-5">Steve2019</h5>
                     </a>
                  </div>
               </li>
               <li class="list-group-item border-0 p-0 mb-2">
                  <div class="bg-tw px-3 py-1">
                     <a class="text-white display-5" href="javascript:;">
                        <i class="fa fa-twitter"></i>
                        <h5 class="d-inline-block ml-5">Steve2019</h5>
                     </a>
                  </div>
               </li>
               <li class="list-group-item border-0 p-0 mb-2">
                  <div class="bg-plus px-3 py-1">
                     <a class="text-white display-5" href="javascript:;">
                        <i class="fa fa-google"></i>
                        <h5 class="d-inline-block ml-5">Steve2019</h5>
                     </a>
                  </div>
               </li>
            </ul>
         </div>
         </aside>
      </div>
      <div class="col-lg-8 col-xl-8 mt-5 mt-md-5 mt-lg-0">
         <div class="pdt-item-showcase shadow border">
            <div class="single-pdt-slider">

            </div>
            <div class="row align-items-center">

               <!-- /item-preview-->
               <div class="col-sm-12">
                  @if(count($organisation->suggestion_comments) == 0)
                  <div class="text-center mb-2">
                     <h1 class="p-5">
                        Коментариев с рисунком, пока нету. <br>
                        Станьте первыми !
                     </h1>
                     <a href="#leave_comment"
                        class="btn btn-outline-white btn-dark radius-5 py-3 px-4 mb-3 open_comment">
                        нажмите что бы оставить коментарий !
                     </a>
                  </div>
                  @else
                  <div class="single-pdt-slider">

                  </div>
                  <div class="single-pdt-thumb text-center my-3 my-sm-5 px-4">
                     <div class="wrapper-thumb">
                        <div class="slider-thumb">
                           @foreach($organisation->suggestion_comments as $comment)
                           <div class="slide-thumb p-3 border mr-1">
                              <div class="card-image image-overlay">
                                 <img class="card-img-top" src="{{ $comment->media->first()->getFullUrl() }}"
                                    alt="Card image">
                                 <a href="#comment_{{ $comment->id }}"
                                    class="btn btn-outline-white btn-dark radius-5 py-3 px-4 text-capitalize open_comment">
                                    More Info</a>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <!-- /thumb-slider -->
                     </div>
                  </div>
                  <!-- /item__preview-thumb-->
                  @endif
               </div>

               @if(count($organisation->suggestion_comments) > 4)
               <div class="col-sm-12 text-center">
                  <div class="prev-nav thumb-nav mb-5">
                     <span class="lnr nav-left lnr-arrow-left btn-outline-theme radius-5 p-3 p-sm-3"></span>
                     <span class="lnr nav-right lnr-arrow-right btn-outline-theme radius-5 p-3 p-sm-3"></span>
                  </div>
                  <!-- /prev-nav -->
               </div>
               @endif
            </div>
            <!-- /item__action -->
         </div>

         <div class="pdt-item-info mt-4 shadow border">
            <div class="pdt-item-nav">
               <ul class="nav nav-tabs p-4">
                  <li>
                     <a href="#product-details" class="active px-4 py-2" data-toggle="tab">Details</a>
                  </li>
                  <li>
                     <a href="#product-comments" class="px-4 py-2" data-toggle="tab">Comments </a>
                  </li>

                  <li>
                     <a href="#product-faq" class="px-4 py-2" data-toggle="tab">FAQ</a>
                  </li>
                  <li>
               </ul>
            </div>
            <!-- /pdt-item-nav -->
            <div class="tab-content">
               <div class="fade show tab-pane product-tab active" id="product-details">
                  <div class="tab-content-wrapper p-4">
                     <h3 class="mb-3">Landing Page Details</h3>
                     <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                        leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scel
                        erisque the mattis, leo quam aliquet congue justo ut scelerisque. Praesent pharetra, justo ut
                        scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.
                     </p>
                  </div>
               </div>


               <div class="fade show tab-pane faq-tab" id="product-faq">
                  <div class="tab-content-wrapper p-4">
                     <div id="accordion" class="accordion">
                        <div class="card mb-0 border-0">
                           <div class="card-header border-theme bg-white mb-0">
                              <a href="#collapseOne" class="card-title d-block collapsed d-block mb-0"
                                 data-toggle="collapse">
                                 <h5 class="d-inline-block">What is Lorem Ipsum? </h5>
                              </a>
                           </div>
                           <div id="collapseOne" class="card-body collapse border-theme border-top-0"
                              data-parent="#accordion">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                 Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                 unknown printer took a galley of type and scrambled it to make a type specimen book.
                              </p>
                           </div>
                           <div class="card-header border-theme bg-white mt-3 mb-0">
                              <a href="#collapseTwo" class="card-title collapsed d-block mb-0" data-toggle="collapse">
                                 <h5 class="d-inline-block">Why do we use it? </h5>
                              </a>
                           </div>
                           <div id="collapseTwo" class="card-body collapse border-theme border-top-0"
                              data-parent="#accordion">
                              <p>It is a long established fact that a reader will be distracted by the readable
                                 content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                 it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                 here, content here'.</p>
                           </div>
                           <div class="card-header card-header border-theme bg-white mt-3 mb-0">
                              <a href="#collapseThree" class="card-title collapsed d-block mb-0" data-toggle="collapse">
                                 <h5 class="d-inline-block">Where does come? </h5>
                              </a>
                           </div>
                           <div id="collapseThree" class="card-body collapse border-theme border-top-0"
                              data-parent="#accordion">
                              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                 piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                 Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="fade show tab-pane comments-tab" id="product-comments">
                  <div class="tab-content-wrapper p-4">
                     <div class="card-body p-0">


                        <div id="comments">
                           @foreach($organisation->comments as $comment)
                           @include('organisations.comment', ['comment' => $comment])
                           @endforeach
                        </div>

                        @include('organisations.comment_form')

                     </div>
                  </div>
               </div>
               <!-- /tab-content -->
            </div>
         </div>
         <!-- /col-md-8 -->
      </div>
   </div>

</div>
@endsection

@section('js')

<script>
   tup({
      headers: {
         'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
   });
   $('#comment_organisation').click(function () {
      let url = '{{ route('app.organisations.comment', ['id' => $organisation->id]) }}';
      let organisation_id = '{{ $organisation->id }}';
      let username = $('#comment_username').val();
      let text = $('#comment_text').val();
      let parent_comment_id = $('#comment_reply_id').val();
      let comment_rate = $('#comment_rate').val();
      $.post(url,
         {
            organisation_id: organisation_id,
            username: username,
            text: text,
            parent_comment_id: parent_comment_id,
            rate: comment_rate,
         },
         function (data, status) {
            if (data.message === "success")
               $('#comments').append(data.html);
            $('#comment_username').val('');
            $('#comment_text').val('');
            $('#comment_reply_id').val('')
            $('#comment_rate').val('')

         })

   });

   function drop_reply_data() {
      $('#comment_reply_id').val('');
      $('.replay-div').hide();
      $('#comment_reply_a').attr('href', '')
      $('#commpent_reply_username').val('');
      $('#reply_time').val('');
      $('#reply_text').val('');
   }
   drop_reply_data();
   $('.cancel_reply').click(function () {
      drop_reply_data();
   })
   $('.reply').click(function () {
      $('html, body').animate({
         scrollTop: $("#leave_comment").offset().top - 150
      }, 100);
      let organisation_id = $(this).attr('comment_id');
      $('#comment_reply_id').val(organisation_id);
      $('.replay-div').show();
      $('#comment_reply_a').attr('href', '#comment_' + organisation_id)
      $('#commpent_reply_username').html($('#comment_username_' + organisation_id).html())
      $('#reply_time').html($('#comment_time_' + organisation_id).html())
      let text = $('#comment_text_' + organisation_id).text();
      $('#reply_text').html(text.slice(0, 30) + '...')
   });
   $('.replylick(function () {
         let organisation_id = $(this).attr('comment_id');
   $('#comment_reply_id').val(organisation_id);
      });

</script>


<script src="{{ asset('assets/plugins/summernote/js/summernote-bs4.js') }}"></script>

<script>
   // Text Editor

   $('.text-editor').summernote({
      height: 140, // set editor height
      minHeight: null, // sght of editor
      maxHeight: null, // set maximum height of editor
      focus: false // set focus to editable area after initializing summernote
   });

   $('a.open_comment').click(function () {
      $('a[href="#product-comments"]').click();
      $(this).click();
   })


</script>
@endsection
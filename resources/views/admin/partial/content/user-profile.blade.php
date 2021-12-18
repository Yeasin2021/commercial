
@extends('admin.index')

@push('style')
  <link rel="stylesheet" href="{{asset('admin/css/sample.css')}}">
@endpush


@section('content')
    
    <div class="row user">
          <div class="col-md-12">
            <div class="profile">
              <div class="info"><img class="user-img" src="{{ asset('/uploads/users/'.auth()->user()->photo) }}">
                <h4>{{auth()->user()->name}}</h4>
                <p>{{auth()->user()->designation}}</p>
              </div>
              <div class="cover-image"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="tile p-0">
              <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <div class="tab-pane active" id="user-timeline">
                <div class="timeline-post">
                  <div class="post-media"><a href="#"><img class="user-img" height="50px" width="50px" src="{{ asset('/uploads/users/'.auth()->user()->photo) }}"></a>
                    <div class="content">
                      <h5><a href="#">{{auth()->user()->name}}</a></h5>
                      <p class="text-muted"><small>{{date("F j, Y, g:i a",time() - 6*3600)}}</small></p>
                    </div>
                  </div>
                  <div class="post-content">
                    <p>{!! auth()->user()->description !!}</p>
                  </div>
                 
                </div>
               
              </div>
              <div class="tab-pane fade" id="user-settings">
                <div class="tile user-settings">
                  <h4 class="line-head">Settings</h4>
                  <form action="{{route('profile-post',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label>Name</label>
                        <input class="form-control" type="hidden" name="id" value="{{auth()->user()->id}}"  >
                        <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}"  >
                      </div>
                      <div class="col-md-6 mb-4">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}">
                      </div>
                      
                    </div>
                    <div class="row">
                      
                      <div class="clearfix"></div>
                      
                      <div class="clearfix"></div>
                     
                      <div class="clearfix"></div>
                      <div class="col-md-6 mb-4">
                        <label>Photo</label>
                        <input class="form-control" type="file" name="photo" onchange="previewFile(this)">
                        <img src="{{ asset('/uploads/users/'.auth()->user()->photo) }}" class="img-fluid mt-2"  style="max-height:100px; max-width: 100px;" id="previewImg"  alt=" ">
                      </div>
                      <div class="col-md-6 mb-4">
                        <label>Designation</label>
                        <input class="form-control" type="text" name="designation" value="{{auth()->user()->designation}}">
                      </div>
                    </div>

                    <div class="row mb-10">
                      <div class="col-md-12">
                        <textarea name="description" id="editor">{!! auth()->user()->description !!}</textarea>
                      </div>
                    </div>

                    <div class="row mb-10">
                      <div class="col-md-12">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
  </div>



@endsection

@push('js')
<script>
    function previewFile(input){
        var file = $("input[type = file]").get(0).files[0];

        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('admin') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('admin') }}/js/popper.min.js"></script>
    <script src="{{ asset('admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin') }}/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="{{asset('admin/js/ckeditor.js')}}"></script>

    <script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
@endpush
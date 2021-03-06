@extends('admin.layouts.app')

@section('main_content')
<div class="content-wrapper">
<section class="content">
<div class="row">
	<h1 style="margin-left: 15px;">Update Your Post</h1>
  @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <h3>{{ $error }}</h3>
                  @endforeach
              </ul>
          </div>
      @endif
<form role="form" method="post" action="{{route('post.update',$data->id)}}" enctype="multipart/form-data">
  {{csrf_field()}}
    {{method_field('PUT')}}
<div class="col-lg-6">
	<div class="box box-primary">
              <div class="box-body">
                <div class="form-group">
                  <label for="posttitle">Post Title</label>
                  <input type="text" class="form-control" id="posttitle" name="posttitle" value="{{$data->title}}">
                </div>

                <div class="form-group">
                  <label for="postsubtitle">Post Subtitle</label>
                  <input type="text" class="form-control" id="postsubtitle" name="postsubtitle" value="{{$data->subtitle}}">
                </div>
                 <div class="form-group">
                  <label for="postslug">Post Slug</label>
                  <input type="text" class="form-control" id="postslug" name="postslug" value="{{$data->slug}}">
                </div>

           
            </div>
  	</div>
</div>
<div class="col-lg-6">
	<div class="box box-primary">
            <div class="box-header with-border">
              <div class="pull-right">
                  <div class="form-group">
                  <label for="image">Images</label>
                    <input type="file" id="image" name="image">
                </div>
              </div>
	 		
              <div class="pull-left">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="status"
                     @if($data->status == '1')
                     checked = "checked"
                      @endif >publish
                  </label>
                </div>
              </div>
      </br>
      </br>
           <div class="form-group" style="margin-top: 18px">
                <label>Post Tag</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" name="posttag[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   @foreach($tags as $tag)  
                  <option value="{{$tag->id}}"

                  @foreach($data->tags as $postdata)
                    @if($postdata->id == $tag->id)
                      selected
                      @endif
                  @endforeach
                    >{{$tag->name}}</option>
                @endforeach
                </select>
              </div>

               <div class="form-group" style="margin-top: 18px">
                <label>Post Category</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" name="postcategory[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($categories as $category)  
                  <option value="{{$category->id}}"

                  @foreach($data->categories as $postcategories)
                    @if($postcategories->id == $category->id)
                      selected
                      @endif
                  @endforeach

                    >{{$category->name}}</option>
                @endforeach
                </select>
              </div>

            </div>
      </div>
 </div>
<div class="col-md-12">
     	  <div class="box">
         <div class="box-body pad">
          <label for="body">Post</label>
                <textarea  id="editor1"  name="body" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{$data->body}}
                          	
                 </textarea> 
          <button type="submit" class="btn btn-primary">Submit</button>
           <a class="btn btn-warning" href="{{route('post.index')}}">Back</a>

            </div>
          </div>
    </div>
 </form>
 </div>
</section>
</div>
  
@endsection
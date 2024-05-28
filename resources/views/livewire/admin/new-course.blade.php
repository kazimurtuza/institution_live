<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Course</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            @if (session()->has('error_message'))<div class="alert alert-danger">{{ session('error_message') }}</div> @endif
            
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <select required class="form-control" wire:model="category">
                            <option value="">Select Type</option>
                            @foreach($all_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    
                        @error('category') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subject</label>
                        <select required class="form-control" wire:model="subject">
                            <option value="">Select Subject</option>
                            @foreach($all_subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    
                        @error('subject') <span class="error">{{ $message }}</span> @enderror
                    </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="title">
                  @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Short Summery </label>
                    <textarea class="summery form-control" wire:model="summery">
                        
                        </textarea>
                    @error('summery') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Cover Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input required type="file" class="custom-file-input" id="exampleInputFile" wire:model="cover">
                        <label class="custom-file-label" for="exampleInputFile">Upload Cover Photo</label>
                        @error('cover') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Type</label>
                    <select required class="form-control" wire:model="payment_type">
                        <option>Select Payment</option>
                        <option value="Free">Free/scholarship</option>
                        <option value="Paid">Paid</option>
                    </select>
                    @error('payment_type') <span class="error">{{ $message }}</span> @enderror
                </div>

                
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="price">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="discount_price">
                    @error('discount_price') <span class="error">{{ $message }}</span> @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Discount Duration</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="discount_duration">
                    @error('discount_duration') <span class="error">{{ $message }}</span> @enderror
                </div> --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Duration</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="course_duration">
                    @error('course_duration') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lesson</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="lesson">
                    @error('lesson') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Level</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="course_level">
                    @error('course_level') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Language</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="language">
                    @error('language') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subtitle Language</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="subtitle_language">
                    @error('subtitle_language') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Instructor</label>
                    <select required class="form-control" wire:model="instructor">
                        <option value="">Select Instructor</option>
                        @foreach($all_instructors as $instructor)
                        <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                        @endforeach
                    </select>
                
                    @error('instructor') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Overview </label>
                    <textarea class="overview form-control" wire:model="overview">
                        
                        </textarea>
                    @error('overview') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Curiculum </label>
                    <textarea class="curiculm form-control" wire:model="curiculm">
                        
                        </textarea>
                    @error('curiculm') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Points </label>
                    <textarea class="course_points form-control" wire:model="course_points">
                        
                        </textarea>
                    @error('course_points') <span class="error">{{ $message }}</span> @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Videos</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="resourses[]" class="form-control"   wire:model="resourses">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Videos</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="resourses[]" class="form-control"   wire:model="resourses">
                    
                </div> --}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Course Resourses</label>
                    <button type="button" id="add_more">Add More</button>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="resourses[]" class="form-control"   wire:model="resourses">
                   
                    {{-- <a href="#"wire:click.prevant="AddResourse">Add more</a> --}}
                   
                </div>
                <div class="field"></div> 
               
                 
                  <div wire:loading wire:target="cover" style="color:red"> Uploading Cover Photo---</div> <br/><br/> 
                  <div wire:loading wire:target="resourses" style="color:red"> Uploading resources Files---</div> <br/><br/> 

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


  @push('summernote')
  <script>
    $('.summernote').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('details', contents);
            }
        }
    });
    $('.course_points').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('course_points', contents);
            }
        }
    });
    $('.curiculm').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('curiculm', contents);
            }
        }
    });

    $('.overview').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('overview', contents);
            }
        }
    });
    $('.summery').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('summery', contents);
            }
        }
    });

    

    $("#add_more").click(function() {
    //add new inputs here, something like:
    //alert('working');
    $(".field").append('<input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="resourses[]" class="form-control"   wire:model="resourses"><br/>');
        });
    
  </script>
      
  @endpush
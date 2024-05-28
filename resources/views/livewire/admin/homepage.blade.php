<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Home Page</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
              <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Page Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="name">
                  @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Banner short Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="banner_short_title">
                    @error('banner_short_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Big Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="banner_big_title">
                    @error('banner_big_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="summery">
                    @error('summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="cat_summery">
                    @error('cat_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="course_summery">
                    @error('course_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Key Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="key_summery">
                    @error('key_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Learn Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_summery">
                    @error('learn_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Learn Title One</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_one_title">
                    @error('learn_one_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">One Details</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_one_details">
                    @error('learn_one_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Two Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_two_title">
                    @error('learn_two_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Two Details</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_two_details">
                    @error('learn_two_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Three Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_three_title">
                    @error('learn_three_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Three Details</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_three_details">
                    @error('learn_three_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Learn Review Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="learn_review_text">
                    @error('learn_review_text') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Testimonial Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="testi_summery">
                    @error('testi_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="meta_title">
                    @error('meta_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="meta_details">
                    @error('meta_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputFile"> Page Banner</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="page_banner">
                        <label class="custom-file-label" for="exampleInputFile">Upload Page Banner</label>
                        @error('page_banner') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                
                

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
  </script>
      
  @endpush
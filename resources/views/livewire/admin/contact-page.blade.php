<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Contact Page</h3>
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
                    <label for="exampleInputEmail1">Page Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="page_summery">
                    @error('page_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Thumb Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="thumb_img">
                        <label class="custom-file-label" for="exampleInputFile">Upload Thumb Image</label>
                        @error('thumb_img') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Info Head</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="contact_head">
                    @error('contact_head') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Info Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="contact_summery">
                    @error('contact_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Form Head</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="form_head">
                    @error('form_head') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Form Summery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="form_summery">
                    @error('form_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="address">
                    @error('address') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="phone">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Map Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="map_source">
                    @error('map_source') <span class="error">{{ $message }}</span> @enderror
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
                
                  <div wire:loading wire:target="page_banner" style="color:red"> Uploading Page Banner---</div> <br/><br/>
                  <div wire:loading wire:target="thumb_img" style="color:red"> Uploading Thumb Image---</div> <br/><br/> 

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
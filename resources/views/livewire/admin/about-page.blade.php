<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Page</h3>
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
                    <label for="exampleInputEmail1">Chairman Short Message</label>
                    <textarea class="chairman_short_message form-control" name="" id="" cols="30" rows="10" wire:model="chairman_short_message">
                      {{$chairman_short_message}}
                    </textarea>
                    
                    @error('chairman_short_message') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chairman Details Message</label>
                    <textarea class="chairman_details_message form-control" name="" id="" cols="30" rows="10" wire:model="chairman_details_message">
                      {{$chairman_details_message}}
                    </textarea>
                    
                    @error('chairman_details_message') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile"> Chairman Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="chairman_pic">
                        <label class="custom-file-label" for="exampleInputFile">Upload Page Banner</label>
                        @error('chairman_pic') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vission Short Message</label>
                    <textarea class="vission_short_message form-control" name="" id="" cols="30" rows="10" wire:model="vission_short_message">
                      {{$vission_short_message}}
                    </textarea>
                    
                    @error('vission_short_message') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vission Details Message</label>
                    <textarea class="vission_details_message form-control" name="" id="" cols="30" rows="10" wire:model="vission_details_message">
                      {{$vission_details_message}}
                    </textarea>
                    
                    @error('vission_details_message') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile"> Vission Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="vission_pic">
                        <label class="custom-file-label" for="exampleInputFile">Upload Page Banner</label>
                        @error('vission_pic') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mission Short Message</label>
                    <textarea class="mission_short_message form-control" name="" id="" cols="30" rows="10" wire:model="mission_short_message">
                      {{$mission_short_message}}
                    </textarea>
                    @error('mission_short_message') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mission Title One</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="mission_one_title">
                    @error('mission_one_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mission Details One</label>
                    <textarea class="mission_one_details form-control" name="" id="" cols="30" rows="10" wire:model="mission_one_details">
                      {{$mission_one_details}}
                    </textarea>
                    @error('mission_one_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mission Title Two</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="mission_two_title">
                    @error('mission_two_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mission Details Two</label>
                    <textarea class="mission_two_details form-control" name="" id="" cols="30" rows="10" wire:model="mission_two_details">
                      {{$mission_two_details}}
                    </textarea>
                    @error('mission_two_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile"> Mission Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="mission_pic">
                        <label class="custom-file-label" for="exampleInputFile">Upload Page Banner</label>
                        @error('mission_pic') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
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
                
                  <div wire:loading wire:target="page_banner" style="color:red"> Uploading Banner Photo---</div> <br/><br/>  

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
    $('.chairman_short_message').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('chairman_short_message', contents);
            }
        }
    });
    $('.chairman_details_message').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('chairman_details_message', contents);
            }
        }
    });
    $('.vission_short_message').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('vission_short_message', contents);
            }
        }
    });
    $('.vission_details_message').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('vission_details_message', contents);
            }
        }
    });
    $('.mission_short_message').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('mission_short_message', contents);
            }
        }
    });
    $('.mission_one_details').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('mission_one_details', contents);
            }
        }
    });
    $('.mission_two_details').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('mission_two_details', contents);
            }
        }
    });

    
  </script>
      
  @endpush
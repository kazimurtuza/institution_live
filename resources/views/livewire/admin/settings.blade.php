<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Settings</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
              <div class="card-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="address">
                  @error('address') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="phone">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="email">
                  @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Copy Right Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="copyright">
                    @error('copyright') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Footer Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="fotter_summery">
                    @error('fotter_summery') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="facebook">
                    @error('facebook') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="instagram">
                    @error('instagram') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Linkdin Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="linkdin">
                    @error('linkdin') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sanpchat Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="snapchat">
                    @error('snapchat') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="twitter">
                    @error('twitter') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter " wire:model="youtube">
                    @error('youtube') <span class="error">{{ $message }}</span> @enderror
                  </div>
              
                <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="logo">
                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Favicon</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="favicon">
                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                        @error('favicon') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Newsletter Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="newimg">
                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                        @error('new_img') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Newsletter Summery </label>
                    <textarea class="new_details form-control" wire:model="new_details">
                        {{$new_details}}
                        </textarea>
                    @error('new_details') <span class="error">{{ $message }}</span> @enderror
                </div>

                  
               
                <div wire:loading wire:target="newimg" style="color:red"> Image Uploading</div> <br/><br/>

                  <div wire:loading wire:target="logo" style="color:red"> Logo Uploading</div> <br/><br/>
                  <div wire:loading wire:target="favicon" style="color:red"> Favicon Uploading</div> <br/><br/>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
    $('.new_details').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('new_details', contents);
            }
        }
    });
    
  </script>
      
  @endpush


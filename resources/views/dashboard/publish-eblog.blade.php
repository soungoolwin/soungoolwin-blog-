<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row my-5">
            <div class="col-md-6 offset-md-3 card p-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror


                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Intro</label>
                        <input type="text" name="intro" class="form-control" value="{{old('intro')}}">
                    </div>
                    @error('intro')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="text" name="image" class="form-control" value="{{old('image')}}">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="body" id="editor" class="form-control">{{old('body')}}</textarea>
                    </div>
                    @error('body')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror



                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary my-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        class MyUploadAdapter {
        constructor( loader ) {
    // The file loader instance to use during the upload. It sounds scary but do not
    // worry — the loader will be passed into the adapter later on in this guide.
    this.loader = loader;
    }
    
    // Starts the upload process.
    upload() {
    return this.loader.file
        .then( file => new Promise( ( resolve, reject ) => {
            this._initRequest();
            this._initListeners( resolve, reject, file );
            this._sendRequest( file );
        } ) );
    }
    
    // Aborts the upload process.
    abort() {
    if ( this.xhr ) {
        this.xhr.abort();
    }
    }
    _initRequest() {
    const xhr = this.xhr = new XMLHttpRequest();
    
    // Note that your request may look different. It is up to you and your editor
    // integration to choose the right communication channel. This example uses
    // a POST request with JSON as a data structure but your configuration
    // could be different.
    xhr.open( 'POST', '{{route('admin.images.storetoeblog')}}', true );
    xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
    xhr.responseType = 'json';
    } 
    // Initializes XMLHttpRequest listeners.
    _initListeners( resolve, reject, file ) {
    const xhr = this.xhr;
    const loader = this.loader;
    const genericErrorText = `Couldn't upload file: ${ file.name }.`;
    
    xhr.addEventListener( 'error', () => reject( genericErrorText ) );
    xhr.addEventListener( 'abort', () => reject() );
    xhr.addEventListener( 'load', () => {
        const response = xhr.response;
    
        // This example assumes the XHR server's "response" object will come with
        // an "error" which has its own "message" that can be passed to reject()
        // in the upload promise.
        //
        // Your integration may handle upload errors in a different way so make sure
        // it is done properly. The reject() function must be called when the upload fails.
        if ( !response || response.error ) {
            return reject( response && response.error ? response.error.message : genericErrorText );
        }
    
        // If the upload is successful, resolve the upload promise with an object containing
        // at least the "default" URL, pointing to the image on the server.
        // This URL will be used to display the image in the content. Learn more in the
        // UploadAdapter#upload documentation.
        resolve( {
            default: response.url
        } );
    } );
    
    // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
    // properties which are used e.g. to display the upload progress bar in the editor
    // user interface.
    if ( xhr.upload ) {
        xhr.upload.addEventListener( 'progress', evt => {
            if ( evt.lengthComputable ) {
                loader.uploadTotal = evt.total;
                loader.uploaded = evt.loaded;
            }
        } );
    }
    }
    // Prepares the data and sends the request.
    _sendRequest( file ) {
    // Prepare the form data.
    const data = new FormData();
    
    data.append( 'uploadtoeblog', file );
    
    // Important note: This is the right place to implement security mechanisms
    // like authentication and CSRF protection. For instance, you can use
    // XMLHttpRequest.setRequestHeader() to set the request headers containing
    // the CSRF token generated earlier by your application.
    
    // Send the request.
    this.xhr.send( data );
    }
    
    // ...
    }
    function SimpleUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
    // Configure the URL to the upload script in your back-end here!
    return new MyUploadAdapter( loader );
    };
    }
    
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
    extraPlugins: [ SimpleUploadAdapterPlugin ],
    })
        .catch( error => {
            console.error( error );
        } );
    </script>

</x-dashboard-layout>
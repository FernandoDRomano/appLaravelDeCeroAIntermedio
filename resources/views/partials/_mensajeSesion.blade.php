@if (session('mensaje'))
    <div class="alert alert-primary alert-dismissible m-3 fade show" role="alert">
        <strong>
            {{ session('mensaje') }}
        </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@extends('layouts.app')

@section('content')
<body class='subscribe'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subscribe</div>
                    <div class="card-body">
                        @if (auth()->user()->isSubscribed())
                            <p>You are already subscribed.</p>
                        @else
                            <h5 class="card-title">Do Subscribe to access our premium books!!</h5> 
                            <form method="POST" action="{{ route('subscription.subscribe') }}">
                                @csrf
                                <button type="submit" class="custom-btn btn-5" id="view-btn">Subscribe</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('[data-toggle="modal"]').modal();
        $('form').submit(function(event) {
            event.preventDefault(); 

            const form = this; 

            Swal.fire({
                title: 'Are you sure want to Subscribe?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection



<style>
    .subscribe{
    background-color: #0D1F2D;
   
}

 .custom-btn {
  width: 130px;
  height: 40px;

  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;

  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
} 
#view-btn{
    text-decoration: none;

    font-weight: 600;
}
.btn-5 {
  width: 130px;
  height: 40px;
  line-height: 42px;
  padding: 0;
  border: none;
  background: rgb(255,27,0);
background: linear-gradient(0deg, rgba(255,27,0,1) 0%, rgba(251,75,2,1) 100%);
}
.btn-5:hover {
  color: #f0094a;
  background: transparent;
   box-shadow:none;
}
.btn-5:before,
.btn-5:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background: #f0094a;
  box-shadow:
   -1px -1px 5px 0px #fff,
   7px 7px 20px 0px #0003,
   4px 4px 5px 0px #0002;
  transition:400ms ease all;
}
.btn-5:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.btn-5:hover:before,
.btn-5:hover:after{
  width:100%;
  transition:800ms ease all;
}

</style>
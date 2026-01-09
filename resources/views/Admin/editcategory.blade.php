@extends('Admin.sidebar')

@section('admin')


<style>
/* Page area behind form */
.page-black-bg{
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
    min-height:100vh;
    padding:60px 0;
    text-shadow:0 0 20px #ff4c60;
}

/* Dark form box */
.dark-form{
    background-color:#111;
    border-radius:12px;
    padding:40px;
    border:1px solid #222;
     max-width:550px;   
    min-height:400px;  

}

/* Form title */
.dark-title{
    color:#ff4c60;
    font-size:28px;
    font-weight:700;
    text-transform:uppercase;
}

/* Inputs */
.dark-input{
    background:#000;
    border:1px solid #ff4c60;
    color:#fff;
 
}

.dark-input::placeholder{
    color:#777;
}

.dark-input:focus{
    background:#000;
    color:#fff;
    border-color:#ff2f92;
    box-shadow:none;
}

/* Button */
.dark-btn{
    background:#ff4c60;
    color:#fff;
    border:none;
    padding:10px 35px;
    border-radius:25px;
       box-shadow:0 0 20px #ff4c60;
}

</style>

<div class="page-black-bg">
    <div class="container">
        <div class="row justify-content-center text-center">
  <div class="col-md-2"></div>

          <div class="col-md-8">

                <div class="dark-form">
                    <h2 class="text-center dark-title mb-4 mt-4">
                        Update Category
                    </h2>

                    <form action="{{route('updatecategory',$data->id)}}" method="post">
                        @csrf

                       <div class="mb-4">
              <input type="text"
           name="name" value="{{$data->name}}"
           class="form-control dark-input mt-5"
           placeholder="Category Name">
              </div>

           <div class="mb-4">
              <input type="text"
           name="desc" value="{{$data->desc}}"
           class="form-control dark-input mt-4"
           placeholder="Description">
           </div>

                        <div class="text-center mt-5">
                            <button class="dark-btn">
                                Update Category
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

  <div class="col-md-2"></div>
    </div>
</div>
</div>
@endsection
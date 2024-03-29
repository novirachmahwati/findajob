@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" style="height: 60px !important;"> 
    <p class="text-white">{{ $message }}</p>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" style="height: 60px !important;"> 
    <p class="text-white">{{ $message }}</p>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger alert-block text-white" style="height: 60px !important;"> 
    Silakan periksa formulir di bawah ini untuk detail pesan kesalahan.
</div>
@endif
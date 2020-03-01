@if ($errors->any())  
<div class="flash alert alert-danger" data-closable>  
    <ul> 
        @foreach ($errors->all() as $error)  
        <li>{{ $error }}</li> 
        @endforeach  
    </ul>  
    <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">
</div> 
 @endif 

 @if (session('error'))  
<div class="flash alert alert-danger">  
    <ul> 
        <li>{{session('error')}}</li> 
    </ul>  
    <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">
</div> 
 @endif 


 @if(session('success'))
<div class="flash alert alert-success">
    <ul> 
        <li>{{session('success')}}</li> 
    </ul>  
    <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">
</div>
@endif

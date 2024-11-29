@extends('landing-page.layouts.default')


@section('content')
<div class="my-5">
   <h4 class="text-center text-capitalize font-weight-bold my-5">{{__('landingpage.data_deletion_request')}}</h4>
   <div class="container">
      {!! $data_deletion_request->value ?? null !!}
   </div>
 </div>

 <script>
   tinymce.init({
      selector: '.container',
      height: 500,
      plugins: 'code',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | code',
   });
</script>
@endsection

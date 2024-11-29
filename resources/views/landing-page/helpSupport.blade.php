@extends('landing-page.layouts.default')


@section('content')
<div class="my-5">
   <h4 class="text-center text-capitalize font-weight-bold my-5">{{__('landingpage.help_support')}}</h4>
   <div class="container">
      {!! $help_support->value ?? null !!}
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

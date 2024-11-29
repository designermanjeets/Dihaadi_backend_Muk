@if($provider_document)
<?php  $image = getSingleMedia($provider_document,'provider_document');?>
<a href="javascript:void(0);" data-toggle="modal"  data-target="#exampleModal">
  <div class="d-flex gap-3 align-items-center">
      
    <img src=" {{ $image }}" id="document_img" alt="avatar" class="attachmentImgCls avatar avatar-40 rounded-pill">
    <div class="text-start">
      
    </div>
  </div>
</a>
@else

<div class="align-items-center">
    <h6 class="text-center">{{ '-' }} </h6>
</div>
@endif




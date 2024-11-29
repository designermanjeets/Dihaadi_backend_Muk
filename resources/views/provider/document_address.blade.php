@if($provider_document)
<a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">
  <div class="d-flex gap-3 align-items-center">
      <?php  $image = getSingleMedia($provider_document,'provider_documentaddress');?>
    <img src=" {{ $image }}" alt="avatar" id="document_add_img" class="attachmentImgClsadd avatar avatar-40 rounded-pill">
    <div class="text-start">
      
    </div>
  </div>
</a>
@else

<div class="align-items-center">
    <h6 class="text-center">{{ '-' }} </h6>
</div>
@endif




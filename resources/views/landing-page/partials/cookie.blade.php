@php 
   $cookie = App\Models\Setting::where('type','cookie-setup')->where('key', 'cookie-setup')->first();
   $cookiesetup = $cookie ? json_decode($cookie->value, true) : null;
@endphp
<div id="cookiePopup" class="px-5 py-4 bg-light cookiePopup position-fixed w-100 bottom-0 start-0 end-0">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h5 class="mb-1">{{$cookiesetup['title'] ?? ''}}</h5>
         <p class="m-0">{{$cookiesetup['description'] ?? ''}}</p>
      </div>
      <div class="col-md-6 text-md-end mt-md-0 mt-3">
         <button id="acceptCookie" class="btn btn-primary">{{__('landingpage.accept_all')}}</button>
      </div>
   </div>
</div>

<script type="text/javascript">

   var cookieName= "handyman_service_cookie";
   var cookieValue="true";
   var cookieExpireDays= 1;

   let acceptCookie= document.getElementById("acceptCookie");

   acceptCookie.onclick= function(){
      createCookie(cookieName, cookieValue, cookieExpireDays);
   }

   let createCookie= function(cookieName, cookieValue, cookieExpireDays){
      let currentDate = new Date();
      currentDate.setTime(currentDate.getTime() + (cookieExpireDays*24*60*60*1000));
      let expires = "expires=" + currentDate.toGMTString();
      document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
      if(document.cookie){
         document.getElementById("cookiePopup").style.display = "none";
      } 
   }

   let getCookie= function(cookieName){
      let name = cookieName + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i < ca.length; i++) {
         let c = ca[i];
         while (c.charAt(0) == ' ') {
            c = c.substring(1);
         }
         if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
         }
      }
      return "";
   }
   let checkCookie= function(){
      let check=getCookie(cookieName);
      if(check==""){
         document.getElementById("cookiePopup").style.display = "block";
      }else{
         
         document.getElementById("cookiePopup").style.display = "none";
      }
   }
   checkCookie();
</script>
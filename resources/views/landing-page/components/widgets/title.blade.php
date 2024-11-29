{{#compare isTextCenter '==' 'true'}}
<div class="iq-title-box text-center center">
   <h3 class="text-capitalize">{{title-text}}
      <span class="highlighted-text">
         <span class="highlighted-text-swipe">{{title-text-highlight}}</span>
         <span class="highlighted-image">
            <svg xmlns="http://www.w3.org/2000/svg" width="155" height="12" viewBox="0 0 155 12" fill="none">
               <path d="M2.5 9.5C3.16964 9.26081 78.8393 -2.45948 152.5 4.9554" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </span>
      </span> {{title-text-last}}
   </h3>
   {{#compare isDescription '==' 'true'}}
      <p class="iq-title-desc text-body mt-3 mb-0">{{$title-description}}</p>
   {{/compare}}
</div>
 {{else}}
 <div class="iq-title-box">
   <h3 class="text-capitalize">{{$title-text}}
      <div class="highlighted-text">
         <span class="highlighted-text-swipe">{{$title-text-highlight}}</span>
         <span class="highlighted-image">
            <svg xmlns="http://www.w3.org/2000/svg" width="155" height="12" viewBox="0 0 155 12" fill="none">
               <path d="M2.5 9.5C3.16964 9.26081 78.8393 -2.45948 152.5 4.9554" stroke="#5F60B9" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </span>
      </div> {{$title-text-last}}
   </h3>
   {{#compare isDescription '==' 'true'}}
      <p class="iq-title-desc text-body mt-3 mb-0">{{$title-description}}</p>
   {{/compare}}
</div>
{{/compare}}
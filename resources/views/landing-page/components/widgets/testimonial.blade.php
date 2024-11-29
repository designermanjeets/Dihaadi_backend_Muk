{{#compare isLightbackground '==' 'true'}}
<div class="iq-testimonial testimonial position-relative bg-light rounded-5">
    <div class="quote text-center rounded-circle">
        <img src="{{path}}assets/images/{{quote-image}}" class="img-fluid" alt="quote">
    </div>
    <h5 class="about-review-title line-count-1">{{$about-review-title}}</h5>
    <p class="mt-3 mb-0 testimonial-content line-count-3 fw-500">{{$testimonial-content}}</p>
    <div
        class="mt-4 d-flex align-items-sm-center align-items-start justify-content-between flex-sm-row flex-column gap-3">
        {{#compare isRatting '==' 'true'}}
        <div class="ratting-block">
            {{>components/widgets/filter-rating }}
        </div>
        {{/compare}}
        <div class="d-inline-flex align-items-center gap-3">
            <div class="testimonial-user-image flex-shrink-0">
                <img src="{{path}}assets/images/{{testimonial-user-image}}" class="img-fluid rounded-2"
                    alt="user-image">
            </div>
            <div class="user-content">
                <h6 class="testimonial-user line-count-1">{{$testimonial-user}}</h6>
                <span class="testimonial-user-meta font-size-14 line-count-1">{{$testimonial-user-meta}}</span>
            </div>
        </div>
    </div>
</div>
{{else}}
<div class="iq-testimonial testimonial position-relative bg-body rounded-5">
    <div class="quote text-center rounded-circle">
        <img src="{{path}}assets/images/{{quote-image}}" class="img-fluid" alt="quote">
    </div>
    <h5 class="about-review-title line-count-1">{{$about-review-title}}</h5>
    <p class="mt-3 mb-0 testimonial-content line-count-3 fw-500">{{$testimonial-content}}</p>
    <div class="row align-items-center justify-content-between mt-4">
        <div class="col-sm-7">
            <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3">
                <div class="testimonial-user-image flex-shrink-0">
                    <img src="{{path}}assets/images/{{testimonial-user-image}}" class="avatar-50 object-cover rounded-2"
                        alt="user-image">
                </div>
                <div class="user-content">
                    <h6 class="testimonial-user line-count-1">{{$testimonial-user}}</h6>
                    <span class="testimonial-user-meta font-size-14 line-count-1">{{$testimonial-user-meta}}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 mt-sm-0 mt-3">
            {{#compare isRatting '==' 'true'}}
            <div class="ratting-block text-sm-end">
                @include('landing-page.components.widgets.filter-rating')
                
            </div>
            {{/compare}}
        </div>
    </div>
</div>
{{/compare}}
import * as $ from 'jquery'
window.jQuery = window.$ = $
// import 'swiper/scss';
// import 'swiper/scss/navigation';
// import 'swiper/scss/pagination';
// import 'swiper/swiper-bundle.min.css';
import ('./handyman')
import { createApp } from "vue";
import { createPinia } from 'pinia';
import { createI18n } from "vue-i18n";
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';
import ServiceSliderSection from './sections/ServiceSliderSection.vue'
import CategorySection from './sections/CategorySection.vue'
import CategoryPage from './sections/CategoryPage.vue'
import SubCategoryPage from './sections/SubCategoryPage.vue'
import ServicePage from './sections/ServicesPage.vue'
import BlogPage from './sections/BlogPage.vue'
import ProviderPage from './sections/ProviderPage.vue'
import BookingPage from './sections/BookingPage.vue'
import PostJobPage from './sections/PostJobPage.vue'
import TestimonialSection from './sections/TestimonialSection.vue'
import ServiceListSection from './sections/ServiceListSection.vue'
import BlogSlidersection from './sections/BlogSliderSection.vue'
import ServicePackageSection from './sections/ServicePackageSection.vue'
import ServicePackagePage from './sections/ServicePackagePage.vue'
import ServicedetailSection from './sections/ServicedetailSection.vue'
import RelatedServicePage from './sections/RelatedServicePage.vue'

import LocationSearch from './components/LocationSearch.vue'
import TopProvider from './components/TopProvider.vue'

import SectionThumbnailSection from './sections/SectionThumbnailSection.vue'
import PaginationCard from './components/PaginationCard.vue'
import RatingCard from './components/RatingCard.vue'
import BookingWizard from './sections/BookingWizard.vue'
import RatingAllPage from './sections/RatingAllPage.vue'
import BookingRating from './sections/BookingRating.vue'
import HandymanRating from './sections/HandymanRating.vue'
import Payment from './components/Payment.vue'
import PostJobForm from './sections/PostJobForm.vue'
import BookingPostJob from './sections/BookingPostJob.vue'
import Wallet from './components/Wallet.vue'
const pinia = createPinia();

const app = createApp()

app.use(pinia)

app.component('service-slider-section', ServiceSliderSection)
app.component('category-section', CategorySection)
app.component('category-page', CategoryPage)
app.component('subcategory-page', SubCategoryPage)
app.component('service-page', ServicePage)
app.component('blog-page', BlogPage)
app.component('provider-page', ProviderPage)
app.component('booking-page', BookingPage)
app.component('post-job-page', PostJobPage)
app.component('testimonial-section', TestimonialSection)
app.component('service-list-section', ServiceListSection)
app.component('blog-slider-section', BlogSlidersection)
app.component('service-package-section', ServicePackageSection)
app.component('service-package-page', ServicePackagePage)
app.component('landing-servicedetailsection-section', ServicedetailSection)
app.component('related-service-page', RelatedServicePage)
// app.component('landing-sectiondetailthumbnail-section', SectiondetailThumbnail)
// app.component('global-pagination', GlobalPagination)
app.component('location-search', LocationSearch)
app.component('top-provider', TopProvider)
app.component('section-thumbnail-section', SectionThumbnailSection)
app.component('pagination-component', PaginationCard)
app.component('rating-component', RatingCard)
app.component('booking-wizard',BookingWizard)
app.component('rating-all-page', RatingAllPage)
app.component('booking-rating', BookingRating)
app.component('handyman-rating', HandymanRating)
app.component('payment', Payment)
app.component('post-job-form',PostJobForm)
app.component('booking-post-job',BookingPostJob)
app.component('wallet', Wallet)

/*--------------------------------------
Calculate Header height
------------------------------------------*/
function headerHeightCount() {
    let is_header = document.querySelector('header .iq-navbar');
    if (is_header !== null) {
      let headerHeight = document.querySelector('header .iq-navbar')?.getBoundingClientRect().height;
      document.querySelector(':root').style.setProperty('--header-height', headerHeight + 'px');
    }
  }

  headerHeightCount();

//   jQuery(window).on('resize', function () {
//     headerHeightCount();
//   });


export const confirmcancleSwal = async ({title}) => {
  return await Swal.fire({
      title: title,
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#858482',
      confirmButtonText: 'Yes, do it!'
    }).then((result) => {
      return result
    })
}


function formatCurrency(number, noOfDecimal, currencyPosition, currencySymbol) {

  let formattedNumber = number.toFixed(noOfDecimal);

  let [integerPart, decimalPart] = formattedNumber.split('.');

  integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  decimalPart = decimalPart || '';

  let currencyString = '';

  if (currencyPosition === 'left') {
      currencyString += currencySymbol;

      currencyString += integerPart;

      if (noOfDecimal > 0) {
          currencyString += '.' + decimalPart;
      }
  }

  if (currencyPosition === 'right' ) {
      // Add decimal part and decimal separator if applicable
      if (noOfDecimal > 0) {
          currencyString += integerPart + '.' + decimalPart;
      }

      currencyString += currencySymbol;
  }

  return currencyString;
}

window.formatCurrency = formatCurrency;
const i18n = createI18n({
  legacy: false,
  locale: "en",
  globalInjection: true,
  messages: {en: window.localMessagesUpdate} || {},
});

window.i18n = i18n

app.use(i18n);
app.mount('#landing-app')

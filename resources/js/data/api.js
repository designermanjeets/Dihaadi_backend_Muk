var getMeta = document.querySelector('meta[name="baseUrl"]');
var getBaseURL = getMeta.getAttribute('content');
export const BASE_URL = getBaseURL + '/api'

const generateQueryParams = (object) => {
    return new URLSearchParams(object).toString()
}
export const CATEGORY_API = (queryPerams) => {return `${BASE_URL}/category-list?${generateQueryParams(queryPerams)}`}
export const BLOG_API = (queryPerams) => {return `${BASE_URL}/blog-list?${generateQueryParams(queryPerams)}`}
export const SERVICE_API = (queryPerams) => {return `${BASE_URL}/service-list?${generateQueryParams(queryPerams)}`}
export const TESTIMONIAL_API = (queryPerams) => {return `${BASE_URL}/top-rated-service?${generateQueryParams(queryPerams)}`}
export const PROVIDER_API = (queryPerams) => {return `${BASE_URL}/user-list?${generateQueryParams(queryPerams)}`}

export const FEATURED_CATEGORY_API = (queryPerams) => {return `${BASE_URL}/category-list?${generateQueryParams(queryPerams)}`}
export const POST_SERVICE_API = `${BASE_URL}/service-save`;
export const LOGIN_API = (queryPerams) => {return `${BASE_URL}/login?${generateQueryParams(queryPerams)}`}
export const BOOKINGLIST_API = (queryPerams) => {return `${BASE_URL}/booking-list?${generateQueryParams(queryPerams)}`}
export const POSTJOBLIST_API = (queryPerams) => {return `${BASE_URL}/get-post-job?${generateQueryParams(queryPerams)}`}
export const BOOKINGSTATUS_API = (queryPerams) => {return `${BASE_URL}/booking-status?${generateQueryParams(queryPerams)}`}
export const STORE_BOOKING_API = `${BASE_URL}/booking-save`

export const GET_PROVIDER_SLOT = (queryPerams) => {return `${BASE_URL}/get-provider-slot?${generateQueryParams(queryPerams)}`}
export const LANDING_PAGE_SETTING_API = (queryPerams) => {return `${BASE_URL}/landing-page-list?${generateQueryParams(queryPerams)}`}
export const GET_PAYMENT_METHOD = `${BASE_URL}/get-payment-method`
export const GET_STRIPE_PAYMENT_URL = `${BASE_URL}/create-stripe-payment`
export const STORE_BOOKING_RATING_API = `${BASE_URL}/save-booking-rating`
export const DELETE_BOOKING_RATING_API = `${BASE_URL}/delete-booking-rating`
export const STORE_HANDYMAN_RATING_API = `${BASE_URL}/save-handyman-rating`
export const DELETE_HANDYMAN_RATING_API = `${BASE_URL}/delete-handyman-rating`
export const SAVE_FAVOURITE_API = `${BASE_URL}/save-favourite`
export const DELETE_FAVOURITE_API = `${BASE_URL}/delete-favourite`
export const STORE_POST_JOB_API = `${BASE_URL}/save-post-job`;
export const SERVICE_DELETE_API = `${BASE_URL}/service-delete`;
export const WALLET_PAYMENT_API = `${BASE_URL}/save-payment`;
export const GET_WALLET_PAYMENT_METHOD = `${BASE_URL}/get-wallet-payment-method`;
export const GET_WALLET_STRIPE_PAYMENT_URL = `${BASE_URL}/create-wallet-stripe-payment`;
export const PAYMENT_GATEWAY_LIST = `${BASE_URL}/payment-gateway-list`;
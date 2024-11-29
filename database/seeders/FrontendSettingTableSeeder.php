<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FrontendSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonDataSection1 = '{"section_1":1,"title":"Your Instant Link to the Perfect Handyman Service","description":"Experience the Ease: Trust Our Handyman Service. From Fixes to Installs, Count on Us to Have You Covered. Your Ultimate Household Helper!","current_location":"on","enable_search":"on","enable_post_job":"on","enable_popular_services":"on","category_id":["10","11","12","13"],"enable_popular_provider":"on","provider_id":["4","16","7","13"]}';
        $jsonDataSection2 = '{"section_2":1,"title":"Our Top Categories","category_id":["9","18","22","23"]}';
        $jsonDataSection3 = '{"section_3":1,"title":"Top Rated Services","service_id":["35","66","87","85","84","39","40","79"]}';
        $jsonDataSection4 = '{"section_4":1,"title":"Featured Services","service_id":["13","27","35","44","45","53","66","68"]}';
        $jsonDataSection5 = '{"section_5":1,"title":"Elevate Your Sales and Expertise by Joining Us","email":"info@examples.com","contact_number":"+1(000)-235-7894","description":"Dedicated Provider, Delivering Exceptional Service. Proven Expertise for Quality Results and Client Satisfaction.  Elevate Your Project Together."}';
        $jsonDataSection6 = '{"section_6":1,"title":"Elevate Your Experience with Our App","description":"Discover a Range of Handyman Services and Stay Updated on the Latest Offers and Deals by Downloading Our App!"}';
        $jsonDataSection7 = '{"section_7":1,"title":"Sophisticated Solutions and Streamlined Professional Workflow","description":"Streamlined Workflow: Plan, Execute, Collaborate, Adapt. Embrace Automation, Communication, and Flexibility for Peak Productivity.","url":"https:\/\/www.youtube.com\/watch?v=KswIQq7j_54","subtitle":["Admin To Provider","Provider To Handyman","Handyman To User"],"subdescription":["The admin facilitates user bookings and coordinates with providers to ensure successful service fulfillment.","The provider arranges user bookings and then communicates with handyman to ensure successful service completion.","The handyman complete the user booking"]}';
        $jsonDataSection8 = '{"section_8":1,"title":"Your Recent Views & Beyond","description":"Dependable Handyman Service for Your Repairs, Renovations, and Maintenance. Skillful Professionals, Timely Solutions, and Guaranteed Customer Satisfaction."}';
        $jsonDataSection9 = '{"section_9":1,"title":"Our Trusted Clients","overall_rating":"on","description":"Perfection in Practice: 99.9% Satisfied Clients, Over 500 Reviews, and 5,068 Successful Services Delivered."}';
        $jsonDataFooterSection = '{"footer_setting":1,"enable_popular_category":1,"category_id":["9","26","24","22","25","16"],"enable_popular_service":1,"service_id":["11","12","13","35","66"]}';
        $jsonDataHeaderSection = '{"header_setting":1,"home":1,"service":1,"provider":1,"categories":1,"blogs":1,"bookings":1,"job_post":1,"enable_language":1,"enable_darknight_mode":1}';
        $jsonDataLoginRegisterSection = '{"login_register":1,"title":"Welcome To Our Handyman","description":"Masterful Handyman Services: Fixing, Repairing, and Enhancing Your Space with Expertise, Simplifying Life, One Project at a Time."}';
        \DB::table('frontend_settings')->delete();
        $section1Data = json_decode($jsonDataSection1, true);
        $section2Data = json_decode($jsonDataSection2, true);
        $section3Data = json_decode($jsonDataSection3, true);
        $section4Data = json_decode($jsonDataSection4, true);
        $section5Data = json_decode($jsonDataSection5, true);
        $section6Data = json_decode($jsonDataSection6, true);
        $section7Data = json_decode($jsonDataSection7, true);
        $section8Data = json_decode($jsonDataSection8, true);
        $section9Data = json_decode($jsonDataSection9, true);
        $sectionFooterData = json_decode($jsonDataFooterSection, true);
        $sectionHeaderData = json_decode($jsonDataHeaderSection, true);
        $sectionLoginRegisterData = json_decode($jsonDataLoginRegisterSection, true);
        \DB::table('frontend_settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'type' => 'landing-page-setting',
                'key' => 'section_1',
                'status' => '1',
                'value' => json_encode($section1Data),
            ),
            1 =>
            array (
                'id' => 2,
                'type' => 'landing-page-setting',
                'key' => 'section_2',
                'status' => '1',
                'value' => json_encode($section2Data),
            ),
            array (
                'id' => 3,
                'type' => 'landing-page-setting',
                'key' => 'section_3',
                'status' => '1',
                'value' => json_encode($section3Data),
            ),
            array (
                'id' => 4,
                'type' => 'landing-page-setting',
                'key' => 'section_4',
                'status' => '1',
                'value' => json_encode($section4Data),
            ),
            array (
                'id' => 5,
                'type' => 'landing-page-setting',
                'key' => 'section_5',
                'status' => '1',
                'value' => json_encode($section5Data),
            ),
            array (
                'id' => 6,
                'type' => 'landing-page-setting',
                'key' => 'section_6',
                'status' => '1',
                'value' => json_encode($section6Data),
            ),
            array (
                'id' => 7,
                'type' => 'landing-page-setting',
                'key' => 'section_7',
                'status' => '1',
                'value' => json_encode($section7Data),
            ),
            array (
                'id' => 8,
                'type' => 'footer-setting',
                'key' => 'footer-setting',
                'status' => '1',
                'value' => json_encode($sectionFooterData),
            ),
            array (
                'id' => 9,
                'type' => 'heder-menu-setting',
                'key' => 'heder-menu-setting',
                'status' => '1',
                'value' => json_encode($sectionHeaderData),
            ),
            array (
                'id' => 10,
                'type' => 'landing-page-setting',
                'key' => 'section_8',
                'status' => '1',
                'value' => json_encode($section8Data),
            ),
            array (
                'id' => 11,
                'type' => 'landing-page-setting',
                'key' => 'section_9',
                'status' => '1',
                'value' => json_encode($section9Data),
            ),
            array (
                'id' => 12,
                'type' => 'login-register-setting',
                'key' => 'login-register-setting',
                'status' => '1',
                'value' => json_encode($sectionLoginRegisterData),
            ),
        ));
    }
}

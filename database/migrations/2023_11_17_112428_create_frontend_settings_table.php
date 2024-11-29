<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FrontendSetting;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;

class CreateFrontendSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_settings', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('key')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->text('value')->nullable();
            $table->timestamps();
        });
        if (FrontendSetting::count() === 0) {
            $categoryIds = Category::pluck('id')->take(6)->map(function ($id) {
                return (string) $id;
            })->toArray();

            $serviceIds = Service::pluck('id')->take(6)->map(function ($id) {
                return (string) $id;
            })->toArray();

            $providerIds = User::where('user_type', 'provider')->pluck('id')->take(6)->map(function ($id) {
                return (string) $id;
            })->toArray();
            $settingsData = [
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_1',
                    'status' => '1',
                    'value' => '{"section_1":1,"title":"Your Instant Connection To Right Handyman Service","description":"Get things done with our reliable handyman service. From repairs to installations, weve got you covered. Your go-to solution for household tasks.","current_location":"on","enable_search":"on","enable_post_job":"on","enable_popular_services":"on","category_id":'.json_encode($categoryIds).',"enable_popular_provider":"on","provider_id":'.json_encode($providerIds).'}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_2',
                    'status' => '1',
                    'value' => '{"section_2":1,"title":"Our Popular Categories","category_id":'.json_encode($categoryIds).'}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_3',
                    'status' => '1',
                    'value' => '{"section_3":1,"title":"Top Rated Services","service_id":'.json_encode($serviceIds).'}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_4',
                    'status' => '1',
                    'value' => '{"section_4":1,"title":"Featured Services","service_id":'.json_encode($serviceIds).'}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_5',
                    'status' => '1',
                    'value' => '{"section_5":1,"title":"Join Us To Boost Your Service Sales And Elevate Your Expertise","email":"info@examples.com","contact_number":"+1(000)-235-7894","description":"Experienced provider dedicated to exceptional service. Proven expertise in delivering quality results, ensuring client satisfaction. Ready to elevate your project."}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_6',
                    'status' => '1',
                    'value' => '{"section_6":1,"title":"Enhance Experience With Our App","description":"Let’s enjoy handyman various services and get latest offer and deals by downloading apllication"}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_7',
                    'status' => '1',
                    'value' => '{"section_7":1,"title":"Advanced Solutions And Professional Workflow","description":"Efficient workflow: Plan, execute, collaborate; iterate as needed. Embrace automation, communication, and adaptability for optimal productivity.","url":"https:\/\/www.youtube.com\/watch?v=KswIQq7j_54","subtitle":["Admin To Provider","Provider To Handyman","Handyman To User"],"subdescription":["admin gives the user booking service and then contacts the provider to fulfill the user services successfully.","admin gives the user booking service and then contacts the provider to fulfill the user services successfully.","admin gives the user booking service and then contacts the provider to fulfill the user services successfully."]}',
                ],
                [
                    'type' => 'footer-setting',
                    'key' => 'footer-setting',
                    'status' => '1',
                    'value' => '{"footer_setting":1,"enable_popular_category":1,"category_id":'.json_encode($categoryIds).',"enable_popular_service":1,"service_id":'.json_encode($serviceIds).'}',
                ],
                [
                    'type' => 'heder-menu-setting',
                    'key' => 'heder-menu-setting',
                    'status' => '1',
                    'value' => '{"header_setting":1,"home":1,"service":1,"provider":1,"categories":1,"blogs":1,"bookings":1,"job_post":1,"enable_language":1,"enable_darknight_mode":1}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_8',
                    'status' => '1',
                    'value' => '{"section_8":1,"title":"Recently Viewed & More","description":"Reliable handyman service for all your repairs, renovations, and maintenance needs. Skilled professionals, timely solutions, and customer satisfaction guaranteed"}',
                ],
                [
                    'type' => 'landing-page-setting',
                    'key' => 'section_9',
                    'status' => '1',
                    'value' => '{"section_9":1,"title":"Our Trusted Clients","overall_rating":"on","description":"Experience perfection: 99.9% satisfied clients, 500+ reviews, and 5,068 completed services."}',
                ],
                [
                    'type' => 'login-register-setting',
                    'key' => 'login-register-setting',
                    'status' => '1',
                    'value' => '{"login_register":1,"title":"Welcome To Our Handyman","description":"Skilled handyman services like Fixing, repairing, and improving your space with expertise, making life easier, one project at a time."}',
                ],

            ];

            // Insert data into the frontend_settings table
            foreach ($settingsData as $data) {
                FrontendSetting::create($data);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_settings');
    }
}

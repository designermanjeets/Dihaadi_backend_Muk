<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceFaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_faqs')->delete();
        
        \DB::table('service_faqs')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-31 11:58:45',
                'description' => 'Chimney sweeping frequency depends on usage. For those using their fireplace regularly, an annual sweep is recommended to remove creosote buildup and ensure optimal safety and efficiency. However, occasional users can schedule sweeps every 2-3 years.',
                'id' => 1,
                'service_id' => 22,
                'status' => 1,
                'title' => 'How often should I get my chimney swept?',
                'updated_at' => '2024-01-31 11:58:45',
            ),
            1 => 
            array (
                'created_at' => '2024-01-31 12:00:52',
                'description' => 'Our chimney sweeping process is designed to minimize mess. We use advanced equipment and take precautions to contain soot and debris. However, some minimal dust may occur. Rest assured, our team is committed to leaving your space as clean as possible post-service.',
                'id' => 2,
                'service_id' => 22,
                'status' => 1,
                'title' => 'Is chimney sweeping a messy process?',
                'updated_at' => '2024-01-31 12:00:52',
            ),
            2 => 
            array (
                'created_at' => '2024-01-31 12:11:38',
                'description' => 'For optimal performance, replace your AC filter every 1 to 3 months. However, factors like usage and filter type may impact the frequency. Regular checks ensure a healthier and more efficient system.',
                'id' => 3,
                'service_id' => 110,
                'status' => 1,
                'title' => 'How often should I replace my AC filter?',
                'updated_at' => '2024-01-31 12:11:38',
            ),
            3 => 
            array (
                'created_at' => '2024-01-31 12:11:58',
                'description' => 'Cleaning is possible for some filters, but not all. Disposable filters usually need replacement, while washable ones can be cleaned. Refer to your AC manual or consult a professional to determine the best approach for your specific filter.',
                'id' => 4,
                'service_id' => 110,
                'status' => 1,
                'title' => 'Can I clean my AC filter instead of replacing it?',
                'updated_at' => '2024-01-31 12:11:58',
            ),
            4 => 
            array (
                'created_at' => '2024-01-31 12:13:23',
                'description' => 'Typically, a Full Home Sanitization takes 2-4 hours, depending on the size of your home. Our efficient team ensures a thorough and timely process.',
                'id' => 5,
                'service_id' => 109,
                'status' => 1,
                'title' => 'How long does a Full Home Sanitization service take?',
                'updated_at' => '2024-01-31 12:13:23',
            ),
            5 => 
            array (
                'created_at' => '2024-01-31 12:13:38',
                'description' => 'For optimal results, we recommend scheduling Full Home Sanitization every 3-6 months. However, consider more frequent sessions in high-traffic areas or during flu seasons for added protection.',
                'id' => 6,
                'service_id' => 109,
                'status' => 1,
                'title' => 'How often should I schedule a Full Home Sanitization?',
                'updated_at' => '2024-01-31 12:13:53',
            ),
            6 => 
            array (
                'created_at' => '2024-01-31 12:15:03',
                'description' => 'Fixture installation times vary based on complexity, but our skilled handymen strive to complete most installations within a few hours. We prioritize efficiency without compromising quality.',
                'id' => 7,
                'service_id' => 108,
                'status' => 1,
                'title' => 'How long does it typically take to install a fixture?',
                'updated_at' => '2024-01-31 12:15:03',
            ),
            7 => 
            array (
                'created_at' => '2024-01-31 12:15:15',
                'description' => 'You have the flexibility to choose! Our handymen can either bring fixtures based on your preferences and budget, or they can install fixtures you\'ve purchased. Just let us know your preference when booking the service.',
                'id' => 8,
                'service_id' => 108,
                'status' => 1,
                'title' => 'Do I need to provide the fixtures, or will the handyman bring them?',
                'updated_at' => '2024-01-31 12:15:15',
            ),
            8 => 
            array (
                'created_at' => '2024-01-31 12:15:57',
                'description' => 'The frequency depends on your office size and daily activities. For a standard office, weekly or bi-weekly cleaning is recommended to maintain a clean and healthy workspace.',
                'id' => 9,
                'service_id' => 107,
                'status' => 1,
                'title' => 'How often should I schedule Office Cleaning services?',
                'updated_at' => '2024-01-31 12:15:57',
            ),
            9 => 
            array (
                'created_at' => '2024-01-31 12:16:13',
                'description' => 'We use eco-friendly and industry-standard cleaning products that are effective yet safe for your office environment. If you have specific preferences or concerns, feel free to discuss them with our team during the booking process.',
                'id' => 10,
                'service_id' => 107,
                'status' => 1,
                'title' => 'What cleaning products do you use for Office Cleaning?',
                'updated_at' => '2024-01-31 12:16:13',
            ),
            10 => 
            array (
                'created_at' => '2024-01-31 12:17:02',
                'description' => 'Absolutely! Our professionals will discuss the best wiring options based on your needs and preferences. We offer a range of materials, and your choice will be tailored to meet safety standards and your specific requirements.',
                'id' => 11,
                'service_id' => 106,
                'status' => 1,
                'title' => 'Can I choose the type of wiring to be used in my Electrical Installation?',
                'updated_at' => '2024-01-31 12:17:02',
            ),
            11 => 
            array (
                'created_at' => '2024-01-31 12:17:17',
                'description' => 'Safety is our top priority. Our electricians follow strict protocols, use quality materials, and adhere to all safety standards. We conduct thorough inspections to guarantee a secure and reliable wiring installation for your peace of mind.',
                'id' => 12,
                'service_id' => 106,
                'status' => 1,
                'title' => 'What safety measures are in place during Electrical Wiring Installation?',
                'updated_at' => '2024-01-31 12:17:17',
            ),
            12 => 
            array (
                'created_at' => '2024-01-31 12:18:23',
                'description' => 'Absolutely! We understand the importance of dietary preferences and allergies. Simply inform us of any specific requirements, and our skilled bakers will ensure your "Custom Cake Creation" meets your needs while maintaining its deliciousness.',
                'id' => 13,
                'service_id' => 105,
                'status' => 1,
                'title' => 'Can you accommodate special dietary restrictions or allergies in custom cakes?',
                'updated_at' => '2024-01-31 12:18:23',
            ),
            13 => 
            array (
                'created_at' => '2024-01-31 12:18:59',
                'description' => 'To ensure the best results, we recommend placing your order at least 3 days in advance. This allows our talented bakers enough time to create a personalized masterpiece for your special occasion.',
                'id' => 14,
                'service_id' => 105,
                'status' => 1,
                'title' => 'How far in advance should I place my order for a custom cake?',
                'updated_at' => '2024-01-31 12:18:59',
            ),
            14 => 
            array (
                'created_at' => '2024-01-31 12:23:20',
                'description' => 'Absolutely! Whether it\'s a small tear or a more extensive seam issue, our skilled handymen are equipped to handle repairs of all sizes.',
                'id' => 15,
                'service_id' => 104,
                'status' => 1,
                'title' => 'Is this service suitable for large or small repairs?',
                'updated_at' => '2024-01-31 12:23:20',
            ),
            15 => 
            array (
                'created_at' => '2024-01-31 12:23:38',
                'description' => 'Our service is versatile and suitable for various materials, including fabric, leather, and more. It\'s an effective solution for a wide range of items.',
                'id' => 16,
                'service_id' => 104,
                'status' => 1,
                'title' => 'What types of materials can be treated with this service?',
                'updated_at' => '2024-01-31 12:23:38',
            ),
            16 => 
            array (
                'created_at' => '2024-01-31 12:41:34',
                'description' => 'Yes, our service is designed to work with a wide range of Smart TVs, ensuring compatibility with major brands to enhance your entertainment system effortlessly.',
                'id' => 17,
                'service_id' => 103,
                'status' => 1,
                'title' => 'Is Smart TV Integration compatible with all TV brands?',
                'updated_at' => '2024-01-31 12:41:34',
            ),
            17 => 
            array (
                'created_at' => '2024-01-31 12:41:53',
                'description' => 'Absolutely! We can integrate your Smart TV with various devices like gaming consoles, streaming devices, and sound systems for a fully immersive experience.',
                'id' => 18,
                'service_id' => 103,
                'status' => 1,
                'title' => 'Can you integrate multiple devices with my Smart TV?',
                'updated_at' => '2024-01-31 12:41:53',
            ),
            18 => 
            array (
                'created_at' => '2024-01-31 12:42:43',
                'description' => 'It depends on your skin type, but generally, once every 2-4 weeks is recommended for optimal results.',
                'id' => 19,
                'service_id' => 102,
                'status' => 1,
                'title' => 'How often should I schedule Exfoliation and Peels?',
                'updated_at' => '2024-01-31 12:42:43',
            ),
            19 => 
            array (
                'created_at' => '2024-01-31 12:42:58',
                'description' => 'Yes, but it\'s advisable to consult with our skincare expert to ensure compatibility and avoid over-exfoliation.',
                'id' => 20,
                'service_id' => 102,
                'status' => 1,
                'title' => 'Can I combine Exfoliation and Peels with other skincare treatments?',
                'updated_at' => '2024-01-31 12:42:58',
            ),
            20 => 
            array (
                'created_at' => '2024-01-31 12:43:41',
                'description' => 'Minimal downtime; expect some redness or peeling, but it varies based on the peel intensity chosen.',
                'id' => 21,
                'service_id' => 102,
                'status' => 1,
                'title' => 'Is there any downtime after an Exfoliation and Peels session?',
                'updated_at' => '2024-01-31 12:43:41',
            ),
            21 => 
            array (
                'created_at' => '2024-01-31 12:44:32',
                'description' => 'We prioritize emergencies! Expect swift response times, and we\'ll dispatch a skilled plumber ASAP to fix the leak promptly.',
                'id' => 22,
                'service_id' => 101,
                'status' => 1,
                'title' => 'How quickly can you respond to a leak repair request?',
                'updated_at' => '2024-01-31 12:44:32',
            ),
            22 => 
            array (
                'created_at' => '2024-01-31 12:44:52',
                'description' => 'We cover all leaks – from minor pipe leaks to major plumbing issues. Our team is equipped to handle a variety of leak repairs efficiently.',
                'id' => 23,
                'service_id' => 101,
                'status' => 1,
                'title' => 'What types of leaks do you handle?',
                'updated_at' => '2024-01-31 12:44:52',
            ),
            23 => 
            array (
                'created_at' => '2024-01-31 12:45:22',
                'description' => 'Yes, our service includes cleanup to ensure your space is left as good as new after the leak is repaired.',
                'id' => 24,
                'service_id' => 101,
                'status' => 1,
                'title' => 'Will you help with post-repair cleanup?',
                'updated_at' => '2024-01-31 12:45:22',
            ),
            24 => 
            array (
                'created_at' => '2024-01-31 12:56:35',
                'description' => 'Yes, Discuss your preferences with our Artistic Frame Designer during the service. They\'ll guide you through material options and design styles for a personalized touch.',
                'id' => 25,
                'service_id' => 100,
                'status' => 1,
                'title' => 'Can I choose the materials and style for my custom frame?',
                'updated_at' => '2024-01-31 12:56:35',
            ),
            25 => 
            array (
                'created_at' => '2024-01-31 12:56:55',
                'description' => 'The turnaround time may vary, but our artists work efficiently to complete most projects within a few days. You\'ll be enjoying your beautifully framed artwork in no time!',
                'id' => 26,
                'service_id' => 100,
                'status' => 1,
                'title' => 'What is the typical turnaround time for Artistic Frame Design services?',
                'updated_at' => '2024-01-31 12:56:55',
            ),
            26 => 
            array (
                'created_at' => '2024-01-31 12:57:39',
                'description' => 'It\'s risky. For safety and precision, it\'s best to rely on a professional for Circuit Repairs.',
                'id' => 27,
                'service_id' => 99,
                'status' => 1,
                'title' => 'Can I attempt DIY Circuit Repairs?',
                'updated_at' => '2024-01-31 12:57:39',
            ),
            27 => 
            array (
                'created_at' => '2024-01-31 12:57:58',
                'description' => 'Overloaded circuits, faulty wiring, or outdated components can lead to circuit malfunctions.',
                'id' => 28,
                'service_id' => 99,
                'status' => 1,
                'title' => 'What causes circuits to malfunction?',
                'updated_at' => '2024-01-31 12:57:58',
            ),
            28 => 
            array (
                'created_at' => '2024-01-31 13:00:00',
                'description' => 'Typically, cameras, DVR/NVR, cables. We\'ll assess your needs during the service booking process.',
                'id' => 29,
                'service_id' => 98,
                'status' => 1,
                'title' => 'What equipment is needed for Security Camera Setup?',
                'updated_at' => '2024-01-31 13:00:00',
            ),
            29 => 
            array (
                'created_at' => '2024-01-31 13:00:18',
                'description' => 'Yes, we can integrate existing cameras if compatible. Let us know during the booking for a seamless setup.',
                'id' => 30,
                'service_id' => 98,
                'status' => 1,
                'title' => 'Can existing cameras be integrated into a new Security Camera Setup?',
                'updated_at' => '2024-01-31 13:00:18',
            ),
            30 => 
            array (
                'created_at' => '2024-01-31 13:03:27',
                'description' => 'Our technicians diagnose the issue, repair or replace faulty components, and ensure your AC compressor functions efficiently, restoring cool air circulation.',
                'id' => 31,
                'service_id' => 97,
                'status' => 1,
                'title' => 'What does fixing the AC compressor involve?',
                'updated_at' => '2024-01-31 13:03:27',
            ),
            31 => 
            array (
                'created_at' => '2024-01-31 13:03:47',
                'description' => 'The duration varies based on the issue\'s complexity, but our skilled technicians work swiftly to minimize downtime, typically completing the job in a few hours.',
                'id' => 32,
                'service_id' => 97,
                'status' => 1,
                'title' => 'How long does it take to fix an AC compressor?',
                'updated_at' => '2024-01-31 13:03:47',
            ),
            32 => 
            array (
                'created_at' => '2024-01-31 13:05:14',
                'description' => 'It includes nail shaping, cuticle care, polish application, and a relaxing massage for hands and feet.',
                'id' => 33,
                'service_id' => 96,
                'status' => 1,
                'title' => 'What\'s included in the Manicure & Pedicure service?',
                'updated_at' => '2024-01-31 13:05:14',
            ),
            33 => 
            array (
                'created_at' => '2024-01-31 13:05:37',
                'description' => 'For optimal nail health and a polished look, we recommend scheduling every 2-3 weeks.',
                'id' => 34,
                'service_id' => 96,
                'status' => 1,
                'title' => 'How often should I schedule a Manicure & Pedicure?',
                'updated_at' => '2024-01-31 13:05:37',
            ),
            34 => 
            array (
                'created_at' => '2024-01-31 13:06:14',
                'description' => 'Yes, our process is gentle and designed to be safe for all types of car interiors.',
                'id' => 35,
                'service_id' => 95,
                'status' => 1,
                'title' => 'Is the sanitization process safe for my car\'s upholstery?',
                'updated_at' => '2024-01-31 13:06:14',
            ),
            35 => 
            array (
                'created_at' => '2024-01-31 13:06:33',
                'description' => 'We use industry-approved, eco-friendly sanitization solutions to ensure a clean and healthy interior environment for your car.',
                'id' => 36,
                'service_id' => 95,
                'status' => 1,
                'title' => 'What products do you use for Car Interior Sanitization?',
                'updated_at' => '2024-01-31 13:06:33',
            ),
            36 => 
            array (
                'created_at' => '2024-01-31 13:08:59',
                'description' => 'We use high-quality, salon-grade products tailored to your hair type, ensuring a professional finish and lasting style.',
                'id' => 37,
                'service_id' => 94,
                'status' => 1,
                'title' => 'What products do you use for haircut and styling services?',
                'updated_at' => '2024-01-31 13:08:59',
            ),
            37 => 
            array (
                'created_at' => '2024-01-31 13:09:13',
                'description' => 'On average, it takes about 45 minutes to an hour, but the duration may vary based on the complexity of the style and your specific requirements.',
                'id' => 38,
                'service_id' => 94,
                'status' => 1,
                'title' => 'How long does a typical haircut and styling session take?',
                'updated_at' => '2024-01-31 13:09:13',
            ),
            38 => 
            array (
                'created_at' => '2024-01-31 13:09:58',
                'description' => 'Clogged air filters, blocked vents, or issues with the blower fan can restrict airflow, impacting your AC\'s efficiency.',
                'id' => 39,
                'service_id' => 93,
                'status' => 1,
                'title' => 'What causes poor AC airflow?',
                'updated_at' => '2024-01-31 13:09:58',
            ),
            39 => 
            array (
                'created_at' => '2024-01-31 13:10:12',
                'description' => 'You can clean or replace air filters regularly, clear debris around vents, and ensure furniture isn\'t blocking airflow. For complex issues, it\'s best to consult a professional.',
                'id' => 40,
                'service_id' => 93,
                'status' => 1,
                'title' => 'Can I fix AC airflow problems on my own?',
                'updated_at' => '2024-01-31 13:10:12',
            ),
            40 => 
            array (
                'created_at' => '2024-01-31 13:10:36',
                'description' => 'Check for weak or uneven cooling, reduced airflow, or unusually high utility bills – these are signs your AC may have an airflow issue.',
                'id' => 41,
                'service_id' => 93,
                'status' => 1,
                'title' => 'How can I identify if my AC has an airflow problem?',
                'updated_at' => '2024-01-31 13:10:36',
            ),
            41 => 
            array (
                'created_at' => '2024-01-31 13:11:56',
                'description' => 'Yes, our service caters to various leather and suede materials, ensuring a thorough and safe cleaning process for each.',
                'id' => 42,
                'service_id' => 92,
                'status' => 1,
                'title' => 'Can you clean different types of leather and suede materials?',
                'updated_at' => '2024-01-31 13:11:56',
            ),
            42 => 
            array (
                'created_at' => '2024-01-31 13:12:15',
                'description' => 'Absolutely, our skilled professionals use gentle yet effective methods to clean delicate leather and suede without compromising their integrity.',
                'id' => 43,
                'service_id' => 92,
                'status' => 1,
                'title' => 'Is it safe to clean delicate leather or suede items?',
                'updated_at' => '2024-01-31 13:12:15',
            ),
            43 => 
            array (
                'created_at' => '2024-01-31 13:13:25',
                'description' => 'Yes, our skilled painters can adapt the technique to various surfaces, including textured walls. We assess the surface during the initial consultation to ensure the best possible results for your custom stenciling project.',
                'id' => 44,
                'service_id' => 91,
                'status' => 1,
                'title' => 'Is custom stenciling suitable for all surfaces, including textured walls?',
                'updated_at' => '2024-01-31 13:13:25',
            ),
            44 => 
            array (
                'created_at' => '2024-01-31 13:13:43',
                'description' => 'Custom stenciling is a personalized painting technique that adds unique patterns or designs to your walls, furniture, or floors, providing a distinctive and stylish touch to your living space.',
                'id' => 45,
                'service_id' => 91,
                'status' => 1,
                'title' => 'What is custom stenciling, and how can it enhance my home?',
                'updated_at' => '2024-01-31 13:13:43',
            ),
            45 => 
            array (
                'created_at' => '2024-01-31 13:20:56',
                'description' => 'Trained security guards patrol and monitor your commercial space to deter potential threats, respond to incidents, and ensure a secure environment.',
                'id' => 46,
                'service_id' => 90,
                'status' => 1,
                'title' => 'How does commercial building security by a security guard work?',
                'updated_at' => '2024-01-31 13:20:56',
            ),
            46 => 
            array (
                'created_at' => '2024-01-31 13:21:22',
                'description' => 'Our security guards are licensed, undergo rigorous training, and have a background in security protocols, ensuring a highly qualified and professional team.',
                'id' => 47,
                'service_id' => 90,
                'status' => 1,
                'title' => 'What qualifications do your security guards possess?',
                'updated_at' => '2024-01-31 13:21:22',
            ),
            47 => 
            array (
                'created_at' => '2024-01-31 13:21:58',
                'description' => 'We use EPA-approved disinfectants that are effective against a broad spectrum of pathogens, ensuring thorough sanitization without harm to your outdoor surfaces.',
                'id' => 48,
                'service_id' => 89,
                'status' => 1,
                'title' => 'What products do you use for outdoor area sanitization?',
                'updated_at' => '2024-01-31 13:21:58',
            ),
            48 => 
            array (
                'created_at' => '2024-01-31 13:22:15',
                'description' => 'Yes, our sanitization process is pet and plant-friendly. We use eco-friendly solutions to ensure a safe and healthy environment for your outdoor space.',
                'id' => 49,
                'service_id' => 89,
                'status' => 1,
                'title' => 'Is outdoor area sanitization safe for plants and pets?',
                'updated_at' => '2024-01-31 13:22:15',
            ),
            49 => 
            array (
                'created_at' => '2024-01-31 13:22:55',
                'description' => 'We offer a variety of styles, from elegant updos to glamorous curls—choose the one that complements your special occasion.',
                'id' => 50,
                'service_id' => 88,
                'status' => 1,
                'title' => 'What hairstyles are included in the service?',
                'updated_at' => '2024-01-31 13:22:55',
            ),
            50 => 
            array (
                'created_at' => '2024-01-31 13:23:17',
                'description' => 'Ensure clean, dry hair for the best results. Feel free to share any style preferences with your stylist during the appointment for a personalized experience.',
                'id' => 51,
                'service_id' => 88,
                'status' => 1,
                'title' => 'What should I do to prepare for my \'Special Occasion Hair Styling\'?',
                'updated_at' => '2024-01-31 13:23:17',
            ),
            51 => 
            array (
                'created_at' => '2024-01-31 13:24:12',
                'description' => 'Recommended annually to prevent blockages and maintain optimal sewer system performance.',
                'id' => 52,
                'service_id' => 87,
                'status' => 1,
                'title' => 'How often should I schedule sewer line cleaning?',
                'updated_at' => '2024-01-31 13:24:12',
            ),
            52 => 
            array (
                'created_at' => '2024-01-31 13:24:24',
                'description' => 'Dispose of grease properly, avoid flushing non-degradable items, and consider root treatments for nearby trees.',
                'id' => 53,
                'service_id' => 87,
                'status' => 1,
                'title' => 'Are there preventive measures to avoid sewer line issues?',
                'updated_at' => '2024-01-31 13:24:24',
            ),
            53 => 
            array (
                'created_at' => '2024-01-31 13:26:03',
                'description' => 'Done correctly, Pruning enhances plant growth and health, promoting better flowering and fruiting.',
                'id' => 54,
                'service_id' => 86,
                'status' => 1,
                'title' => 'Will Pruning harm my plants?',
                'updated_at' => '2024-01-31 13:26:03',
            ),
            54 => 
            array (
                'created_at' => '2024-01-31 13:26:19',
                'description' => 'Typically during the dormant season, but specifics vary by plant type – we\'ll advise based on your garden\'s needs.',
                'id' => 55,
                'service_id' => 86,
                'status' => 1,
                'title' => 'What\'s the best time of year for Pruning and Trimming?',
                'updated_at' => '2024-01-31 13:26:19',
            ),
            55 => 
            array (
                'created_at' => '2024-01-31 13:27:14',
                'description' => 'Fault Diagnosis covers a wide range of issues, including power fluctuations, circuit failures, and unexpected outages, providing a comprehensive solution to various electrical concerns.',
                'id' => 56,
                'service_id' => 85,
                'status' => 1,
                'title' => 'What types of electrical problems can be addressed through Fault Diagnosis?',
                'updated_at' => '2024-01-31 13:27:14',
            ),
            56 => 
            array (
                'created_at' => '2024-01-31 13:27:28',
                'description' => 'Yes, Fault Diagnosis is crucial for both minor and major issues. It ensures a precise understanding of the problem, preventing potential hazards and promoting the longevity of your electrical system.',
                'id' => 57,
                'service_id' => 85,
                'status' => 1,
                'title' => 'Is Fault Diagnosis essential even for minor electrical issues?',
                'updated_at' => '2024-01-31 13:27:28',
            ),
            57 => 
            array (
                'created_at' => '2024-01-31 13:28:13',
            'description' => 'We need accurate birth details (date, time, and place) for both individuals to create personalized compatibility insights.',
                'id' => 58,
                'service_id' => 84,
                'status' => 1,
                'title' => 'What information is required for the consultation?',
                'updated_at' => '2024-01-31 13:28:13',
            ),
            58 => 
            array (
                'created_at' => '2024-01-31 13:28:42',
                'description' => 'Yes, your privacy is our priority. All information shared during the Relationship Compatibility Reading is strictly confidential.',
                'id' => 59,
                'service_id' => 84,
                'status' => 1,
                'title' => 'Is the information shared during the consultation confidential?',
                'updated_at' => '2024-01-31 13:28:42',
            ),
            59 => 
            array (
                'created_at' => '2024-01-31 13:29:57',
                'description' => 'We employ safe and targeted pest control techniques, including eco-friendly repellents and preventative measures tailored to your drainage system.',
                'id' => 60,
                'service_id' => 83,
                'status' => 1,
                'title' => 'What methods do you use for drainage system pest management?',
                'updated_at' => '2024-01-31 13:29:57',
            ),
            60 => 
            array (
                'created_at' => '2024-01-31 13:30:22',
                'description' => 'Look for unusual odors, slow drainage, or insect activity around drains, as these can indicate potential pest issues.',
                'id' => 61,
                'service_id' => 83,
                'status' => 1,
                'title' => 'Are there specific signs of pest infestations in drainage systems?',
                'updated_at' => '2024-01-31 13:30:22',
            ),
            61 => 
            array (
                'created_at' => '2024-01-31 13:31:05',
                'description' => 'Our photographers utilize professional-grade equipment, ensuring high-quality images that capture the essence of your corporate event.',
                'id' => 62,
                'service_id' => 82,
                'status' => 1,
                'title' => 'What equipment do your photographers use?',
                'updated_at' => '2024-01-31 13:31:05',
            ),
            62 => 
            array (
                'created_at' => '2024-01-31 13:31:48',
                'description' => 'Our service covers comprehensive event coverage, capturing key moments, group shots, and candid interactions to tell the unique story of your corporate event.',
                'id' => 63,
                'service_id' => 82,
                'status' => 1,
                'title' => 'What does the Corporate Event Photography service include?',
                'updated_at' => '2024-01-31 13:31:48',
            ),
            63 => 
            array (
                'created_at' => '2024-01-31 13:32:45',
                'description' => 'Consider the room decor and style. We\'ll guide you on frame options that enhance your painting\'s beauty.',
                'id' => 64,
                'service_id' => 81,
                'status' => 1,
                'title' => 'How do I choose the right frames for my Multi Frame Set Painting?',
                'updated_at' => '2024-01-31 13:32:45',
            ),
            64 => 
            array (
                'created_at' => '2024-01-31 13:33:03',
                'description' => 'Certainly! We specialize in handling collections of all sizes, providing a cohesive and stunning display."',
                'id' => 65,
                'service_id' => 81,
                'status' => 1,
                'title' => 'Is the Multi Frame Set Painting service available for large art collections?',
                'updated_at' => '2024-01-31 13:33:03',
            ),
            65 => 
            array (
                'created_at' => '2024-01-31 13:35:07',
                'description' => 'We follow industry-best practices, ensuring delicate handling and using gentle cleaning methods to preserve the quality of your formal attire.',
                'id' => 66,
                'service_id' => 80,
                'status' => 1,
                'title' => 'What precautions are taken during the cleaning process?',
                'updated_at' => '2024-01-31 13:35:07',
            ),
            66 => 
            array (
                'created_at' => '2024-01-31 13:36:02',
                'description' => 'Yes, our skilled professionals tailor the cleaning approach based on the fabric type to ensure optimal results without compromising the material.',
                'id' => 67,
                'service_id' => 80,
                'status' => 1,
                'title' => 'Is there a specific care process for different fabrics?',
                'updated_at' => '2024-01-31 13:36:02',
            ),
            67 => 
            array (
                'created_at' => '2024-01-31 13:37:07',
                'description' => 'Our artists can paint on various materials, including wood, metal, and plastic frames. Share your preferences during the booking process.',
                'id' => 68,
                'service_id' => 79,
                'status' => 1,
                'title' => 'What types of frames can be painted?',
                'updated_at' => '2024-01-31 13:37:07',
            ),
            68 => 
            array (
                'created_at' => '2024-01-31 13:37:44',
                'description' => 'The artist will provide you with care instructions upon completion. Generally, gentle dusting is recommended to maintain the vibrancy and longevity of your custom-painted frame.',
                'id' => 69,
                'service_id' => 79,
                'status' => 1,
                'title' => 'Are there any special care instructions for the painted frames?',
                'updated_at' => '2024-01-31 13:37:44',
            ),
            69 => 
            array (
                'created_at' => '2024-01-31 13:38:32',
                'description' => 'We use high-quality, non-toxic nail polishes, embellishments, and accessories to create stunning Nail Art designs.',
                'id' => 70,
                'service_id' => 78,
                'status' => 1,
                'title' => 'What materials are used in Nail Art?',
                'updated_at' => '2024-01-31 13:38:32',
            ),
            70 => 
            array (
                'created_at' => '2024-01-31 13:39:29',
                'description' => 'It\'s best to have clean and trimmed nails. We\'ll take care of the rest!',
                'id' => 71,
                'service_id' => 78,
                'status' => 1,
                'title' => 'Is there any special preparation needed before the Nail Art service?',
                'updated_at' => '2024-01-31 13:39:29',
            ),
            71 => 
            array (
                'created_at' => '2024-01-31 13:40:19',
                'description' => 'Most surfaces work well, including plaster, drywall, wood, and concrete. Ensure the surface is clean and primed for optimal results.',
                'id' => 72,
                'service_id' => 77,
                'status' => 1,
                'title' => 'What types of surfaces are suitable for murals and wall art?',
                'updated_at' => '2024-01-31 13:40:19',
            ),
            72 => 
            array (
                'created_at' => '2024-01-31 13:40:36',
                'description' => 'To ensure longevity, avoid harsh cleaning agents. Regular dusting and gentle cleaning with a damp cloth should suffice for maintenance.',
                'id' => 73,
                'service_id' => 77,
                'status' => 1,
                'title' => 'How do I care for and maintain the mural or wall art over time?',
                'updated_at' => '2024-01-31 13:40:36',
            ),
            73 => 
            array (
                'created_at' => '2024-01-31 13:42:21',
                'description' => 'Not necessarily. We offer specialized care, including hand washing and low-temperature machine washing, based on garment specifications.',
                'id' => 74,
                'service_id' => 76,
                'status' => 1,
                'title' => 'Is dry cleaning the only option for silk and designer garments?',
                'updated_at' => '2024-01-31 13:42:21',
            ),
            74 => 
            array (
                'created_at' => '2024-01-31 13:42:39',
                'description' => 'We use industry-leading detergents and follow strict color separation practices to maintain garment integrity.',
                'id' => 75,
                'service_id' => 76,
                'status' => 1,
                'title' => 'What precautions are taken to prevent color bleeding or fading?',
                'updated_at' => '2024-01-31 13:42:39',
            ),
            75 => 
            array (
                'created_at' => '2024-02-01 04:47:35',
                'description' => 'We\'ll clean surfaces, scrape loose paint, and apply primer for a smooth, durable finish.',
                'id' => 76,
                'service_id' => 75,
                'status' => 1,
                'title' => 'What preparations are needed before starting the exterior painting project?',
                'updated_at' => '2024-02-01 04:47:35',
            ),
            76 => 
            array (
                'created_at' => '2024-02-01 04:48:18',
                'description' => 'We monitor weather forecasts closely and reschedule if necessary to ensure optimal painting conditions.',
                'id' => 77,
                'service_id' => 75,
                'status' => 1,
                'title' => 'How do you handle inclement weather affecting the painting schedule?',
                'updated_at' => '2024-02-01 04:48:18',
            ),
            77 => 
            array (
                'created_at' => '2024-02-01 04:49:07',
                'description' => 'We use advanced techniques and quality detergents, along with expert handling, to minimize any risk of damage to delicate garments.',
                'id' => 78,
                'service_id' => 74,
                'status' => 1,
                'title' => 'What precautions are taken to prevent damage?',
                'updated_at' => '2024-02-01 04:49:07',
            ),
            78 => 
            array (
                'created_at' => '2024-02-01 04:49:35',
                'description' => 'Certainly! Our stain removal expertise extends to delicate garments, ensuring they return to you spotless and fresh.',
                'id' => 79,
                'service_id' => 74,
                'status' => 1,
                'title' => 'Do you offer stain removal for delicate clothes?',
                'updated_at' => '2024-02-01 04:49:35',
            ),
            79 => 
            array (
                'created_at' => '2024-02-01 04:50:38',
                'description' => 'Standard packages cover essential moments, including ceremony, reception, and edited high-resolution images.',
                'id' => 80,
                'service_id' => 73,
                'status' => 1,
                'title' => 'What is included in the standard Wedding Photography package?',
                'updated_at' => '2024-02-01 04:50:38',
            ),
            80 => 
            array (
                'created_at' => '2024-02-01 04:51:01',
                'description' => 'Yes, we do! Enhance your experience with add-ons like drone shots and interactive photo-booths.',
                'id' => 81,
                'service_id' => 73,
                'status' => 1,
                'title' => 'Do you offer additional services like drone footage or photobooths?',
                'updated_at' => '2024-02-01 04:51:01',
            ),
            81 => 
            array (
                'created_at' => '2024-02-01 04:51:39',
                'description' => 'We focus on high-touch surfaces, dining areas, kitchens, and restrooms.',
                'id' => 82,
                'service_id' => 72,
                'status' => 1,
                'title' => 'What areas are covered during the sanitization process?',
                'updated_at' => '2024-02-01 04:51:39',
            ),
            82 => 
            array (
                'created_at' => '2024-02-01 04:51:54',
                'description' => 'Yes, our methods are safe and compliant with food industry standards.',
                'id' => 83,
                'service_id' => 72,
                'status' => 1,
                'title' => 'Is the sanitization process safe for food preparation areas?',
                'updated_at' => '2024-02-01 04:51:54',
            ),
            83 => 
            array (
                'created_at' => '2024-02-01 04:52:10',
                'description' => 'Yes, we prioritize environmentally friendly products for a sustainable approach.',
                'id' => 84,
                'service_id' => 72,
                'status' => 1,
                'title' => 'Are the sanitization products used eco-friendly?',
                'updated_at' => '2024-02-01 04:52:10',
            ),
            84 => 
            array (
                'created_at' => '2024-02-01 04:53:30',
                'description' => 'Yes, our installations seamlessly integrate with popular smart home platforms, offering you centralized control.',
                'id' => 85,
                'service_id' => 71,
                'status' => 1,
                'title' => 'Are the Alarm Systems compatible with smart home platforms like Alexa or Google Home?',
                'updated_at' => '2024-02-01 04:53:30',
            ),
            85 => 
            array (
                'created_at' => '2024-02-01 04:53:47',
                'description' => 'Absolutely, our systems come with battery backup to ensure uninterrupted protection during power outages.',
                'id' => 86,
                'service_id' => 71,
                'status' => 1,
                'title' => 'What happens if there\'s a power outage? Is the Alarm System still functional?',
                'updated_at' => '2024-02-01 04:53:47',
            ),
            86 => 
            array (
                'created_at' => '2024-02-01 04:55:09',
                'description' => 'Yes, we offer convenient pick-up and delivery options to ensure a seamless experience for our customers.',
                'id' => 87,
                'service_id' => 70,
                'status' => 1,
                'title' => 'Do you provide pick-up and delivery services for clothing alterations?',
                'updated_at' => '2024-02-01 04:55:09',
            ),
            87 => 
            array (
                'created_at' => '2024-02-01 04:55:22',
                'description' => 'We work with a wide range of fabrics to accommodate different contemporary styles, ensuring precision and quality in every alteration.',
                'id' => 88,
                'service_id' => 70,
                'status' => 1,
                'title' => 'What materials do you work with for contemporary clothing alterations?',
                'updated_at' => '2024-02-01 04:55:22',
            ),
            88 => 
            array (
                'created_at' => '2024-02-01 04:55:38',
                'description' => 'We take pride in our craftsmanship. If there are any issues post-service, we\'ll address them promptly to ensure your satisfaction.',
                'id' => 89,
                'service_id' => 70,
                'status' => 1,
                'title' => 'Is there a guarantee on your contemporary clothing alterations?',
                'updated_at' => '2024-02-01 04:55:38',
            ),
            89 => 
            array (
                'created_at' => '2024-02-01 04:57:39',
                'description' => 'Smart locks are versatile and compatible with most standard doors, but our experts assess your specific door during the installation appointment to ensure compatibility.',
                'id' => 90,
                'service_id' => 69,
                'status' => 1,
                'title' => 'Are smart locks compatible with all types of doors?',
                'updated_at' => '2024-02-01 04:57:39',
            ),
            90 => 
            array (
                'created_at' => '2024-02-01 04:58:05',
                'description' => 'Most smart locks come with user-friendly mobile apps, allowing you to easily grant and revoke access to family and guests, providing a secure and convenient solution.',
                'id' => 91,
                'service_id' => 69,
                'status' => 1,
                'title' => 'How do I manage access to my smart lock for family members or guests?',
                'updated_at' => '2024-02-01 04:58:05',
            ),
            91 => 
            array (
                'created_at' => '2024-02-01 04:59:01',
                'description' => 'Our security team is well-equipped and trained to handle emergencies promptly, ensuring a swift and effective response.',
                'id' => 92,
                'service_id' => 68,
                'status' => 1,
                'title' => 'What measures are in place to handle emergency situations?',
                'updated_at' => '2024-02-01 04:59:01',
            ),
            92 => 
            array (
                'created_at' => '2024-02-01 04:59:52',
                'description' => 'Indeed, our services are competitively priced, offering an effective and affordable solution for residential security needs.',
                'id' => 93,
                'service_id' => 68,
                'status' => 1,
                'title' => 'Is the Residential Security Patrol service cost-effective for homeowners?',
                'updated_at' => '2024-02-01 04:59:52',
            ),
            93 => 
            array (
                'created_at' => '2024-02-01 05:00:43',
                'description' => 'We use hospital-grade disinfectants proven effective against viruses and bacteria, ensuring a thorough and safe office environment.',
                'id' => 94,
                'service_id' => 67,
                'status' => 1,
                'title' => 'What sanitization products do you use?',
                'updated_at' => '2024-02-01 05:00:43',
            ),
            94 => 
            array (
                'created_at' => '2024-02-01 05:01:10',
                'description' => 'Absolutely, our scheduling is flexible. We can perform Office Sanitization after working hours to minimize any disruption to your daily operations.',
                'id' => 95,
                'service_id' => 67,
                'status' => 1,
                'title' => 'Can you accommodate after-office hours for sanitization?',
                'updated_at' => '2024-02-01 05:01:10',
            ),
            95 => 
            array (
                'created_at' => '2024-02-01 05:01:58',
                'description' => 'Clear the installation area, disconnect utilities, and ensure access for our team.',
                'id' => 96,
                'service_id' => 66,
                'status' => 1,
                'title' => 'Do I need to prepare anything before the installation?',
                'updated_at' => '2024-02-01 05:01:58',
            ),
            96 => 
            array (
                'created_at' => '2024-02-01 05:02:21',
                'description' => 'Regulations vary, but some areas may require permits. We\'ll handle the paperwork if needed.',
                'id' => 97,
                'service_id' => 66,
                'status' => 1,
                'title' => 'Are there any permits required for water heater installation?',
                'updated_at' => '2024-02-01 05:02:21',
            ),
            97 => 
            array (
                'created_at' => '2024-02-01 05:03:15',
                'description' => 'Seal entry points, keep food stored securely, and schedule regular inspections to minimize future infestations.',
                'id' => 98,
                'service_id' => 65,
                'status' => 1,
                'title' => 'What preventive measures can I take after rodent trapping?',
                'updated_at' => '2024-02-01 05:03:15',
            ),
            98 => 
            array (
                'created_at' => '2024-02-01 05:03:30',
                'description' => 'Yes, we use pet-friendly and child-safe materials to ensure a secure environment during and after the service.',
                'id' => 99,
                'service_id' => 65,
                'status' => 1,
                'title' => 'Are the trapping materials safe for pets and children?',
                'updated_at' => '2024-02-01 05:03:30',
            ),
            99 => 
            array (
                'created_at' => '2024-02-01 05:04:28',
                'description' => 'Clean the surface thoroughly, repair any damages, and use a primer for better adhesion.',
                'id' => 100,
                'service_id' => 64,
                'status' => 1,
                'title' => 'How can I prepare my walls before initiating color touch-ups?',
                'updated_at' => '2024-02-01 05:04:28',
            ),
            100 => 
            array (
                'created_at' => '2024-02-01 05:04:46',
                'description' => 'DIY is possible, but professionals ensure precision and quality. It depends on your comfort level and the scale of the job.',
                'id' => 101,
                'service_id' => 64,
                'status' => 1,
                'title' => 'Is it necessary to hire a professional for color touch-ups, or can I DIY?',
                'updated_at' => '2024-02-01 05:04:46',
            ),
            101 => 
            array (
                'created_at' => '2024-02-01 05:05:35',
                'description' => 'DIY methods may help, but professional intervention is recommended for thorough and lasting eradication.',
                'id' => 102,
                'service_id' => 63,
                'status' => 1,
                'title' => 'Can I use DIY methods to get rid of bed bugs?',
                'updated_at' => '2024-02-01 05:05:35',
            ),
            102 => 
            array (
                'created_at' => '2024-02-01 05:05:55',
                'description' => 'Yes, we use safe and approved pesticides. Temporary relocation during treatment is advised.',
                'id' => 103,
                'service_id' => 63,
                'status' => 1,
                'title' => 'Are the pesticides used safe for my family and pets?',
                'updated_at' => '2024-02-01 05:05:55',
            ),
            103 => 
            array (
                'created_at' => '2024-02-01 05:07:01',
                'description' => 'Schedule a session, discuss your career and financial concerns, and receive actionable advice to propel your success.',
                'id' => 104,
                'service_id' => 62,
                'status' => 1,
                'title' => 'How does the consultation process work?',
                'updated_at' => '2024-02-01 05:07:01',
            ),
            104 => 
            array (
                'created_at' => '2024-02-01 05:07:18',
                'description' => 'Certainly! Our experts provide insights into entrepreneurship, business planning, and strategies for financial success.',
                'id' => 105,
                'service_id' => 62,
                'status' => 1,
                'title' => 'Can I get guidance on entrepreneurship and business ventures?',
                'updated_at' => '2024-02-01 05:07:18',
            ),
            105 => 
            array (
                'created_at' => '2024-02-01 05:08:07',
                'description' => 'Come with clean, dry hair. Avoid using heavy styling products or conditioners before the session.',
                'id' => 106,
                'service_id' => 61,
                'status' => 1,
                'title' => 'What should I do before my hair coloring appointment?',
                'updated_at' => '2024-02-01 05:08:07',
            ),
            106 => 
            array (
                'created_at' => '2024-02-01 05:08:40',
                'description' => 'Our experienced artists use quality products and techniques to minimize damage. Regular maintenance and conditioning are recommended.',
                'id' => 107,
                'service_id' => 61,
                'status' => 1,
                'title' => 'Will hair coloring damage my hair?',
                'updated_at' => '2024-02-01 05:08:40',
            ),
            107 => 
            array (
                'created_at' => '2024-02-01 09:38:51',
                'description' => 'It\'s not recommended as harsh chemicals may damage pipes. Professional assessment is safer and more effective.',
                'id' => 108,
                'service_id' => 60,
                'status' => 1,
                'title' => 'Can I use chemical drain cleaners before calling for service?',
                'updated_at' => '2024-02-01 09:38:51',
            ),
            108 => 
            array (
                'created_at' => '2024-02-01 09:39:07',
                'description' => 'Common culprits include hair, soap scum, grease, and foreign objects. Regular maintenance helps prevent clogs.',
                'id' => 109,
                'service_id' => 60,
                'status' => 1,
                'title' => 'What causes clogged drains?',
                'updated_at' => '2024-02-01 09:39:07',
            ),
            109 => 
            array (
                'created_at' => '2024-02-01 09:40:00',
                'description' => 'Bespoke involves detailed customizations and multiple fittings, providing a more personalized experience than made-to-measure.',
                'id' => 110,
                'service_id' => 59,
                'status' => 1,
                'title' => 'What is the difference between made-to-measure and bespoke?',
                'updated_at' => '2024-02-01 09:40:00',
            ),
            110 => 
            array (
                'created_at' => '2024-02-01 09:42:10',
                'description' => 'Absolutely! Bring your design ideas, and our skilled tailors will work with you to bring your vision to life.',
                'id' => 111,
                'service_id' => 59,
                'status' => 1,
                'title' => 'Can you replicate a design I have in mind?',
                'updated_at' => '2024-02-01 09:42:10',
            ),
            111 => 
            array (
                'created_at' => '2024-02-01 09:44:27',
                'description' => 'Yes, we can integrate a wide range of smart appliances, from lights and thermostats to security systems and more.',
                'id' => 112,
                'service_id' => 58,
                'status' => 1,
                'title' => 'Can you integrate all types of smart appliances?',
                'updated_at' => '2024-02-01 09:44:27',
            ),
            112 => 
            array (
                'created_at' => '2024-02-01 09:45:36',
                'description' => 'We\'re compatible with major platforms like Google Home and Amazon Alexa, ensuring seamless integration with your existing setup.',
                'id' => 113,
                'service_id' => 58,
                'status' => 1,
                'title' => 'Is there a specific smart home platform you work with?',
                'updated_at' => '2024-02-01 09:45:36',
            ),
            113 => 
            array (
                'created_at' => '2024-02-01 09:47:54',
                'description' => 'Absolutely! Feel free to bring multiple items, and we\'ll efficiently handle all your hemming needs.',
                'id' => 114,
                'service_id' => 57,
                'status' => 1,
                'title' => 'Can I bring multiple garments for hemming in one appointment?',
                'updated_at' => '2024-02-01 09:47:54',
            ),
            114 => 
            array (
                'created_at' => '2024-02-01 09:48:39',
                'description' => 'Wear the shoes you plan to pair with the garment to ensure the perfect length during the fitting.',
                'id' => 115,
                'service_id' => 57,
                'status' => 1,
                'title' => 'What should I wear for a fitting appointment for hemming?',
                'updated_at' => '2024-02-01 09:48:39',
            ),
            115 => 
            array (
                'created_at' => '2024-02-01 09:51:05',
                'description' => 'It depends on the system. Some require a hub, while others can be directly connected to your Wi-Fi network.',
                'id' => 116,
                'service_id' => 56,
                'status' => 1,
                'title' => 'Is a smart home hub necessary for smart lighting installation?',
                'updated_at' => '2024-02-01 09:51:05',
            ),
            116 => 
            array (
                'created_at' => '2024-02-01 09:51:21',
                'description' => 'Absolutely! We configure voice control compatibility with popular platforms like Amazon Alexa and Google Assistant.',
                'id' => 117,
                'service_id' => 56,
                'status' => 1,
                'title' => 'Do you integrate voice control options?',
                'updated_at' => '2024-02-01 09:51:21',
            ),
            117 => 
            array (
                'created_at' => '2024-02-01 09:52:33',
                'description' => 'Absolutely! Our VIP protection services extend globally to provide security during international travel.',
                'id' => 118,
                'service_id' => 55,
                'status' => 1,
                'title' => 'Is VIP Escort Protection available for international travel?',
                'updated_at' => '2024-02-01 09:52:33',
            ),
            118 => 
            array (
                'created_at' => '2024-02-01 09:52:51',
                'description' => 'Our security personnel are trained to handle emergencies swiftly and efficiently, coordinating with local authorities to ensure a rapid response.',
                'id' => 119,
                'service_id' => 55,
                'status' => 1,
                'title' => 'What measures are in place for emergency situations during VIP protection?',
                'updated_at' => '2024-02-01 09:52:51',
            ),
            119 => 
            array (
                'created_at' => '2024-02-01 09:54:32',
                'description' => 'To ensure the effectiveness of the service, it\'s advisable to vacate the area during the disinfection process. You can return shortly after completion.',
                'id' => 120,
                'service_id' => 54,
                'status' => 1,
                'title' => 'Can I remain in the space during the disinfection process?',
                'updated_at' => '2024-02-01 09:54:32',
            ),
            120 => 
            array (
                'created_at' => '2024-02-01 09:56:06',
                'description' => 'High Touch Point Disinfection focuses on immediate sanitation. For long-term prevention, consider regular cleaning and additional protective measures.',
                'id' => 121,
                'service_id' => 54,
                'status' => 1,
                'title' => 'Does the service include preventive measures against future contamination?',
                'updated_at' => '2024-02-01 09:56:06',
            ),
            121 => 
            array (
                'created_at' => '2024-02-01 09:58:13',
                'description' => 'Yes, untreated pipe bursting can lead to water damage. Swift repairs are crucial to prevent further issues.',
                'id' => 122,
                'service_id' => 53,
                'status' => 1,
                'title' => 'Can pipe bursting cause damage to my property?',
                'updated_at' => '2024-02-01 09:58:13',
            ),
            122 => 
            array (
                'created_at' => '2024-02-01 09:58:30',
                'description' => 'Regular maintenance and inspections can catch potential issues early, preventing major pipe bursting incidents.',
                'id' => 123,
                'service_id' => 53,
                'status' => 1,
                'title' => 'Are there preventive measures to avoid pipe bursting?',
                'updated_at' => '2024-02-01 09:58:30',
            ),
            123 => 
            array (
                'created_at' => '2024-02-01 09:59:42',
                'description' => 'We offer security services for a wide range of events and locations, including corporate functions, residential areas, and public gatherings.',
                'id' => 124,
                'service_id' => 52,
                'status' => 1,
                'title' => 'What types of events or locations can you provide security for?',
                'updated_at' => '2024-02-01 09:59:42',
            ),
            124 => 
            array (
                'created_at' => '2024-02-01 10:00:09',
                'description' => 'Our security guards are trained to handle emergencies swiftly. We have established communication protocols and work closely with local authorities to ensure a rapid response.',
                'id' => 125,
                'service_id' => 52,
                'status' => 1,
                'title' => 'What happens in case of an emergency during an event?',
                'updated_at' => '2024-02-01 10:00:09',
            ),
            125 => 
            array (
                'created_at' => '2024-02-01 10:02:02',
                'description' => 'Yes, our experienced pandits are flexible and can perform the puja at your chosen location.',
                'id' => 126,
                'service_id' => 51,
                'status' => 1,
                'title' => 'Can the Marriage Puja be conducted at my preferred venue?',
                'updated_at' => '2024-02-01 10:02:02',
            ),
            126 => 
            array (
                'created_at' => '2024-02-01 10:02:16',
                'description' => 'Ensure a clean and calm space for the puja. Have necessary items like fruits, flowers, and offerings ready as per the pandit\'s guidance.',
                'id' => 127,
                'service_id' => 51,
                'status' => 1,
                'title' => 'What preparations do I need to make before the Marriage Puja?',
                'updated_at' => '2024-02-01 10:02:16',
            ),
            127 => 
            array (
                'created_at' => '2024-02-01 10:03:18',
                'description' => 'For optimal results, it\'s advisable to move or cover furniture. However, our team can assist with light furniture rearrangement.',
                'id' => 128,
                'service_id' => 50,
                'status' => 1,
                'title' => 'Do I need to move furniture before the painting crew arrives?',
                'updated_at' => '2024-02-01 10:03:18',
            ),
            128 => 
            array (
                'created_at' => '2024-02-01 10:03:35',
                'description' => 'While it\'s possible, we recommend removing wallpaper for a smoother and more professional result. Discuss options with our team during the consultation.',
                'id' => 129,
                'service_id' => 50,
                'status' => 1,
                'title' => 'Can you paint over wallpaper?',
                'updated_at' => '2024-02-01 10:03:35',
            ),
            129 => 
            array (
                'created_at' => '2024-02-01 10:04:30',
                'description' => 'Our trimming service covers edges, borders, and obstacles for a polished and well-defined lawn appearance.',
                'id' => 130,
                'service_id' => 49,
                'status' => 1,
                'title' => 'What is included in the lawn trimming service?',
                'updated_at' => '2024-02-01 10:04:30',
            ),
            130 => 
            array (
                'created_at' => '2024-02-01 10:04:47',
                'description' => 'No need! Our professional gardeners come fully equipped with all the necessary tools and machinery.',
                'id' => 131,
                'service_id' => 49,
                'status' => 1,
                'title' => 'Do I need to provide the lawn mower and tools?',
                'updated_at' => '2024-02-01 10:04:47',
            ),
            131 => 
            array (
                'created_at' => '2024-02-01 10:05:54',
                'description' => 'Certainly! Let us know your preferred folding style, and our team will ensure your clothes are folded just the way you like.',
                'id' => 132,
                'service_id' => 48,
                'status' => 1,
                'title' => 'Can I request a specific folding style for my clothes?',
                'updated_at' => '2024-02-01 10:05:54',
            ),
            132 => 
            array (
                'created_at' => '2024-02-01 10:06:08',
                'description' => 'We use high-quality, hypoallergenic detergents and softeners to provide a clean and fresh finish to your laundry.',
                'id' => 133,
                'service_id' => 48,
                'status' => 1,
                'title' => 'What detergents and softeners do you use for the wash and fold service?',
                'updated_at' => '2024-02-01 10:06:08',
            ),
            133 => 
            array (
                'created_at' => '2024-02-01 10:07:02',
                'description' => 'Regularly inspect plants, remove debris, and opt for our eco-friendly pest control add-on for a healthier garden.',
                'id' => 134,
                'service_id' => 47,
                'status' => 1,
                'title' => 'How can I prevent pests and diseases in my garden?',
                'updated_at' => '2024-02-01 10:07:02',
            ),
            134 => 
            array (
                'created_at' => '2024-02-01 10:07:17',
                'description' => 'Yes, we offer organic fertilization choices to promote sustainable and environmentally friendly gardening practices.',
                'id' => 135,
                'service_id' => 47,
                'status' => 1,
                'title' => 'Do you provide organic fertilization options for my garden?',
                'updated_at' => '2024-02-01 10:07:17',
            ),
            135 => 
            array (
                'created_at' => '2024-02-01 10:08:00',
                'description' => 'Certainly! We offer gluten-free and vegan dessert alternatives. Let us know your preferences when placing your order.',
                'id' => 136,
                'service_id' => 46,
                'status' => 1,
                'title' => 'Are there gluten-free or vegan dessert options available?',
                'updated_at' => '2024-02-01 10:08:00',
            ),
            136 => 
            array (
                'created_at' => '2024-02-01 10:08:21',
                'description' => 'We take allergies seriously. Inform us of any allergies, and we\'ll ensure a safe and delicious dessert experience.',
                'id' => 137,
                'service_id' => 46,
                'status' => 1,
                'title' => 'What allergens are considered when preparing desserts?',
                'updated_at' => '2024-02-01 10:08:21',
            ),
            137 => 
            array (
                'created_at' => '2024-02-01 10:09:19',
                'description' => 'Yes, our specialists provide personalized post-facial skincare advice to maximize the benefits of your treatment.',
                'id' => 138,
                'service_id' => 45,
                'status' => 1,
                'title' => 'Is there a recommended skincare routine to follow after a customized facial?',
                'updated_at' => '2024-02-01 10:09:19',
            ),
            138 => 
            array (
                'created_at' => '2024-02-01 10:09:54',
                'description' => 'Absolutely! Our skincare experts will tailor products to your needs, considering any preferences or concerns you may have.',
                'id' => 139,
                'service_id' => 45,
                'status' => 1,
                'title' => 'Can I request specific ingredients for my custom facial products?',
                'updated_at' => '2024-02-01 10:09:54',
            ),
            139 => 
            array (
                'created_at' => '2024-02-01 10:10:52',
                'description' => 'Certainly! Bringing props can add a personal touch to your portraits. Let us know in advance, so we can plan accordingly.',
                'id' => 140,
                'service_id' => 44,
                'status' => 1,
                'title' => 'Can we bring props for our family photos?',
                'updated_at' => '2024-02-01 10:10:52',
            ),
            140 => 
            array (
                'created_at' => '2024-02-01 10:11:13',
                'description' => 'Choose outfits that complement each other and reflect your personal style. Avoid overly matching to create a natural and cohesive look.',
                'id' => 141,
                'service_id' => 44,
                'status' => 1,
                'title' => 'What should we wear for our portrait session?',
                'updated_at' => '2024-02-01 10:11:13',
            ),
            141 => 
            array (
                'created_at' => '2024-02-01 10:12:18',
                'description' => 'We prioritize eco-friendly options, and our technicians use products with minimal environmental impact.',
                'id' => 142,
                'service_id' => 43,
                'status' => 1,
                'title' => 'Are the roach control products environmentally friendly?',
                'updated_at' => '2024-02-01 10:12:18',
            ),
            142 => 
            array (
                'created_at' => '2024-02-01 10:12:33',
                'description' => 'Maintain cleanliness, seal entry points, and fix leaks to create an inhospitable environment for roaches.',
                'id' => 143,
                'service_id' => 43,
                'status' => 1,
                'title' => 'What steps can I take to prevent roach infestations after treatment?',
                'updated_at' => '2024-02-01 10:12:33',
            ),
            143 => 
            array (
                'created_at' => '2024-02-01 10:13:24',
                'description' => 'Absolutely! Our knowledgeable pandits will guide you through each ritual and explain the significance of the Satyanarayan Katha.',
                'id' => 144,
                'service_id' => 42,
                'status' => 1,
                'title' => 'Can the pandit guide us on the rituals and significance of the Satyanarayan Katha?',
                'updated_at' => '2024-02-01 10:13:24',
            ),
            144 => 
            array (
                'created_at' => '2024-02-01 10:15:44',
                'description' => 'Common items include fruits, flowers, prasad, coconut, and a small idol or image of Lord Satyanarayan.',
                'id' => 145,
                'service_id' => 42,
                'status' => 1,
                'title' => 'What items are required for the Satyanarayan Katha puja?',
                'updated_at' => '2024-02-01 10:15:44',
            ),
            145 => 
            array (
                'created_at' => '2024-02-01 10:16:41',
                'description' => 'We handle fabric repairs of all sizes, from small tears to larger patches, ensuring your garments look as good as new.',
                'id' => 146,
                'service_id' => 41,
                'status' => 1,
                'title' => 'Is there a size limit for fabric repairs?',
                'updated_at' => '2024-02-01 10:16:41',
            ),
            146 => 
            array (
                'created_at' => '2024-02-01 10:16:57',
                'description' => 'Yes, our skilled tailors are experienced in working with complex patterns and prints to ensure a flawless fabric repair.',
                'id' => 147,
                'service_id' => 41,
                'status' => 1,
                'title' => 'Can you repair garments with complex patterns or prints?',
                'updated_at' => '2024-02-01 10:16:57',
            ),
            147 => 
            array (
                'created_at' => '2024-02-01 10:17:58',
                'description' => 'Absolutely! We tailor setups to fit various room sizes, optimizing your space for maximum enjoyment.',
                'id' => 148,
                'service_id' => 40,
                'status' => 1,
                'title' => 'Can you install a home theater in a small space?',
                'updated_at' => '2024-02-01 10:17:58',
            ),
            148 => 
            array (
                'created_at' => '2024-02-01 10:18:20',
                'description' => 'Choose a room with minimal natural light and good acoustics for an optimal home theater experience.',
                'id' => 149,
                'service_id' => 40,
                'status' => 1,
                'title' => 'What\'s the ideal room for a home theater setup?',
                'updated_at' => '2024-02-01 10:18:20',
            ),
            149 => 
            array (
                'created_at' => '2024-02-01 10:21:44',
                'description' => 'Absolutely! Our skilled artisans specialize in preserving and restoring vintage garments with care.',
                'id' => 150,
                'service_id' => 39,
                'status' => 1,
                'title' => 'Is garment restoration suitable for vintage clothing?',
                'updated_at' => '2024-02-01 10:21:44',
            ),
            150 => 
            array (
                'created_at' => '2024-02-01 10:23:08',
                'description' => 'While complete restoration is our goal, the outcome may vary based on the initial condition of the garment.',
                'id' => 151,
                'service_id' => 39,
                'status' => 1,
                'title' => 'Will my garment look as good as new after restoration?',
                'updated_at' => '2024-02-01 10:23:08',
            ),
            151 => 
            array (
                'created_at' => '2024-02-01 10:24:06',
                'description' => 'Paint protection adds a layer for durability, while polishing enhances the paint\'s appearance by removing imperfections.',
                'id' => 152,
                'service_id' => 38,
                'status' => 1,
                'title' => 'What\'s the difference between paint protection and polishing?',
                'updated_at' => '2024-02-01 10:24:06',
            ),
            152 => 
            array (
                'created_at' => '2024-02-01 10:24:20',
                'description' => 'Our services are designed for various surfaces, including walls, ceilings, and trim. We tailor our approach based on the material.',
                'id' => 153,
                'service_id' => 38,
                'status' => 1,
                'title' => 'Is paint polishing suitable for all types of surfaces?',
                'updated_at' => '2024-02-01 10:24:20',
            ),
            153 => 
            array (
                'created_at' => '2024-02-01 10:45:14',
                'description' => 'Look out for reduced cooling, longer cooling cycles, and ice buildup on the evaporator coil - indicators that your AC may need a coolant boost.',
                'id' => 154,
                'service_id' => 37,
                'status' => 1,
                'title' => 'What are the signs that my AC needs a coolant renewal?',
                'updated_at' => '2024-02-01 10:45:14',
            ),
            154 => 
            array (
                'created_at' => '2024-02-01 10:45:44',
                'description' => 'We recommend using the coolant specified by your AC manufacturer for optimal performance and efficiency.',
                'id' => 155,
                'service_id' => 37,
                'status' => 1,
                'title' => 'Can I use any coolant for my AC, or should I stick to a specific type?',
                'updated_at' => '2024-02-01 10:45:44',
            ),
            155 => 
            array (
                'created_at' => '2024-02-01 13:28:24',
                'description' => 'Our comprehensive service covers cleaning, lubricating, checking refrigerant levels, and ensuring all components are in top condition.',
                'id' => 156,
                'service_id' => 36,
                'status' => 1,
                'title' => 'What does an AC tune-up include?',
                'updated_at' => '2024-02-01 13:28:24',
            ),
            156 => 
            array (
                'created_at' => '2024-02-01 13:28:41',
                'description' => 'Absolutely! Regular maintenance, even for new units, ensures optimal performance, prevents issues, and extends the lifespan of your system.',
                'id' => 157,
                'service_id' => 36,
                'status' => 1,
                'title' => 'Is a tune-up necessary for newly installed AC units?',
                'updated_at' => '2024-02-01 13:28:41',
            ),
            157 => 
            array (
                'created_at' => '2024-02-01 13:29:35',
                'description' => 'No need! Our professionals bring all the necessary supplies and equipment for a comprehensive deep cleaning.',
                'id' => 158,
                'service_id' => 35,
                'status' => 1,
                'title' => 'Do I need to provide cleaning supplies and equipment?',
                'updated_at' => '2024-02-01 13:29:35',
            ),
            158 => 
            array (
                'created_at' => '2024-02-01 13:29:52',
                'description' => 'Yes, our cleaning products are selected for their effectiveness and safety, making them suitable for households with pets and children.',
                'id' => 159,
                'service_id' => 35,
                'status' => 1,
                'title' => 'Are your cleaning products safe for pets and children?',
                'updated_at' => '2024-02-01 13:29:52',
            ),
            159 => 
            array (
                'created_at' => '2024-02-01 13:30:46',
                'description' => 'Wood, MDF, and PVC are popular choices for durability and aesthetic appeal.',
                'id' => 160,
                'service_id' => 34,
                'status' => 1,
                'title' => 'What materials are commonly used for door casing and trim?',
                'updated_at' => '2024-02-01 13:30:46',
            ),
            160 => 
            array (
                'created_at' => '2024-02-01 13:31:19',
                'description' => 'Yes, removing old trim ensures a clean installation and a polished final look.',
                'id' => 161,
                'service_id' => 34,
                'status' => 1,
                'title' => 'Is it necessary to remove the old trim before installing new casing?',
                'updated_at' => '2024-02-01 13:31:19',
            ),
            161 => 
            array (
                'created_at' => '2024-02-01 13:32:20',
                'description' => 'Regular fluid changes are essential, but a flush may not always be necessary. Consult with our experts to determine the best maintenance for your vehicle.',
                'id' => 162,
                'service_id' => 33,
                'status' => 1,
                'title' => 's a transmission flush necessary?',
                'updated_at' => '2024-02-01 13:32:20',
            ),
            162 => 
            array (
                'created_at' => '2024-02-01 13:32:43',
                'description' => 'Driving with a slipping transmission can cause further damage. It\'s advisable to have it inspected and repaired promptly.',
                'id' => 163,
                'service_id' => 33,
                'status' => 1,
                'title' => 'Can I drive with a slipping transmission?',
                'updated_at' => '2024-02-01 13:32:43',
            ),
            163 => 
            array (
                'created_at' => '2024-02-01 13:33:20',
                'description' => 'Yes, our specialized cleaning techniques can effectively remove most stains, rejuvenating your car seats.',
                'id' => 164,
                'service_id' => 32,
                'status' => 1,
                'title' => 'Can you remove stubborn stains from my car seats?',
                'updated_at' => '2024-02-01 13:33:20',
            ),
            164 => 
            array (
                'created_at' => '2024-02-01 13:33:39',
                'description' => 'It\'s advisable to remove personal items for a thorough cleaning, but our team can work around them if needed.',
                'id' => 165,
                'service_id' => 32,
                'status' => 1,
                'title' => 'Do I need to remove personal items before the cleaning session?',
                'updated_at' => '2024-02-01 13:33:39',
            ),
            165 => 
            array (
                'created_at' => '2024-02-01 13:34:29',
                'description' => 'It\'s not recommended. Continuing to drive with the check engine light on may worsen the issue. Schedule diagnostics promptly.',
                'id' => 166,
                'service_id' => 31,
                'status' => 1,
                'title' => 'Can I drive my car if the check engine light is on?',
                'updated_at' => '2024-02-01 13:34:29',
            ),
            166 => 
            array (
                'created_at' => '2024-02-01 13:34:46',
                'description' => 'No, engine diagnostics specifically focuses on identifying and resolving issues related to the engine\'s performance.',
                'id' => 167,
                'service_id' => 31,
                'status' => 1,
                'title' => 'Is engine diagnostics the same as a regular car inspection?',
                'updated_at' => '2024-02-01 13:34:46',
            ),
            167 => 
            array (
                'created_at' => '2024-02-01 14:11:17',
                'description' => 'Yes, we offer smart solutions for automation and remote control of your outdoor lighting.',
                'id' => 168,
                'service_id' => 30,
                'status' => 1,
                'title' => 'Can outdoor lights be automated or controlled remotely?',
                'updated_at' => '2024-02-01 14:11:17',
            ),
            168 => 
            array (
                'created_at' => '2024-02-01 14:11:33',
                'description' => 'Absolutely! Choose LED fixtures and smart controls for energy savings and eco-friendly options.',
                'id' => 169,
                'service_id' => 30,
                'status' => 1,
                'title' => 'Are energy-efficient options available for outdoor lighting?',
                'updated_at' => '2024-02-01 14:11:33',
            ),
            169 => 
            array (
                'created_at' => '2024-02-01 14:12:28',
                'description' => 'Certainly! Our electricians are equipped to install and set up smart lighting systems for your convenience.',
                'id' => 170,
                'service_id' => 29,
                'status' => 1,
                'title' => 'Can you install smart lighting systems during the service?',
                'updated_at' => '2024-02-01 14:12:28',
            ),
            170 => 
            array (
                'created_at' => '2024-02-01 14:12:48',
                'description' => 'Absolutely! You can choose your preferred fixtures, and our electricians will handle the installation.',
                'id' => 171,
                'service_id' => 29,
                'status' => 1,
                'title' => 'Can I choose my own light fixtures for installation?',
                'updated_at' => '2024-02-01 14:12:48',
            ),
            171 => 
            array (
                'created_at' => '2024-02-01 14:13:26',
                'description' => 'Wiring issues can stem from aging, rodents, or faulty installations. Regular inspections help identify and address potential problems.',
                'id' => 172,
                'service_id' => 28,
                'status' => 1,
                'title' => 'What causes wiring issues in a home?',
                'updated_at' => '2024-02-01 14:13:26',
            ),
            172 => 
            array (
                'created_at' => '2024-02-01 14:13:44',
                'description' => 'The duration depends on the extent of the issue. Simple repairs may take a few hours, while more complex ones could span a day.',
                'id' => 173,
                'service_id' => 28,
                'status' => 1,
                'title' => 'How long does a typical wiring repair take?',
                'updated_at' => '2024-02-01 14:13:44',
            ),
            173 => 
            array (
                'created_at' => '2024-02-01 14:14:29',
                'description' => 'Certainly! We accommodate dietary preferences, including gluten-free options.',
                'id' => 174,
                'service_id' => 27,
                'status' => 1,
                'title' => 'Can I request gluten-free pasta for my dish?',
                'updated_at' => '2024-02-01 14:14:29',
            ),
            174 => 
            array (
                'created_at' => '2024-02-01 14:14:49',
                'description' => 'While some ingredients are imported, we prioritize freshness and quality for an authentic Italian experience.',
                'id' => 175,
                'service_id' => 27,
                'status' => 1,
                'title' => 'Are your ingredients sourced from Italy for an authentic taste?',
                'updated_at' => '2024-02-01 14:14:49',
            ),
            175 => 
            array (
                'created_at' => '2024-02-01 14:15:29',
                'description' => 'Cantonese is known for freshness, while Szechuan is spicy and bold. Explore both for a diverse culinary experience.',
                'id' => 176,
                'service_id' => 26,
                'status' => 1,
                'title' => 'What\'s the difference between Cantonese and Szechuan cuisine?',
                'updated_at' => '2024-02-01 14:15:29',
            ),
            176 => 
            array (
                'created_at' => '2024-02-01 14:15:57',
                'description' => 'Reheat in a pan or oven for crispy textures. Avoid using the microwave to maintain the dish\'s original flavor and texture.',
                'id' => 177,
                'service_id' => 26,
                'status' => 1,
                'title' => 'How can I reheat Chinese takeout for the best flavor?',
                'updated_at' => '2024-02-01 14:15:57',
            ),
            177 => 
            array (
                'created_at' => '2024-02-01 14:16:54',
                'description' => 'Absolutely! We work closely with clients to accommodate dietary restrictions and ensure a safe and enjoyable dining experience.',
                'id' => 178,
                'service_id' => 25,
                'status' => 1,
                'title' => 'Can the chef accommodate dietary restrictions and allergies?',
                'updated_at' => '2024-02-01 14:16:54',
            ),
            178 => 
            array (
                'created_at' => '2024-02-01 14:17:08',
                'description' => 'Absolutely! Our chef specializes in creating personalized menus tailored to your preferences and event theme.',
                'id' => 179,
                'service_id' => 25,
                'status' => 1,
                'title' => 'Can I request a customized menu for my event from the Authentic Mexican Chef?',
                'updated_at' => '2024-02-01 14:17:08',
            ),
            179 => 
            array (
                'created_at' => '2024-02-01 14:18:22',
                'description' => 'The package includes menu planning, ingredient sourcing, preparation, and cleanup, ensuring a hassle-free and delightful dining experience for your family.',
                'id' => 180,
                'service_id' => 24,
                'status' => 1,
                'title' => 'What is included in the family-style dinner package?',
                'updated_at' => '2024-02-01 14:18:22',
            ),
            180 => 
            array (
                'created_at' => '2024-02-01 14:18:37',
                'description' => 'Yes, we prioritize quality. Our chefs use fresh, locally sourced ingredients for a delectable and sustainable dining experience.',
                'id' => 181,
                'service_id' => 24,
                'status' => 1,
                'title' => 'Are ingredients sourced responsibly and locally?',
                'updated_at' => '2024-02-01 14:18:37',
            ),
            181 => 
            array (
                'created_at' => '2024-02-01 14:19:19',
                'description' => 'Absolutely! We prioritize using fresh, high-quality ingredients to create delicious and nutritious meals for you.',
                'id' => 182,
                'service_id' => 23,
                'status' => 1,
                'title' => 'Are the ingredients sourced fresh?',
                'updated_at' => '2024-02-01 14:19:19',
            ),
            182 => 
            array (
                'created_at' => '2024-02-01 14:19:33',
                'description' => 'Certainly! Our cooks are versatile and can prepare meals in various cuisines or styles based on your preferences.',
                'id' => 183,
                'service_id' => 23,
                'status' => 1,
                'title' => 'Can I request specific cuisines or styles of cooking?',
                'updated_at' => '2024-02-01 14:19:33',
            ),
            183 => 
            array (
                'created_at' => '2024-02-01 14:20:50',
                'description' => 'Yes, our professional team performs on-site cleaning without the need for curtain removal.',
                'id' => 184,
                'service_id' => 21,
                'status' => 1,
                'title' => 'Can I leave my curtains hanging during the cleaning process?',
                'updated_at' => '2024-02-01 14:20:50',
            ),
            184 => 
            array (
                'created_at' => '2024-02-01 14:21:10',
                'description' => 'We clean all types, including drapes, sheers, and fabric blinds, ensuring a thorough and gentle process.',
                'id' => 185,
                'service_id' => 21,
                'status' => 1,
                'title' => 'What types of curtains do you clean?',
                'updated_at' => '2024-02-01 14:21:10',
            ),
            185 => 
            array (
                'created_at' => '2024-02-01 14:22:03',
                'description' => 'Drying times vary but typically range from 4 to 6 hours. Ventilation and weather conditions can impact drying.',
                'id' => 186,
                'service_id' => 20,
                'status' => 1,
                'title' => 'How long does the carpet drying process take?',
                'updated_at' => '2024-02-01 14:22:03',
            ),
            186 => 
            array (
                'created_at' => '2024-02-01 14:22:17',
                'description' => 'We tailor our approach to your carpet\'s needs, utilizing steam cleaning, dry cleaning, or other methods for optimal results.',
                'id' => 187,
                'service_id' => 20,
                'status' => 1,
                'title' => 'Is there a specific carpet cleaning method you recommend?',
                'updated_at' => '2024-02-01 14:22:17',
            ),
            187 => 
            array (
                'created_at' => '2024-02-01 14:23:09',
                'description' => 'Absolutely! Our team is equipped to handle hard-to-reach areas using safe and effective cleaning methods.',
                'id' => 188,
                'service_id' => 19,
                'status' => 1,
                'title' => 'Can you clean hard-to-reach areas, like high ceilings or crown moldings?',
                'updated_at' => '2024-02-01 14:23:09',
            ),
            188 => 
            array (
                'created_at' => '2024-02-01 14:23:22',
                'description' => 'In most cases, our cleaning process can significantly improve the appearance of stains and discoloration. However, complete removal depends on the nature of the stain.',
                'id' => 189,
                'service_id' => 19,
                'status' => 1,
                'title' => 'Will Ceiling and Wall Cleaning remove stains or discoloration?',
                'updated_at' => '2024-02-01 14:23:22',
            ),
            189 => 
            array (
                'created_at' => '2024-02-01 14:24:08',
                'description' => 'Our service covers all essential areas, including bedrooms, bathrooms, kitchen, living spaces, and common areas, providing a comprehensive clean.',
                'id' => 190,
                'service_id' => 18,
                'status' => 1,
                'title' => 'What areas of the house are covered in a full house cleaning?',
                'updated_at' => '2024-02-01 14:24:08',
            ),
            190 => 
            array (
                'created_at' => '2024-02-01 14:24:24',
                'description' => 'No need! Our professional cleaners bring their own supplies, ensuring a thorough and effective cleaning.',
                'id' => 191,
                'service_id' => 18,
                'status' => 1,
                'title' => 'Do I need to provide cleaning supplies?',
                'updated_at' => '2024-02-01 14:24:24',
            ),
            191 => 
            array (
                'created_at' => '2024-02-01 14:25:12',
                'description' => 'Absolutely! Our skilled team is experienced in installations for both residential and commercial properties.',
                'id' => 192,
                'service_id' => 17,
                'status' => 1,
                'title' => 'Can you install beams and columns for both residential and commercial spaces?',
                'updated_at' => '2024-02-01 14:25:12',
            ),
            192 => 
            array (
                'created_at' => '2024-02-01 14:25:24',
                'description' => 'The lifespan depends on factors like material and environmental conditions. We use durable materials for long-lasting results.',
                'id' => 193,
                'service_id' => 17,
                'status' => 1,
                'title' => 'What is the average lifespan of installed beams and columns?',
                'updated_at' => '2024-02-01 14:25:24',
            ),
            193 => 
            array (
                'created_at' => '2024-02-01 14:26:04',
                'description' => 'Refinishing is typically done every 5-10 years, depending on wear and tear and personal preference.',
                'id' => 194,
                'service_id' => 16,
                'status' => 1,
                'title' => 'How often should cabinets be refinished for optimal maintenance?',
                'updated_at' => '2024-02-01 14:26:04',
            ),
            194 => 
            array (
                'created_at' => '2024-02-01 14:26:18',
                'description' => 'Yes, our experts can address cabinet damage, including fixing loose hinges and repairing other issues.',
                'id' => 195,
                'service_id' => 16,
                'status' => 1,
                'title' => 'Is it possible to fix a cabinet that\'s been damaged or has loose hinges?',
                'updated_at' => '2024-02-01 14:26:18',
            ),
            195 => 
            array (
                'created_at' => '2024-02-01 14:26:59',
                'description' => 'Certainly! Customize your chair\'s look by choosing from our range of stains and finishes.',
                'id' => 196,
                'service_id' => 15,
                'status' => 1,
                'title' => 'Can I choose a different stain or finish for my chair?',
                'updated_at' => '2024-02-01 14:26:59',
            ),
            196 => 
            array (
                'created_at' => '2024-02-01 14:27:13',
                'description' => 'Yes, our restoration process includes repairing scratches, dents, and other visible damages for a like-new appearance.',
                'id' => 197,
                'service_id' => 15,
                'status' => 1,
                'title' => 'Will the restoration remove scratches and dents?',
                'updated_at' => '2024-02-01 14:27:13',
            ),
            197 => 
            array (
                'created_at' => '2024-02-01 14:28:36',
                'description' => 'It\'s a specialized process best done by professionals using the right equipment for accurate results.',
                'id' => 198,
                'service_id' => 14,
                'status' => 1,
                'title' => 'Can I rotate and balance my tires at home?',
                'updated_at' => '2024-02-01 14:28:36',
            ),
            198 => 
            array (
                'created_at' => '2024-02-01 14:28:45',
                'description' => 'Rotation ensures even wear on all tires, while balancing optimizes weight distribution, preventing vibrations.',
                'id' => 199,
                'service_id' => 14,
                'status' => 1,
                'title' => 'What\'s the difference between tire rotation and balancing?',
                'updated_at' => '2024-02-01 14:28:45',
            ),
            199 => 
            array (
                'created_at' => '2024-02-01 14:29:29',
                'description' => 'Absolutely! Our service includes a thorough check of essential fluids like coolant, brake fluid, and transmission fluid.',
                'id' => 200,
                'service_id' => 13,
                'status' => 1,
                'title' => 'Do you check other fluids during an oil change?',
                'updated_at' => '2024-02-01 14:29:29',
            ),
            200 => 
            array (
                'created_at' => '2024-02-01 14:29:45',
                'description' => 'Look out for warning lights, dark or gritty oil, and engine noise – these may indicate it\'s time for a change.',
                'id' => 201,
                'service_id' => 13,
                'status' => 1,
                'title' => 'What signs indicate my car needs an oil change?',
                'updated_at' => '2024-02-01 14:29:45',
            ),
            201 => 
            array (
                'created_at' => '2024-02-01 14:30:31',
                'description' => 'Our service includes mounting the unit securely, sealing gaps, and testing for proper functionality.',
                'id' => 202,
                'service_id' => 12,
                'status' => 1,
                'title' => 'What is included in the installation service?',
                'updated_at' => '2024-02-01 14:30:31',
            ),
            202 => 
            array (
                'created_at' => '2024-02-01 14:30:47',
                'description' => 'Ensure the designated window is accessible and clear. We\'ll take care of the rest.',
                'id' => 203,
                'service_id' => 12,
                'status' => 1,
                'title' => 'Is there anything I need to prepare before the installation?',
                'updated_at' => '2024-02-01 14:30:47',
            ),
            203 => 
            array (
                'created_at' => '2024-02-01 14:31:26',
                'description' => 'Yes, as long as the room size is compatible with the AC capacity. Consult with our experts for personalized recommendations.',
                'id' => 204,
                'service_id' => 11,
                'status' => 1,
                'title' => 'Can I install a split AC in any room?',
                'updated_at' => '2024-02-01 14:31:26',
            ),
            204 => 
            array (
                'created_at' => '2024-02-01 14:31:38',
                'description' => 'It\'s possible, but it\'s recommended to consult with our technicians to assess feasibility and ensure proper relocation.',
                'id' => 205,
                'service_id' => 11,
                'status' => 1,
                'title' => 'Can I relocate a split AC unit after installation?',
                'updated_at' => '2024-02-01 14:31:38',
            ),
        ));
        
        
    }
}
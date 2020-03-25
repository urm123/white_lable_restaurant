<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | In here you can define all the settings used in your app, it will be
    | available as a settings page where user can update it if needed
    | create sections of settings with a type of input.
    */
    'features' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'select',
                    'name' => 'date_format',
                    'label' => 'Date Format',
                    'value' => '1',
                    'data' => 'string',
                    'class' => 'form-control',
                    'rules' => 'string',
                    'options' => [
                        'dd-mm-yyyy' => 'dd-mm-yyyy'
                    ],
                ],
            ]
        ],
    ],
    'restaurant' => [

        'vat' => [

            'title' => 'VAT Config',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'food_vat',
                    'label' => 'Food VAT',
                    'class' => '',
                    'rules' => 'numeric'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'alcohol_vat',
                    'label' => 'Alcohol VAT',
                    'class' => '',
                    'rules' => 'numeric'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'delivery_vat',
                    'label' => 'Delivery VAT',
                    'class' => '',
                    'rules' => 'numeric'
                ],
            ]
        ],
    ],

    'general' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'select',
                    'name' => 'site_theme',
                    'label' => 'Theme',
                    'value' => '1',
                    'data' => 'string',
                    'class' => 'form-control',
                    'rules' => 'string',
                    'options' => [
                        'default' => 'Default',
                        'orange-peel' => 'Orange Peel',
                        'whiskey' => 'Whiskey',
                        'thunderbird' => 'Thunderbird',
                        'amber' => 'Amber',
                        'apple' => 'Apple',
                    ],
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'login_as_guest',
                    'label' => 'Enable Login as Guest',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'guest_email_id',
                    'label' => 'Guest Login Email ID',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'favicon',
                    'label' => 'Favicon',
                    'class' => '',
                    'hint' => '(Size : 32px - 32px)',
                    'rules' => 'max:500',
                    'path' => 'site/',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'google_analytics_id',
                    'label' => 'Google Analytics Tracking ID',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'fb_page_url',
                    'label' => 'Facebook Page Url',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'twitter_url',
                    'label' => 'Twitter Url',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'instagram_url',
                    'label' => 'Instagram Url',
                    'class' => 'form-control',
                    'rules' => ''
                ],
            ]
        ],
    ],

    'mail' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'select',
                    'name' => 'mail_server',
                    'label' => 'Mail Server',
                    'value' => '1',
                    'data' => 'string',
                    'class' => 'form-control',
                    'rules' => 'string',
                    'options' => [
                        'mail' => 'Mail',
                        'log' => 'Log',
                    ],
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'mail_from_address',
                    'label' => 'From Email',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'mail_from_name',
                    'label' => 'Email from Name',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'contact_email_id',
                    'label' => 'Contact Form Email Notification To',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
            ]
        ],
    ],

    'api' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'pusher_app_id',
                    'label' => 'Pusher App ID',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'pusher_app_key',
                    'label' => 'Pusher App Key',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'pusher_app_secret',
                    'label' => 'Pusher App Secret',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'pusher_app_cluster',
                    'label' => 'Pusher App Cluster',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'ip_info_token',
                    'label' => 'IPinfo.io Token',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
            ]
        ],
    ],

    'app-settings' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'app_name',
                    'label' => 'App Name',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'app_url',
                    'label' => 'App Url',
                    'class' => 'form-control',
                    'rules' => 'required'
                ],
            ]
        ],
    ],

    'homepage' => [

        'meta_info' => [

            'title' => 'Home Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'home_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'home_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'main_banner_text',
                    'label' => 'Main Banner Text',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'home_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 500px)',
                    'rules' => '',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'middle_section_text',
                    'label' => 'Middle Section Text',
                    'class' => 'form-control m-editor',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'home_middle_banner',
                    'label' => 'Middle Section Banner',
                    'class' => '',
                    'hint' => '(Size : 458px - 596px)',
                    'rules' => '',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'file',
                    'name' => 'home_bottom_banner',
                    'label' => 'Bottom Section Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 310px)',
                    'rules' => '',
                    'preview_class' => 'uploaded-images',
                ],
            ]
        ],
    ],
    'menupage' => [

        'meta_info' => [

            'title' => 'Menu Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'menu_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'menu_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'menu_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'rules' => 'max:500',
                    'preview_class' => 'uploaded-images',
                ],
            ]
        ],
    ],
    'aboutpage' => [

        'meta_info' => [

            'title' => 'About Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'about_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'about_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'about_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'rules' => 'max:500',
                    'preview_class' => 'uploaded-images',
                ],
            ]
        ],
    ],
    'contactpage' => [

        'meta_info' => [

            'title' => 'Contact Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'contact_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'contact_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'google_map_code',
                    'label' => 'Google Map Embed Code (with Iframe)',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'contact_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'rules' => 'max:500',
                    'preview_class' => 'uploaded-images',
                ],
            ]
        ],
    ],
    'termspage' => [

        'meta_info' => [

            'title' => 'Terms Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'terms_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'terms_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'terms_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'terms_page_info',
                    'label' => 'Terms and Conditions',
                    'class' => 'form-control m-editor',
                    'rules' => ''
                ],
            ]
        ],
    ],
    'privacypage' => [

        'meta_info' => [

            'title' => 'Privacy Policy Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'privacy_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'privacy_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'privacy_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'privacy_page_info',
                    'label' => 'Privacy Policy',
                    'class' => 'form-control m-editor',
                    'rules' => ''
                ],
            ]
        ],
    ],
    'faqpage' => [

        'meta_info' => [

            'title' => 'Terms Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'faq_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'faq_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'faq_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'rules' => 'max:500',
                    'preview_class' => 'uploaded-images',
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'faq_list',
                    'label' => 'List of FAQ',
                    'class' => 'form-control m-editor',
                    'rules' => ''
                ],
            ]
        ],
    ],
    'reviewpage' => [

        'meta_info' => [

            'title' => 'Review Page Meta Tags',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'text',
                    'data' => 'string',
                    'name' => 'review_meta_title',
                    'label' => 'Meta Title',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'textarea',
                    'data' => 'string',
                    'name' => 'review_meta_description',
                    'label' => 'Meta Description',
                    'class' => 'form-control',
                    'rules' => ''
                ],
                [
                    'type' => 'file',
                    'name' => 'reviews_main_banner',
                    'label' => 'Main Banner',
                    'class' => '',
                    'hint' => '(Size : 1920px - 265px)',
                    'rules' => 'max:500',
                    'preview_class' => 'uploaded-images',
                ],
            ]
        ],
    ],
    'attributes' => [

        'opt' => [

            'title' => 'Options',
            'desc' => '',

            'elements' => [
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_logo',
                    'label' => 'Restaurant Logo',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_slider',
                    'label' => 'Slider',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_price_range',
                    'label' => 'Price Range',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_cuisine',
                    'label' => 'Cuisine',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_no_of_seats',
                    'label' => 'Number of Seats',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_parking',
                    'label' => 'Is Parking Available',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_delivery',
                    'label' => 'Is Delivery Available',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_takeaway',
                    'label' => 'Is Takeaway Available',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_reservation',
                    'label' => 'Is Reservation Available',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_offline_time',
                    'label' => 'Restaurant Offline Time',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_about_description',
                    'label' => 'Restaurant Description',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_thinks_to_know',
                    'label' => 'Things to know before you go',
                    'rules' => '',
                    'value' => '1',
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'rnt_open_hours',
                    'label' => 'Restaurant Hours',
                    'rules' => '',
                    'value' => '1',
                ],
            ]
        ],
    ],
];

<?php if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_contact-card-bio-avatar',
        'title' => 'Contact card bio + avatar',
        'fields' => array (
            array (
                'key' => 'field_56486f35f93ca',
                'label' => 'Avatar image-ID',
                'name' => 'options_ccard_profilepic',
                'type' => 'number',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_564876be4b605',
                'label' => 'Bio',
                'name' => 'options_ccard_profilebio',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_contact-card-social-networks',
        'title' => 'Contact card social networks',
        'fields' => array (
            array (
                'key' => 'field_56478edb81f95',
                'label' => 'Twitter Label',
                'name' => 'options_ccard_snw_twitterLabel',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_56478f5b81f96',
                'label' => 'Twitter Url',
                'name' => 'options_ccard_snw_twitterUrl',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_564790099a1af',
                'label' => 'LinkedIn Label',
                'name' => 'options_ccard_snw_linkedInLabel',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_564790369a1b1',
                'label' => 'LinkedIn Url',
                'name' => 'options_ccard_snw_linkedInUrl',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5647904e9a1b3',
                'label' => 'Email Label',
                'name' => 'options_ccard_snw_emailLabel',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5647905d9a1b4',
                'label' => 'Email Url',
                'name' => 'options_ccard_snw_emailUrl',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_extern-lank',
        'title' => 'Extern länk',
        'fields' => array (
            array (
                'key' => 'field_56b1c6bca5651',
                'label' => 'Länktext',
                'name' => 'external_linkText',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_56b1c6090c688',
                'label' => 'Url',
                'name' => 'external_linkUrl',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_featured',
        'title' => 'Featured',
        'fields' => array (
            array (
                'key' => 'field_5648dbc7ae234',
                'label' => 'Sätt som featured',
                'name' => 'options_set-featured',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_ingress',
        'title' => 'Ingress',
        'fields' => array (
            array (
                'key' => 'field_56b25a15a68ff',
                'label' => 'Inleding till posten',
                'name' => 'post_preamble',
                'type' => 'wysiwyg',
                'instructions' => '*Frivilligt',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_konfigurera-instagram-konto',
        'title' => 'Konfigurera Instagram konto',
        'fields' => array (
            array (
                'key' => 'field_56b0958e8cd5c',
                'label' => 'User ID',
                'name' => 'options_instagram_userID',
                'type' => 'text',
                'instructions' => 'Instagram-uppgifterna används för att byta toppbilden på sidmallen "Instagram top image". Obs: Instagramkontot måste vara offentligt för att kunna visa bilder.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_56b096038cd5d',
                'label' => 'Client ID',
                'name' => 'options_instagram_clientID',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_resurser',
        'title' => 'Resurser',
        'fields' => array (
            array (
                'key' => 'field_56b08c5bb6aee',
                'label' => 'Credits, källor, länklistor. Etc.',
                'name' => 'postfooter_resources',
                'type' => 'wysiwyg',
                'instructions' => 'Förslag: Börja med H3 och använd vanliga paragrafer så långt det är möjligt.',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_56b9af8ad5f72',
                'label' => 'Lägg resurslistan i en sidopanel — för större skärmar',
                'name' => 'postfooter_resources_sidebar',
                'type' => 'true_false',
                'instructions' => 'Innehållsmängden i innehållet avgör om sidopanelen får plats. Trial and error.',
                'message' => 'Skapa sidopanel',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_table-of-content',
        'title' => 'Table of content',
        'fields' => array (
            array (
                'key' => 'field_56c1bd5776b5e',
                'label' => 'Skapa innehållsförteckning',
                'name' => 'toc',
                'type' => 'true_false',
                'instructions' => 'Lägg till en länkad innehållsförteckning i toppen på inlägget. (Den byggs av inläggets H2-or.)',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array (
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_video-embed',
        'title' => 'Video-embed',
        'fields' => array (
            array (
                'key' => 'field_56b86896677af',
                'label' => 'Kod',
                'name' => 'video_embed_code',
                'type' => 'wysiwyg',
                'instructions' => '*Frivilligt
	Använd <> knappen för att bädda in koden.',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
                array (
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'video',
                    'order_no' => 1,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
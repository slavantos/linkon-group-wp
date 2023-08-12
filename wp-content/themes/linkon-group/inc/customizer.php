<?php 
function test_customizer_addition($wp_customize) {
	
	//section
	$wp_customize->add_section('information_section' , array(
	  'title'    => 'Информация сайта',
	  'priority' => 99,
	));

	//image
	$wp_customize->add_setting('logo', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'default' => '',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label'    => 'Лого',
		'section'  => 'information_section',
		'settings' => 'logo',
	)));

	//string field
	$wp_customize->add_setting('tel-1', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('tel-1', array(
	  'type' => 'input',
	  'section' => 'information_section',
	  'label' => 'Телефон 1',
	));

	//string field
	$wp_customize->add_setting('tel-2', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
  
	$wp_customize->add_control('tel-2', array(
		'type' => 'input',
		'section' => 'information_section',
		'label' => 'Телефон 2',
	));

	//string field
	$wp_customize->add_setting('email', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
  
	$wp_customize->add_control('email', array(
		'type' => 'input',
		'section' => 'information_section',
		'label' => 'Email',
	));

	//image
	$wp_customize->add_setting('instagram', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'default' => '',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'instagram', array(
		'label'    => 'Иконка instagram',
		'section'  => 'information_section',
		'settings' => 'instagram',
	)));

	//string field
	$wp_customize->add_setting('link-instagram', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
  
	$wp_customize->add_control('link-instagram', array(
		'type' => 'input',
		'section' => 'information_section',
		'label' => 'Ссылка instagram',
	));

	//string field
	$wp_customize->add_setting('work-time', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
  
	$wp_customize->add_control('work-time', array(
		'type' => 'input',
		'section' => 'information_section',
		'label' => 'Время работы',
	));

	//section
	$wp_customize->add_section('email-send_section' , array(
		'title'    => 'E-mail для отправки формы',
		'priority' => 99,
	));
	  
	//textarea
	$wp_customize->add_setting('email-send', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'sp_sanitize_textarea',
	));
  
	$wp_customize->add_control('email-send', array(
		'type' => 'textarea',
		'section' => 'email-send_section',
		'label' => 'Email',
	));
  

}

add_action('customize_register', 'test_customizer_addition');

//sanitize checkbox
function sp_sanitize_checkbox($input) {
    if ($input == 1) return 1;
    else return '';   
}

//sanitize textarea
function sp_sanitize_textarea($input){
    return wp_kses_post($input);
}

function sp_sanitize_number($input){
    return intval($input);
}
 ?>
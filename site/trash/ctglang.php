<?php 
$lang['label_accounting'] = '';
$lang['label_audit'] = '';
$lang['label_banking'] = '';
$lang['label_founding'] = '';
$lang['label_investment'] = '';
$lang['label_taxation'] = '';

$lang['label_administration'] = '';
$lang['label_personnel'] = '';
$lang['label_secretary'] = '';
$lang['label_staff'] = '';
$lang['label_top_management'] = '';

$lang['label_art_media_and_communication'] = '';
$lang['label_advertisement'] = '';
$lang['label_art_creative_design'] = '';
$lang['label_entertainment'] = '';
$lang['label_public_relation'] = '';

$lang['label_building_and_construction'] = '';
$lang['label_architect_interior_design'] = '';
$lang['label_civil_building_construction'] = '';
$lang['label_property_real_estate'] = '';
$lang['label_quantity_survey'] = '';

$lang['label_computer_it'] = '';
$lang['label_database_administrator'] = '';
$lang['label_hardware_technician'] = '';
$lang['label_network_administrator'] = '';
$lang['label_programmer'] = '';
$lang['label_software_engineer'] = '';
$lang['label_system_administrator'] = '';
$lang['label_web-masterweb'] = '';
$lang['label_web-seo'] = '';

$lang['label_education_course'] = '';
$lang['label_education'] = '';
$lang['label_research_development'] = '';

$lang['label_engineer'] = '';
$lang['label_chemical_engineering'] = '';
$lang['label_electrical_engineering'] = '';
$lang['label_electronic_engineering'] = '';
$lang['label_environmental_engineering'] = '';
$lang['label_mechanic_automotive'] = '';
$lang['label_petroleum_engineering'] = '';

$lang['label_health'] = '';
$lang['label_doctor_diagnosis'] = '';
$lang['label_pharmacy'] = '';
$lang['label_practiser_medical_assistant'] = '';

$lang['label_hotel_and_restaurant'] = '';
$lang['label_hotel_tourism'] = '';
$lang['label_restaurant_services'] = '';

$lang['label_knowledge'] = '';
$lang['label_agriculture'] = '';
$lang['label_biotechnology'] = '';
$lang['label_chemical'] = '';
$lang['label_flight'] = '';
$lang['label_geology'] = '';
$lang['label_geophysical'] = '';
$lang['label_knowledge_technology'] = '';
$lang['label_nutritionist'] = '';
$lang['label_statistic'] = '';

$lang['label_manufacture'] = '';
$lang['label_maintenance'] = '';
$lang['label_manufacture'] = '';
$lang['label_material_management'] = '';
$lang['label_proses_control'] = '';
$lang['label_qa'] = '';

$lang['label_marketing'] = '';
$lang['label_corporate'] = '';
$lang['label_design_proses_and_control'] = '';
$lang['label_marketing'] = '';
$lang['label_merchandising'] = '';
$lang['label_telemarketing'] = '';

$lang['label_services'] = '';
$lang['label_general_services'] = '';
$lang['label_health_beauty_care'] = '';
$lang['label_law_legal'] = '';
$lang['label_logistic_network_distribution'] = '';
$lang['label_security_army'] = '';

echo '<pre>';
foreach($lang as $key=>$val)
{
	$val = ucwords(str_replace(array('label_', '_'), array('', ' '), $key));
	
	$space = '';
	for($i=strlen($key); $i<46; $i++)
		$space .= ' ';
	
	echo "\$lang['{$key}'] {$space}= '{$val}';\n";
}
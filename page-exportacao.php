<?php
/**
 *Template Name: Página de exportação
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coletivo
 */
 // if (is_user_logged_in()) {
 // 	wp_redirect( get_home_url().'/cadastro-edicao-de-usuarios' );
 //
 // }
 if 	( !current_user_can( 'jurado' ) && !current_user_can( 'administrator' ) ){
	wp_redirect( get_home_url());

}
	$csv_array = array(
						array(
							"email","nome","data_de_nascimento","nacionalidade","genero","nec_esp","recurso_especifico","cep","uf","cidade","bairro","rua","numero","complemento","telefone","formação","conclusao","cau","rg","cpf","como","anexo_rg","anexo_cau","anexo_cpf",
							"nome_do_projeto","tipo_de_inscricao","nome_do_escritorio_ou_coletivo","equipe__autores","colaboradores","autoria_complementares","tipo_de_projeto","localizacao_do_projeto","finalizacao_da_obra","anexo_do_projeto"

									)
							);
	$candidatos = get_users( $args = array('role' => 'candidato') );
	foreach ($candidatos as $candidato ) {
		$user_meta= get_fields('user_'.$candidato->ID);
		// print_r($user_meta);
		$candidato_array = array();
		foreach ($user_meta as $key => $value ) {

			if ($key == 'anexo_rg' || $key == 'anexo_cau' || $key == 'anexo_cpf') {
				$value = $value['url'];
			}
			elseif 	($key == 'senha' || $key == 'confirmacao_da_senha'){
				continue;
			}
			array_push($candidato_array, $value);
			// print_r($meta_keys);

			// $csv .= $value.', ';
		}
		// print_r($list);
		// echo '<br><br>';
		// echo "<pre>";
		// print_r($candidato_array);
		// echo "</pre>";
		$inscricoes = get_posts( array('author' =>  $candidato->ID, 'post_type' => 'bza_inscricoes') );

		if ($inscricoes == array()) {
			array_push($csv_array, $candidato_array);
		}
		else{
			foreach ($inscricoes as $inscricao ) {
				$post_meta=get_fields( $inscricao->ID );
				foreach ($post_meta as $key => $value) {
					if ($key == 'anexo_do_projeto') {
						$value = $value['url'];
					}
					array_push($candidato_array, $value);
				}
				array_push($csv_array, $candidato_array);
			}
		}
	}
	// echo '<br><br>';
	// echo "<pre>";
	// print_r($csv_array);
	// echo "</pre>";
	$fp = fopen('incricoes.csv', 'w');

	foreach ($csv_array as $fields) {
			fputcsv($fp, $fields);
	}

	fclose($fp);
	header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=incricoes.csv');
header('Pragma: no-cache');
readfile("incricoes.csv");
?>

<?php
// Register Custom Post Type
function inscricoes() {

	$labels = array(
		'name'                  => _x( 'Inscrições', 'Post Type General Name', 'bza_inscricoes' ),
		'singular_name'         => _x( 'Projeto', 'Post Type Singular Name', 'bza_inscricoes' ),
		'menu_name'             => __( 'Projetos', 'bza_inscricoes' ),
		'name_admin_bar'        => __( 'Projeto', 'bza_inscricoes' ),
		'archives'              => __( 'Item Archives', 'bza_inscricoes' ),
		'attributes'            => __( 'Item Attributes', 'bza_inscricoes' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bza_inscricoes' ),
		'all_items'             => __( 'All Items', 'bza_inscricoes' ),
		'add_new_item'          => __( 'Add New Item', 'bza_inscricoes' ),
		'add_new'               => __( 'Add new', 'bza_inscricoes' ),
		'new_item'              => __( 'New Item', 'bza_inscricoes' ),
		'edit_item'             => __( 'Edit Item', 'bza_inscricoes' ),
		'update_item'           => __( 'Update Item', 'bza_inscricoes' ),
		'view_item'             => __( 'View Item', 'bza_inscricoes' ),
		'view_items'            => __( 'View Items', 'bza_inscricoes' ),
		'search_items'          => __( 'Search Item', 'bza_inscricoes' ),
		'not_found'             => __( 'Not found', 'bza_inscricoes' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bza_inscricoes' ),
		'featured_image'        => __( 'Featured Image', 'bza_inscricoes' ),
		'set_featured_image'    => __( 'Set featured image', 'bza_inscricoes' ),
		'remove_featured_image' => __( 'Remove featured image', 'bza_inscricoes' ),
		'use_featured_image'    => __( 'Use as featured image', 'bza_inscricoes' ),
		'insert_into_item'      => __( 'Insert into item', 'bza_inscricoes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bza_inscricoes' ),
		'items_list'            => __( 'Items list', 'bza_inscricoes' ),
		'items_list_navigation' => __( 'Items list navigation', 'bza_inscricoes' ),
		'filter_items_list'     => __( 'Filter items list', 'bza_inscricoes' ),

	);
	$args = array(
		'rewrite' => array('slug' => 'inscricoes'),
		'label'                 => __( 'Projeto', 'bza_inscricoes' ),
		'description'           => __( 'Projetos de candidatos', 'bza_inscricoes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'projetos',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'bza_inscricoes', $args );

}
add_action( 'init', 'inscricoes', 0 );



// custom fields
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5a79ea073c751',
	'title' => 'Candidatos',
	'fields' => array (
		array (
			'key' => 'field_5a79e2c58ab9f',
			'label' => 'Nome',
			'name' => 'nome',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3968abac',
			'label' => 'Email',
			'name' => 'email',
			'type' => 'email',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_5a79e721d5c28',
			'label' => 'Senha',
			'name' => 'senha',
			'type' => 'password',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_5a79e72cd5c29',
			'label' => 'Confirmação da senha',
			'name' => 'confirmacao_da_senha',
			'type' => 'password',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_5a79e2d58aba0',
			'label' => 'Data de nascimento',
			'name' => 'data_de_nascimento',
			'type' => 'date_picker',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array (
			'key' => 'field_5a79e2e68aba1',
			'label' => 'Nacionalidade',
			'name' => 'nacionalidade',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e2ee8aba2',
			'label' => 'Genero',
			'name' => 'genero',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Masculino' => 'Masculino',
				'Feminino' => 'Feminino',
				'Homem trans' => 'Homem trans',
				'Mulher trans' => 'Mulher trans',
				'Travesti' => 'Travesti',
				'Intersexo' => 'Intersexo',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5a79e2fd8aba3',
			'label' => 'Possui algum tipo de deficiência?',
			'name' => 'nec_esp',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Não' => 'Não',
				'Física' => 'Física',
				'Visual' => 'Visual',
				'Auditiva' => 'Auditiva',
				'Intelectual' => 'Intelectual',
				'Neuromotora' => 'Neuromotora',
				'Múltiplas' => 'Múltiplas',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5a79e3208aba4',
			'label' => 'Necessita de algum recurso específico? Qual?',
			'name' => 'recurso_especifico',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e33c8aba5',
			'label' => 'CEP',
			'name' => 'cep',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e34b8aba6',
			'label' => 'UF',
			'name' => 'uf',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'AC' => 'AC',
				'AL' => 'AL',
				'AP' => 'AP',
				'AM' => 'AM',
				'BA' => 'BA',
				'CE' => 'CE',
				'DF' => 'DF',
				'ES' => 'ES',
				'GO' => 'GO',
				'MA' => 'MA',
				'MT' => 'MT',
				'MS' => 'MS',
				'MG' => 'MG',
				'PA' => 'PA',
				'PB' => 'PB',
				'PR' => 'PR',
				'PE' => 'PE',
				'PI' => 'PI',
				'RJ' => 'RJ',
				'RN' => 'RN',
				'RS' => 'RS',
				'RO' => 'RO',
				'RR' => 'RR',
				'SC' => 'SC',
				'SP' => 'SP',
				'SE' => 'SE',
				'TO' => 'TO',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5a79e3648aba7',
			'label' => 'Cidade',
			'name' => 'cidade',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3728aba9',
			'label' => 'Endereço completo',
			'name' => 'endereco',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3808abab',
			'label' => 'Telefone',
			'name' => 'telefone',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e39d8abad',
			'label' => 'Instituicao de Formação',
			'name' => 'formação',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3ac8abae',
			'label' => 'Ano de conclusão do curso',
			'name' => 'conclusao',
			'type' => 'date_picker',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'Y',
			'return_format' => 'Y',
			'first_day' => 1,
		),
		array (
			'key' => 'field_5a79e3c48abaf',
			'label' => 'CAU',
			'name' => 'cau',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3cc8abb0',
			'label' => 'RG',
			'name' => 'rg',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3d18abb1',
			'label' => 'CPF',
			'name' => 'cpf',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a79e3f08abb3',
			'label' => 'Anexo RG',
			'name' => 'anexo_rg',
			'type' => 'file',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'png, jpg, pdf',
		),
		array (
			'key' => 'field_5a79e4108abb4',
			'label' => 'Anexo CAU',
			'name' => 'anexo_cau',
			'type' => 'file',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'png, jpg, pdf',
		),
		array (
			'key' => 'field_5a79e41c8abb5',
			'label' => 'Anexo CPF',
			'name' => 'anexo_cpf',
			'type' => 'file',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'png, jpg, pdf',
		),
		array (
			'key' => 'field_5a79e3dc8abb2',
			'label' => 'Como ficou sabendo do prêmio?',
			'name' => 'como',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Escolha uma opção' => 'Escolha uma opção',
				'DIVULGAÇÃO NO AEROPORTO' => 'DIVULGAÇÃO NO AEROPORTO',
				'CAU' => 'CAU',
				'DIVULGAÇÃO NO CINEMA' => 'DIVULGAÇÃO NO CINEMA',
				'FACEBOOK ARCHDAILY' => 'FACEBOOK ARCHDAILY',
				'FACEBOOK INSTITUTO TOMIE OHTAKE' => 'FACEBOOK INSTITUTO TOMIE OHTAKE',
				'FACEBOOK VITRUVIUS' => 'FACEBOOK VITRUVIUS',
				'FOLHA DE SÃO PAULO' => 'FOLHA DE SÃO PAULO',
				'INSTAGRAM ARCHDAILY' => 'INSTAGRAM ARCHDAILY',
				'INSTAGRAM ARCOWEB' => 'INSTAGRAM ARCOWEB',
				'INSTAGRAM INSTITUTO TOMIE OHTAKE' => 'INSTAGRAM INSTITUTO TOMIE OHTAKE',
				'NEWSLETTER ARCHDAILY' => 'NEWSLETTER ARCHDAILY',
				'NEWSLETTER ARCOWEB' => 'NEWSLETTER ARCOWEB',
				'NEWSLETTER INSTITUTO TOMIE OHTAKE' => 'NEWSLETTER INSTITUTO TOMIE OHTAKE',
				'REVISTA PROJETO' => 'REVISTA PROJETO',
				'RÁDIO' => 'RÁDIO',
				'SITE ARCHDAILY' => 'SITE ARCHDAILY',
				'SITE ARCOWEB' => 'SITE ARCOWEB',
				'SITE VITRUVIUS' => 'SITE VITRUVIUS',
				'OUTROS' => 'OUTROS',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'candidato',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5a79ea08c499c',
	'title' => 'Prêmio de arquitetura',
	'fields' => array (
		array (
			'key' => 'field_5a7a261835ce5',
			'label' => 'Nome do projeto',
			'name' => 'nome_do_projeto',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a7a25066ac4e',
			'label' => 'Tipo de inscrição',
			'name' => 'tipo_de_inscricao',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'individual' => 'Individual',
				'escritorio' => 'Escritório',
				'coletivo' => 'Coletivo',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5a7a262835ce6',
			'label' => 'Nome do escritório ou coletivo (se houver)',
			'name' => 'nome_do_escritorio_ou_coletivo',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a7a264635ce7',
			'label' => 'Equipe - autores, colaboradores e funções (se houver)',
			'name' => 'equipe__autores',
			'type' => 'textarea',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array (
			'key' => 'field_5a7a269135ce9',
			'label' => 'Autoria de projetos complementares (se houver)',
			'name' => 'autoria_complementares',
			'type' => 'textarea',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array (
			'key' => 'field_5a7a26c135cea',
			'label' => 'Tipo de projeto',
			'name' => 'tipo_de_projeto',
			'type' => 'select',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'residencial' => 'Residencial',
				'comercial' => 'Comercial',
				'misto' => 'Misto',
				'institucional' => 'Institucional',
				'infraestrutura' => 'Infraestrutura',
				'outros' => 'Outros',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5a7a272a35ceb',
			'label' => 'Localização do projeto',
			'name' => 'localizacao_do_projeto',
			'type' => 'text',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a7a273635cec',
			'label' => 'Finalização da obra',
			'name' => 'finalizacao_da_obra',
			'type' => 'date_picker',
			'value' => NULL,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array (
			'key' => 'field_5a7a276135ced',
			'label' => 'Anexo do projeto (PDF)',
			'name' => 'anexo_do_projeto',
			'type' => 'file',
			'value' => NULL,
			'instructions' => 'Tamanho máximo 30MB',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => 50,
			'mime_types' => 'pdf',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

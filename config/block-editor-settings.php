<?php
/**
 * Gutenberg Colors and Font Sizes.
 *
 */


return [
	'editor-color-palette' => [
		[
			'name'  => __( 'Default Text', 'tm-beans' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'default',
			'color' => '#666',
		],
		[
			'name'  => __( 'Emphasis', 'tm-beans' ),
			'slug'  => 'emphasis',
			'color' => '#333',
		],
		[
			'name'  => __( 'Muted', 'tm-beans' ),
			'slug'  => 'muted',
			'color' => '#999',
		],
		[
			'name'  => __( 'Link', 'tm-beans' ),
			'slug'  => 'link',
			'color' => '#1e87f0',
		],
		[
			'name'  => __( 'Primary', 'tm-beans' ),
			'slug'  => 'primary',
			'color' => '#1e87f0',
		],
		[
			'name'  => __( 'Secondary', 'tm-beans' ),
			'slug'  => 'secondary',
			'color' => '#222',
		],
		[
			'name'  => __( 'Success', 'tm-beans' ),
			'slug'  => 'success',
			'color' => '#32d296',
		],
        [
            'name'  => __( 'Warning', 'tm-beans' ),
            'slug'  => 'warning',
            'color' => '#faa05a',
        ],
        [
            'name'  => __( 'Danger', 'tm-beans' ),
            'slug'  => 'danger',
            'color' => '#f0506e',
        ],
        [
            'name'  => __( 'Inverse', 'tm-beans' ),
            'slug'  => 'inverse',
            'color' => '#fff',
        ],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'tm-beans' ),
			'size' => 14,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'tm-beans' ),
			'size' => 16,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'tm-beans' ),
			'size' => 24,
			'slug' => 'large',
		],
	],
];

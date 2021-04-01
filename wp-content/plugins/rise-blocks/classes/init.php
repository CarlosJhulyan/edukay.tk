<?php
/**
* A class to setting up the things
*
* @see https://wordpress.org/gutenberg/handbook/
* @since 1.0.0
*/

if ( !class_exists( 'Rise_Blocks_Init' ) ) {
    /**
     * Class Rise_Blocks_Init.
     */
    class Rise_Blocks_Init extends Rise_Blocks_Helper{

        /**
        * Register necessarry styles and scripts for plugin
        * Register custom category
        *
        * @access public
        * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/javascript/loading-javascript/
        * @uses register_scripts()
        * @return void
        * @since 1.0.0
        */
        public function __construct(){
            
            add_action( 'enqueue_block_assets', array( __CLASS__, 'common_scripts' ) );
            add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'editor_scripts' ) );
            add_action( 'rest_api_init', array( __CLASS__, 'register_rest_fields' ) );
            add_filter( 'block_categories', array( __CLASS__, 'register_category' ), 10, 2 );
            self::includes( array( 'admin' ) );
            add_action( 'plugins_loaded', array( __CLASS__, 'include_files' ) );

            add_action( 'customize_register', array( __CLASS__, 'customize_register' ) );
        }

        public static function customize_register( $wp_customize ) {

           $wp_customize->add_setting( 'rise-blocks-environment' , array(
               'default'   => 'production',
               'transport' => 'refresh',
           ));

           $wp_customize->add_section( 'rise-blocks-general-section' , array(
               'title'      => __( 'Rise Blocks', 'rise-blocks' ),
               'priority'   => 30,
           ));

           $wp_customize->add_control( 'rise-blocks-environment', array(
                'label' => __( 'Mode', 'rise-blocks' ),
                'type'  => 'select',
                'choices' => array(
                    'production'  => __( 'Production', 'rise-blocks' ),
                    'development' => __( 'Development', 'rise-blocks' )
                ),
                'section' => 'rise-blocks-general-section'
           ));
        }

        public static function include_files(){

            self::includes( array(
                'base',
                'slider',
                'heading',
                'section',
                'call-to-action',
                'blog',
                'counter',
                'icon-boxes',
                'icon-box',
                'profile-cards',
                'profile-card',
                'buttons',
                'button',
                'social-icons',
                'social-icon',
                'accordion',
                'accordion-item',
                'news-1',
                'carousel-post',
            ), 'classes/blocks' );
        }

        /**
         * Register rest fields
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public static function register_rest_fields(){

            # Add comment info.
            register_rest_field(
                'post',
                self::add_prefix( '%prefix_total_comments' ),
                array(
                    'get_callback'    => array( __CLASS__, 'get_total_comment' ),
                    'update_callback' => null,
                    'schema'          => null,
                )
            );

            register_rest_field(
                'post',
                self::add_prefix( '%prefix_categories' ),
                array(
                    'get_callback'    => array( __CLASS__, 'get_categories' ),
                    'update_callback' => null,
                    'schema'          => null,
                )
            );            

            register_rest_field(
                'post',
                self::add_prefix( '%prefix_excerpt' ),
                array(
                    'get_callback'    => array( __CLASS__, 'get_excerpt' ),
                    'update_callback' => null,
                    'schema'          => null,
                )
            );            

            register_rest_field(
                'page',
                self::add_prefix( '%prefix_excerpt' ),
                array(
                    'get_callback'    => array( __CLASS__, 'get_excerpt' ),
                    'update_callback' => null,
                    'schema'          => null,
                )
            );
        }

        /**
        * Register category
        *
        * @access public
        * @uses array_merge
        * @return array
        * @since 1.0.0
        */
        public static function register_category( $categories, $post ) {
            return array_merge( $categories, array(
                array(
                    'slug'  => self::get_prefix(),
                    'title' => esc_html__( 'Rise Blocks', 'rise-blocks' ), 
                ),
            ));
        }

        /**
         * Register Style for banckend and frontend 
         * dependencies { wp-editor }
         * @access public
         * @return void
         * @since 1.0.0
         */
        public static function common_scripts(){

            $scripts = array(
                array(
                    'handler'    => self::add_prefix( '%prefix-common-css' ),
                    'style'      => 'dist/style.css',
                    'dependency' => array( 'wp-editor' ),
                    'version'    => self::get_version()
                ),
                array(
                    'handler'  => 'font-awesome',
                    'style'    => 'dist/vendors/font-awesome/css/font-awesome.css',
                    'version'  => '4.7.0',
                ),
            );

            self::enqueue( $scripts );
        }

        /**
        * Enqueue style for backend editor
        *
        * @access public
        * @uses wp_enqueue_script
        * @uses wp_enqueue_script
        * @return void
        * @since 1.0.0
        */
        public static function editor_scripts(){

            $scripts = array(
                array(
                    'handler'    => self::add_prefix( '%prefix-editor-js' ),
                    'script'     => 'dist/blocks.js',
                    'dependency' => array( 'wp-plugins','wp-edit-post', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor',  'wp-dom-ready', 'wp-data', 'jquery' ),
                    'in_footer'  => false,
                    'version'    => self::get_version()
                ),
                array(
                    'handler'    => self::add_prefix( '%prefix-editor-css' ),
                    'style'      => 'dist/editor.css',
                    'dependency' => array( 'wp-edit-blocks' ),
                    'version'    => self::get_version()
                ),
                array(
                    'handler'  => self::add_prefix( '%prefix-fonts' ),
                    'style'    => '//fonts.googleapis.com/css?family=' . join( '|', self::get_fonts() ) . '&display=swap',
                    'absolute' => true,
                    'minified' => false
                ),
            );

            self::enqueue( $scripts );
            $size = get_intermediate_image_sizes();
            $size[] = 'full';
           
            $l10n = apply_filters( self::add_prefix('%prefix_l10n'), array(
                'image_size' => $size,
                'plugin_path' => self::get_plugin_directory_uri()
            ));
            wp_localize_script( self::add_prefix( '%prefix-editor-js' ), 'Rise_Blocks_VAR', $l10n);
        }
    }

    new Rise_Blocks_Init();
}
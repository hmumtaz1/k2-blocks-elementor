<?php
/**
 * calltoaction class.
 *
 * @category   Class
 * @package    ElementorK2blocks
 * @subpackage WordPress
 * @author     PookiDevs
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorK2blocks\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;

defined( 'ABSPATH' ) || die();

class calltoaction extends Widget_Base {


	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'calltoaction', plugins_url('k2-blocks-elementor/assets/css/calltoaction.css'));
		wp_register_script('calltoaction', plugins_url('k2-blocks-elementor/assets/js/calltoaction.js'),[ 'elementor-frontend' ], '1.0.0', true);
	}

	public function get_style_depends() {
    	return ['calltoaction' ];
    }
    public function get_script_depends() {
        return [ 'calltoaction' ];
    }
	public function get_name() {
		return 'calltoaction';
	}

	public function get_title() {
		return __( 'Call To Action', 'elementor-k2blocks' );
	}

	public function get_icon() {
		return 'fa fa-paragraph';
	}

	public function get_categories() {
		return array( 'basic' );
	}
	public  function get_button_sizes() {
    		return [
    			'xs' => __( 'Extra Small', 'elementor_k2blocks' ),
    			'sm' => __( 'Small', 'elementor_k2blocks' ),
    			'md' => __( 'Medium', 'elementor_k2blocks' ),
    			'lg' => __( 'Large', 'elementor_k2blocks' ),
    			'xl' => __( 'Extra Large', 'elementor_k2blocks' ),
    		];
    	}


	protected function _register_controls() {


        $this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Layout', 'elementor-k2blocks' ),
			)
		);

        $this->add_control(
			'layout',
			[
				'label' => __( 'Choose Layout', 'elementor_k2blocks' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'elementor_k2blocks' ),
					'classic' => __( 'Classic', 'elementor_k2blocks' ),
					'cover' => __( 'Cover', 'elementor_k2blocks' ),
					'traditional' => __('Traditional', 'elementor_k2blocks'),

				],
			]
		);

		$this->end_controls_section();
$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'elementor' ),
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Type', 'elementor_k2blocks' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor_k2blocks' ),
					'info' => __( 'Info', 'elementor_k2blocks' ),
					'success' => __( 'Success', 'elementor_k2blocks' ),
					'warning' => __( 'Warning', 'elementor_k2blocks' ),
					'danger' => __( 'Danger', 'elementor_k2blocks' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'elementor_k2blocks' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'elementor_k2blocks' ),
				'placeholder' => __( 'Click me', 'elementor_k2blocks' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor_k2blocks' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor_k2blocks' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor_k2blocks' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor_k2blocks' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor_k2blocks' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor_k2blocks' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor_k2blocks' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor_k2blocks' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor_k2blocks' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor_k2blocks' ),
					'right' => __( 'After', 'elementor_k2blocks' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor_k2blocks' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor_k2blocks' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', 'elementor_k2blocks' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor_k2blocks' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor_k2blocks' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor_k2blocks' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_background_color',
			[
				'label' => __( 'Background Color', 'elementor_k2blocks' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor_k2blocks' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor_k2blocks' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor_k2blocks' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor_k2blocks' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'elementor_k2blocks' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor_k2blocks' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor_k2blocks' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor_k2blocks' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'Content',
			array(
				'label' => __( 'Content', 'elementor-k2blocks' ),
			)
		);
//         $this->add_control(
// 			'text',
// 			array(
// 				'label'   => __( 'Button Content', 'elementor-k2blocks' ),
// 				'type'    => Controls_Manager::TEXT,
// 				'default' => __( 'Button','elementor-k2blocks' ),
// 			)
// 		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-k2blocks' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title here', 'elementor-k2blocks' ),
			)
		);

        $this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'elementor-k2blocks' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => __( 'Content','elementor-k2blocks' ),
			)
		);

		$this->add_control(
        	'image',
        	array(
            	'label' => __( 'Choose Image', 'elementor-k2blocks' ),
        		'type' => Controls_Manager::MEDIA,

           		'default' => [
           		    'url' => \Elementor\Utils::get_placeholder_image_src(),
          		]
        	)
        );

        $this->end_controls_section();

		$this->start_controls_section(
        	'heading_typography',
        	array(
        	    'label' => __( 'Heading','elementor-k2blocks' ),
        	    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        		)
        	);

            $this->add_control(
                'heading_color',
            		[
            		    'label' => __( 'Color', 'elementor-k2blocks' ),
            		    'type' => Controls_Manager::COLOR,
                        'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
            		],
            		'selectors' => [
            		'{{WRAPPER}} .cta-heading' => 'color: {{VALUE}}',
           			],
               	]
            );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'elementor-k2blocks' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cta-heading',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'elementor-k2blocks' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cta-heading',
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
        	'paragraph_typography',
        	array(
        	    'label' => __( 'Text','elementor-k2blocks' ),
        	    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        		)
        	);
            $this->add_control(
                'content_color',
            		[
            		    'label' => __( 'Color', 'elementor-k2blocks' ),
            		    'type' => Controls_Manager::COLOR,
                        'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
            		],
            		'selectors' => [
            		    '{{WRAPPER}} .cta-content' => 'color: {{VALUE}}',
           			],
               	]
            );


        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'para_background',
				'label' => __( 'Background', 'elementor-k2blocks' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cta-content',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'para_content_typography',
				'label' => __( 'Typography', 'elementor-k2blocks' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cta-content',
			]
		);

        $this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute(
		    'title',
		    [
		        'class' => ['cta-heading'],
		    ]
		);
		$this->add_inline_editing_attributes( 'content', 'none' );
        $this->add_render_attribute(
		    'content',
		    [
		        'class' => ['cta-content'],
		    ]
		);
		$this->add_inline_editing_attributes('image','none');
		$this->add_render_attribute(
		    'image',
		    [
		        'class' => ['cta-img'],
		    ]
		);
		$this->add_inline_editing_attributes('text','advanced');
        $this->add_render_attribute(
   		    'text',
   		    [
   		        'class' => ['cta-btn','elementor-button-text'],
   		    ]
   		);
        $this->add_render_attribute( 'btn-wrapper', 'class', 'elementor-button-wrapper' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}

		$this->add_render_attribute( 'button', 'class', 'elementor-button' );

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}



        if($settings['layout']==='default'){ ?>
		    <div class="cta-wrapper">
                 <div class="cta-content-container">
                     <div class="cta-content-wrapper">
                         <div class="cta-content-heading " >
                	       <h2
                		        <?php echo $this->get_render_attribute_string( 'title' ); ?>>
                		        <?php echo $settings['title'] ?>
                		      </h2>
                	   	 </div>
                	   	 <div class="cta-content-description ">
                           <div
                               <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                               <?php echo $settings['content'] ?>
                           </div>
                         </div>
                	 </div>
                    <div <?php echo $this->get_render_attribute_string( 'btn-wrapper' ); ?>>
                        <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                            <?php $this->render_text(); ?>
                        </a>
                    </div>

                 </div>
                 <div class="cta-media-container">
                     <img  class="cta-img" <?php echo $this->get_render_attribute_string( 'image' ); ?> src=<?php echo $settings['image']['url'] ?>/>
                 </div>
            </div>


        <?php }

        else if($settings['layout']==='classic'){?>
            <div class="cta-wrapper">
                 <div class="cta-media-container" >
                    <img  class="cta-img" <?php echo $this->get_render_attribute_string( 'image' ); ?> src=<?php echo $settings['image']['url'] ?>/>
                 </div>
                 <div class="cta-content-container ">
                     <div class="cta-content-wrapper">
                         <div class="cta-content-heading " >
                	          <h2
                		        <?php echo $this->get_render_attribute_string( 'title' ); ?>>
                		        <?php echo $settings['title'] ?>
                		      </h2>
                	   	 </div>
                	   	 <div class="cta-content-description ">
                             <div
                                <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                                <?php echo $settings['content'] ?>
                         </div>
                     </div>
                     <div <?php echo $this->get_render_attribute_string( 'btn-wrapper' ); ?>>
                            <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                                <?php $this->render_text(); ?>
                            </a>
                     </div>
                 </div>


            </div>

           <?php }
           else if($settings['layout']==='cover'){?>
            <div class="container">
             <img  <?php echo $this->get_render_attribute_string( 'image' );?>  src=<?php echo $settings['image']['url'] ?>  />
            <div class="text-block">
                <h2  <?php echo $this->get_render_attribute_string( 'title' ); ?>>
                      <?php echo $settings['title'] ?>
                </h2>
                <div  <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                      <?php echo $settings['content'] ?>
                </div>
                <div <?php echo $this->get_render_attribute_string( 'btn-wrapper' ); ?>>
                      <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                        <?php $this->render_text(); ?>
                      </a>
                </div>
            </div>
       </div>


          <?php }
          else if($settings['layout']==='traditional'){
          ?>
            <div class="cta-traditional-wrapper">
                <div class="cta-traditional-img">
                    <img  <?php echo $this->get_render_attribute_string( 'image' );?>  src=<?php echo $settings['image']['url'] ?>  />
                </div>
                <div class="cta-traditional-content">
                    <h2  <?php echo $this->get_render_attribute_string( 'title' ); ?>>
                          <?php echo $settings['title'] ?>
                    </h2>
                    <div  <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                          <?php echo $settings['content'] ?>
                    </div>

                    <div <?php echo $this->get_render_attribute_string( 'btn-wrapper' ); ?>>
                          <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                               <?php $this->render_text(); ?>
                          </a>
                    </div>
                </div>


            </div>

          <?php } ?>

		<?php
	}

	protected function _content_template() {
		?>
		<#
            view.addRenderAttribute( 'text', 'class', 'elementor-button-text' );

		    view.addInlineEditingAttributes( 'text', 'none' );
            view.addInlineEditingAttributes( 'title', 'basic' );
            view.addRenderAttribute(
                'title',
                [
                    'class:' ['cta-heading'],
                ]
            );
            view.addInlineEditingAttributes( 'content', 'none' );
            view.addRenderAttribute(
                 'content',
                 [
                    'class:' ['cta-content']
                 ]
             );
            view.addInlineEditingAttributes( 'image', 'none' );
            view.addRenderAttribute(
                'image',
                [
                    'class:' ['cta-img'],
                ]
           );#>
        <#
        if(settings.layout==='default'){ #>
         <div class="cta-wrapper">
               <div class="cta-content-container">
                    <div class="cta-content-wrapper">
                         <div class="cta-content-heading ">
                               <h2  {{{ view.getRenderAttributeString( 'title' ) }}}>
                                      {{{ settings.title }}}
                               </h2>
                         </div>
                         <div class="cta-content-description">
                             <div   {{{ view.getRenderAttributeString( 'content' ) }}}>
                                    {{{ settings.content }}}
                             </div>
                         </div>

                    </div>
                    <div class="elementor-button-wrapper">
                        <a class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
                            <span class="elementor-button-content-wrapper">
                                <# if ( settings.icon ) { #>
                                <span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
                                    <i class="{{ settings.icon }}" aria-hidden="true"></i>
                                </span>
                                <# } #>
                                <span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
                            </span>
                        </a>
                    </div>
               </div>
               <div class="cta-media-container">
                     <img class="cta-img" {{{ view.getRenderAttributeString( 'image' )}}} src={{{settings.image.url}}}  />
               </div>
         </div>
       <# }
        else if(settings.layout==='classic'){#>
            <div class="cta-wrapper">
                        <div class="cta-media-container">
                           <img class="cta-img" {{{ view.getRenderAttributeString( 'image' )}}} src={{{settings.image.url}}}  />
                        </div>
                          <div class="cta-content-container">
                               <div class="cta-content-wrapper">
                                  <div class="cta-content-heading ">
                                      <h2  {{{ view.getRenderAttributeString( 'title' ) }}}>
                                          {{{ settings.title }}}
                                      </h2>
                               </div>
                              <div class="cta-content-description">
                                    <div   {{{ view.getRenderAttributeString( 'content' ) }}}>
                                          {{{ settings.content }}}
                                      </div>
                              </div>
                           </div>
            <div class="elementor-button-wrapper">
                        <a class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
                            <span class="elementor-button-content-wrapper">
                                <# if ( settings.icon ) { #>
                                <span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
                                    <i class="{{ settings.icon }}" aria-hidden="true"></i>
                                </span>
                                <# } #>
                                <span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
                            </span>
                        </a>
                    </div>

                      </div>
       <# }
       else if(settings.layout==='cover'){#>
       <div class="container">
             <img  {{{ view.getRenderAttributeString( 'image' )}}} src={{{settings.image.url}}}  />
            <div class="text-block">
                <h2  {{{ view.getRenderAttributeString( 'title' ) }}}>
                    {{{ settings.title }}}
                </h2>
                <div  {{{ view.getRenderAttributeString( 'content' ) }}}>
                    {{{ settings.content }}}
                </div>
                <div class="elementor-button-wrapper">
                     <a class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
                          <span class="elementor-button-content-wrapper">
                                <# if ( settings.icon ) { #>
                                <span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
                                    <i class="{{ settings.icon }}" aria-hidden="true"></i>
                                 </span>
                                 <# } #>
                          <span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
                                 </span>
                     </a>
                </div>
            </div>
       </div>
		<# }
		else if(settings.layout==='traditional'){#>

		<div class="cta-traditional-wrapper">
		    <div class="cta-traditional-img">
                  <img  {{{ view.getRenderAttributeString( 'image' )}}} src={{{settings.image.url}}}  />
             </div>
             <div class="cta-traditional-content">
                  <h2  {{{view.getRenderAttributeString('title')}}} >
                    {{{ settings.title }}}
                  </h2>
                  <div  {{{ view.getRenderAttributeString('content') }}} >
                       {{{ settings.content }}}
                  </div>
                <div class="elementor-button-wrapper">
                       <a class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
                              <span class="elementor-button-content-wrapper">
                                <# if ( settings.icon ) { #>
                                    <span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
                                         <i class="{{ settings.icon }}" aria-hidden="true"></i>
                                    </span>
                              <# } #>
                              <span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
                                   </span>
                       </a>
                 </div>
             </div>

        </div>

		<# } #>

		<?php
	}
	protected function render_text() {
    		$settings = $this->get_settings();
    		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );
    		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align'] );
    		$this->add_render_attribute( 'icon-align', 'class', 'elementor-button-icon' );

    		$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );

    		$this->add_inline_editing_attributes( 'text', 'none' );
    		?>
    		<span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
    			<?php if ( ! empty( $settings['icon'] ) ) : ?>
    			<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
    				<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
    			</span>
    			<?php endif; ?>
    			<span <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></span>
    		</span>
    		<?php
    	}
}

<?php

if( ! class_exists('xa_msm_shipping_rates_processor') )
{
	class xa_msm_shipping_rates_processor{
		var $settings;
		public function __construct() {
			$this->settings = get_option('xa_msm_shipping_addon_rate_role_matrix');

			add_filter( 'woocommerce_package_rates', array($this,'xa_msm_process_shipping_role_matrix'), 10, 2);
		}

		public function xa_msm_process_shipping_role_matrix($available_shipping_methods, $package){
			$cart_zone = $this->xa_msm_find_zone($package);
			$this->debug( 'Cart Zones: <pre>'.print_r($cart_zone,1).'</pre>' );

			$cart_shipping_classes = $this->xa_get_all_cart_shipping_classes($package);
			$this->debug( 'Cart Shipping Classes: <pre>'.print_r($cart_shipping_classes,1).'</pre>' );

			$filtered_row = $this->xa_filter_rows( $cart_zone, $cart_shipping_classes );
			$this->debug( 'Filtered Row: <pre>'.print_r($filtered_row,1).'</pre>' );

			if(!empty($this->settings['rate_section_1']['break_on_first_occurance'])){
				$this->debug( 'break on first occurance' );
				$filtered_row = array($filtered_row[0]);
			}

			$available_shipping_methods = $this->xa_process_rows($filtered_row , $available_shipping_methods);
			return $available_shipping_methods; 
		}

		public function xa_process_rows($filtered_row, $available_shipping_methods ) {
			$shipping_methods =array();
			foreach( $filtered_row as $key => $rule ) {
				$shipping_methods = array_merge($shipping_methods, explode(';', $rule['shipping_method'] ));
			}

			$this->debug( 'Final shipping_methods to hide: <pre>'.print_r($shipping_methods,1).'</pre>' );

			if( !empty($shipping_methods) ) {
				foreach ($shipping_methods as $shipping_method) {
					if(!empty($shipping_method)){
						$available_shipping_methods = $this->xa_hide_shipping_method($available_shipping_methods, $shipping_method);
					}
				}
			}
			return $available_shipping_methods;
		}

		private function xa_hide_shipping_method($available_shipping_methods, $method_name){
			foreach ($available_shipping_methods as $shipping_method => $value) {
				if( strpos( $shipping_method, $method_name ) !== false ) {
					unset($available_shipping_methods[$shipping_method]);
				}
			}
			return $available_shipping_methods;
		}

		public function xa_filter_rows( $matching_zone, $matching_shipping_classes ) {
			$matching_row = array();
			if( !empty($this->settings['rate_section_2'] ) ){
				foreach( $this->settings['rate_section_2'] as $row_num => $row ) {
					if( ( empty($row['shipping_zone']) || in_array( $row['shipping_zone'], $matching_zone) )  && ( empty($row['shipping_class']) || in_array(strtolower($row['shipping_class'] ),$matching_shipping_classes) ) ){
						$matching_row[] = $row;
					}

				}
			}
			return $matching_row;
		}


		public function xa_msm_find_zone($package){
			$matching_zones=array();		
			if( class_exists('WC_Shipping_Zones') ){
				$zones_obj = new WC_Shipping_Zones;
				$matches = $zones_obj::get_zone_matching_package($package);
				if( method_exists ( $matches, 'get_id' ) ){
					$zone_id = $matches->get_id();
				}else{
					$zone_id =  $matches->get_zone_id();
				}
				array_push( $matching_zones, $zone_id );
			}
			return $matching_zones;
		}


		public function xa_get_all_cart_shipping_classes( $package=array() ){
			$shipping_class_in_cart = array();
			foreach( $package['contents'] as $key => $values) {
				$shipping_class_in_cart[] = $values['data']->get_shipping_class();
			}
			return $shipping_class_in_cart;
		}


		public function debug( $message, $type = 'notice' ) {
			if ( XA_MSM_DEBUG=='on' ) {
				wc_add_notice( $message, $type );
			}
		}
	}
}
new xa_msm_shipping_rates_processor;

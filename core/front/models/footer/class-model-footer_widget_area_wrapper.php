<?php
class TC_footer_widget_area_wrapper_model_class extends TC_Model {
  public $key;
  public $class;

  /*
  * @override
  * fired before the model properties are parsed
  * 
  * return model params array() 
  */
  function tc_extend_params( $model = array() ) {
    $n_footer_widgets = count( apply_filters( 'tc_footer_widgets', TC_init::$instance -> footer_widgets ) );
    $model['class'] = $n_footer_widgets ? array('span' . 12/$n_footer_widgets) : array();
    $model['key']   = isset( $model['params']['key'] ) ? $model['params']['key'] : 'footer_one';
    return $model;
  }

  /**
  * parse this model properties for rendering
  */
  function pre_rendering_my_view_cb( $model ) {
    $model -> class = join( ' ', array_unique( $model -> class ) );
  }

}

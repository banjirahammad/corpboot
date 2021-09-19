<?php
  namespace App\Classes;
  /**
   *this calss for show message any where in admin panel
   */
  class ShowMessage
  {

    public function showMessage($class,$type,$msg)
    {
      $output = '';
      $output .= '<div class="alert alert-'.$class.' alert-dismissible" id="input_box_wrong" role="alert">';
      $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
      $output .= '<span aria-hidden="true">&times;</span>';
      $output .= '</button>';
      $output .= '<strong>'.$type.'! </strong>'.$msg;
      $output .= '</div>';

      return $output;
    }


  }

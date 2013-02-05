<?php
/**
 * Append
 *
 * Renders all basic input types
 * 
 * USAGE:
 * {{Former::append("email", "Email")->with_icon('icon-envelope')}}
 * {{Former::append("email", "Email")->with_button('go')}}
 * {{Former::append("email2", "Email")->with_labeled_icon('email2', 'icon-envelope')}}
 * {{Former::append("email2", "Email")->with_label('email2', '@')}}
 */
namespace Former\Fields;

use \Form;
use \Former\Helpers;

class Append extends \Former\Fields\Input
{
  /**
   * Current icon
   * @var string
   */
  private $append = null;

  public function __construct($type, $name, $label, $value, $attributes)
  {
    $type='text';

    parent::__construct($type, $name, $label, $value, $attributes);
  }

  /**
   * Append a button
   *
   * @param  string $element    button text
   */
  public function with_button($element)
  {
    $this->append = '<button type="button" class="btn">'.$element.'</button>';
  }

  /**
   * Append an icon
   *
   * @param  string $icon    icon name
   */
  public function with_icon($icon)
  {
    $this->append = '<span class="add-on"><i class="'.$icon.'"></i></span>';
  }

  /**
   * Append a label for
   *
   * @param  string $label_for    id of the element to label
   * @param  string $label        Label text
   */
  public function with_label($label_for, $label)
  {
    $this->append = '<span class="add-on"><label for="'.$label_for.'">'.$label.'</label></span>';
  }

  /**
   * Append a label for
   *
   * @param  string $label_for    id of the element to label
   * @param  string $icon         icon name
   */
  public function with_labeled_icon($label_for, $icon, $attributes = array())
  {
    $this->append = '<span class="add-on"><label for="'.$label_for.'"><i class="'.$icon.'" '.\HTML::attributes($attributes).'></i></label></span>';
  }

  /**
   * Append text or whatever can be wrapped as add-on
   *
   * @param  array $datalist An array to use a source
   */
  public function with_addon($addon)
  {
    $this->append = '<span class="add-on">'.$addon.'</span>';
  }

  /**
   * Prints out the current tag
   *
   * @return string An input tag
   */
  public function __toString()
  {
    // Render main input
    $input = parent::__toString();

    if ($this->append) {
      $div ='<div class="input-append">'.$input.PHP_EOL.$this->append.'</div>';
      $input = $div;
    }

    return $input;
  }
}

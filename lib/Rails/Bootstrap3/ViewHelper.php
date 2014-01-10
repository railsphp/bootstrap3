<?php
namespace Rails\Bootstrap3;

/**
 * Helper for Bootstrap 3
 */
class ViewHelper extends \Rails\ActionView\Helper
{
    public function btnLinkTo($text, $url, $color = null, array $attrs = [])
    {
        if (is_array($color)) {
            $attrs = $color;
            $this->ensureArray($attrs);
            $attrs['class'][] = 'btn-default';
        } elseif ($color) {
            $this->ensureArray($attrs);
            $attrs['class'][] = $this->btnColorToClass($color);
        } else {
            $this->ensureArray($attrs);
            $attrs['class'][] = 'btn-default';
        }
        
        $attrs['class'][] = 'btn';
        
        return $this->linkTo($text, $url, $attrs);
    }
    
    public function glyphicon($name, array $attrs = [])
    {
        return $this->contentTag('span', '', array_merge_recursive($attrs, ['class' => 'glyphicon glyphicon-' . $name]));
    }
    
    public function colorGlyph($color, $name, array $attrs = [])
    {
        if (empty($attrs['style'])) {
            $attrs['style'] = 'color:' . $color . ';';
        } else {
            $attrs['style'] = rtrim($attrs['style'], ' ;') . '; color: ' . $color . ';';
        }
        return $this->contentTag('span', '', array_merge_recursive($attrs, ['class' => 'glyphicon glyphicon-' . $name]));
    }
    
    public function btn($text, $color = null, array $attrs = [])
    {
        if ($attrs) {
            $this->ensureArray($attrs);
        } elseif (is_array($color)) {
            $attrs = $color;
            $color = null;
            $this->ensureArray($attrs);
            $attrs['class'][] = 'btn-default';
        }
        
        $attrs['class'][] = 'btn';
        
        if ($color) {
            $attrs['class'][] = $this->btnColorToClass($color);
        }
        
        if (empty($attrs['type'])) {
            $attrs['type'] = 'button';
        }
        
        return $this->contentTag('button', $text, $attrs);
    }
    
    public function submitBtn($text, $color = null, array $attrs = [])
    {
        if (is_array($color)) {
            $color['type'] = 'submit';
        } else {
            $attrs['type'] = 'submit';
        }
        return $this->btn($text, $color, $attrs);
    }
    
    protected function ensureArray(&$arr, $index = 'class')
    {
        if (isset($arr[$index])) {
            $arr[$index] = (array)$arr[$index];
        } else {
            $arr[$index] = [];
        }
    }
    
    protected function btnColorToClass($color)
    {
        switch ($color) {
            case 'blue':
                return 'btn-primary';
            case 'red':
                return 'btn-danger';
            case 'orange':
                return 'btn-warning';
            case 'green':
                return 'btn-success';
            case 'aqua':
                return 'btn-info';
            case 'black':
                return 'btn-inverse';
        }
    }
}

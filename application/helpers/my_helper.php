<?php

function h($h)
{
    if ( is_array($h) )
        return array_map('h', $val);
    return htmlentities($h,ENT_QUOTES);
}

function p($x)
{
    $ci =& get_instance();
    return $ci->input->post($x);
}

function g($x)
{
    $ci =& get_instance();
    return $ci->input->get($x);
}

function r($x)
{
    $ci =& get_instance();
    return $ci->input->get_post($x);
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_ajax()
{
	return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function json_response( $json, $status=200 )
{
	if ($status != 200) header('HTTP/1.1 ' . $status);
	header('Content-type: application/json; charset=UTF-8');
	echo json_encode( $json );
	exit;
}

function flashmsg_set($msg)
{
    if (!isset($_SESSION))
        @session_start();
    $_SESSION['_flashmsg'] = $msg;
}

function flashmsg_get()
{
    if (!isset($_SESSION))
        @session_start();
    $msg = isset($_SESSION['_flashmsg']) ? $_SESSION['_flashmsg'] : null;
    if (!is_null($msg)) unset($_SESSION['_flashmsg']);
    return $msg;
}

function auto_code($prefix)
{
    $ci  = & get_instance();
    $ci->db->query("INSERT INTO auto_code (prefix, sequence) VALUES ( ?, 1 ) ON DUPLICATE KEY UPDATE sequence  =  sequence + 1", array($prefix));
    $result  =  $ci->db->query("SELECT sequence FROM auto_code WHERE prefix  =  ?", array($prefix));
    $row  =  $result->row();
    $result  =  strtoupper($prefix) . '-' . str_pad($row->sequence, 5, '0', STR_PAD_LEFT);
    return $result;
}

function fix_float( $array )
{
    if ( is_array( $array ) )
    {
        foreach( $array as $k => $v )
        {
            $array[$k] = fix_float($v);
        }
        return $array;
    }
    else
    {
        return is_float($array) ? round($array,2) : $array;
    }
}

function parse_filter( $filter, $columns=array(), $table='' )
{
    $ci =& get_instance();
    
    if ($table) $table .= ".";
    if ($filter)
    {
        $filter = json_decode($filter);
        if ( $filter && is_array($filter) )
        {
            $first = false;
            
            foreach( $filter as $f )
            {
                if (is_null($f->value)) continue;
                
                if ( isset($f->property) )
                {
                    //search mode
                    if ( !in_array($f->property, $columns ) )
                        continue;
                    
                    //$words = array_unique(array_filter(array_map('trim', explode(' ',$f->value))));
                    //foreach( $words as $word )
                    //{
                        if ( !$first )
                            $ci->db->like( $table.$f->property, $f->value );
                        else
                            $ci->db->or_like( $table.$f->property, $f->value );
                    //}
                }
                else if ( isset($f->field) )
                {
                    //filter mode
                    if ( !in_array($f->field, $columns ) )
                        continue;
                    
                    if ( isset($f->type) && $f->type == 'numeric' ) {
                        switch( $f->comparison ) {
                            case 'lt':
                                $ci->db->where( $table.$f->field.' < ', $f->value );
                                break;
                            case 'gt':
                                $ci->db->where( $table.$f->field.' > ', $f->value );
                                break;
                            default:
                                $ci->db->where( $table.$f->field, $f->value );
                        }
                    } else if ( isset($f->type) && $f->type == 'boolean' ) {
                        $ci->db->where( $table.$f->field, $f->value );
                    } else {
                        if ( !$first )
                            $ci->db->like( $table.$f->field, $f->value);
                        else
                            $ci->db->or_like( $table.$f->field, $f->value);
                    }
                }
            }
        }
    }
    
    return $ci->db;
}

function parse_filter2( $filter, $columns=array(), $table='' )
{
    $ci =& get_instance();
    
    if ($table) $table .= ".";

    $where = "";
    
    if ($filter)
    {
        $filter = json_decode($filter);
        if ( $filter && is_array($filter) )
        {
            $first = false;
            
            foreach( $filter as $f )
            {
                if (is_null($f->value)) continue;
                
                if ( isset($f->property) )
                {
                    //search mode
                    if ( !in_array($f->property, $columns ) )
                        continue;
                    
                    //$words = array_unique(array_filter(array_map('trim', explode(' ',$f->value))));
                    //foreach( $words as $word )
                    //{
                        if ( !$first )
                            $where .= " AND $table".$f->property." LIKE ".$ci->db->escape("%".$f->value."%");
                        else
                            $where .= " OR $table.".$f->property." LIKE ".$ci->db->escape("%".$f->value."%");
                    //}
                }
                else if ( isset($f->field) )
                {
                    //filter mode
                    if ( !in_array($f->field, $columns ) )
                        continue;
                    
                    if ( isset($f->type) && $f->type == 'numeric' ) {
                        switch( $f->comparison ) {
                            case 'lt':
                                $where .= " AND $table".$f->field." < ".$ci->db->escape($f->value);
                                break;
                            case 'gt':
                                $where .= " AND $table".$f->field." > ".$ci->db->escape($f->value);
                                break;
                            default:
                                $where .= " AND $table".$f->field." = ".$ci->db->escape($f->value);
                        }
                    } else if ( isset($f->type) && $f->type == 'boolean' ) {
                        $where .= " AND $table".$f->field." = ".$ci->db->escape($f->value);
                    } else {
                        if ( !$first )
                            $where .= " AND $table".$f->property." LIKE ".$ci->db->escape("%".$f->value."%");
                        else
                            $where .= " OR $table.".$f->property." LIKE ".$ci->db->escape("%".$f->value."%");
                    }
                }
            }
        }
    }
    
    return $where;
}

function parse_sort($sort, $columns, $table='')
{
    $ci =& get_instance();
    if ($table) $table .= ".";

    if ( $sort )
    {
        $sort = json_decode($sort);
        if ( $sort && is_array($sort) )
        {
            foreach($sort as $s)
            {
                if ( !in_array($s->property, $columns) )
                    continue;
                $ci->db->order_by( $table.$s->property, $s->direction );
            }
        }
    }
    
    return $ci->db;
}

function parse_sort2($sort, $columns, $table='')
{
    $ci =& get_instance();
    if ($table) $table .= ".";
    
    $order = '';
    
    if ( $sort )
    {
        $sort = json_decode($sort);
        if ( $sort && is_array($sort) )
        {
            foreach($sort as $s)
            {
                if ( !in_array($s->property, $columns) )
                    continue;
                $order .= ($order ? "," : "") . $table.$s->property . " " . $s->direction;
            }
        }
    }
    
    return $order ? "ORDER BY $order" : "";
}


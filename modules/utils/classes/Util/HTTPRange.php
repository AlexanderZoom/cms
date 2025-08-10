<?php defined('SYSPATH') or die('No direct script access.');
class Util_HTTPRange {
    public static function parse($entity_body_length, $range_header)
    {
        $range_list = array();
    
        if ($entity_body_length == 0) {
            return false; // mark unsatisfiable
        }
    
        // The only range unit defined by HTTP/1.1 is "bytes". HTTP/1.1
        // implementations MAY ignore ranges specified using other units.
        // Range unit "bytes" is case-insensitive
        if (preg_match('/^bytes=([^;]+)/i', $range_header, $match)) {
            $range_set = $match[1];
        } else {
            return false;
        }
    
        // Wherever this construct is used, null elements are allowed, but do
        // not contribute to the count of elements present. That is,
        // "(element), , (element) " is permitted, but counts as only two elements.
        $range_spec_list = preg_split('/,/', $range_set, null, PREG_SPLIT_NO_EMPTY);
    
        foreach ($range_spec_list as $range_spec) {
            $range_spec = trim($range_spec);
    
            if (preg_match('/^(\d+)\-$/', $range_spec, $match)) {
                $first_byte_pos = $match[1];
    
                if ($first_byte_pos > $entity_body_length) {
                    continue;
                }
    
                $first_pos = $first_byte_pos;
                $last_pos = $entity_body_length - 1;
            } elseif (preg_match('/^(\d+)\-(\d+)$/', $range_spec, $match)) {
                $first_byte_pos = $match[1];
                $last_byte_pos = $match[2];
    
                // If the last-byte-pos value is present, it MUST be greater than or
                // equal to the first-byte-pos in that byte-range-spec
                if ($last_byte_pos < $first_byte_pos) {
                    return false;
                }
    
                $first_pos = $first_byte_pos;
                $last_pos = min($entity_body_length - 1, $last_byte_pos);
            } elseif (preg_match('/^\-(\d+)$/', $range_spec, $match)) {
                $suffix_length = $match[1];
    
                if ($suffix_length == 0) {
                    continue;
                }
    
                $first_pos = $entity_body_length - min($entity_body_length, $suffix_length);
                $last_pos = $entity_body_length - 1;
            } else {
                return false;
            }
    
            $range_list[] = array($first_pos, $last_pos);
        }
    
        return $range_list;
    }
}
<?php
/**
 * Pricing
 * @package content-pricing
 * @version 0.0.1
 */

namespace ContentPricing\Model;

class Pricing extends \Mim\Model
{

    protected static $table = 'pricing';

    protected static $chains = [];

    protected static $q = [];

    static function countUnpriced(string $type, object $conf, int $user=null): int{
        $o_model = $conf->model;
        $o_table = $o_model::getTable();
        $o_f_id  = $conf->fields->id;
        $o_f_user= $conf->fields->user;

        $p_table = self::getTable();

        $s_type  = self::escape($type);

        $sql   = "
            SELECT COUNT(*) `total`
            FROM `$o_table` `o`
                LEFT JOIN `$p_table` `p`
                    ON `o`.`$o_f_id` = `p`.`object`
                        AND `p`.`type` = '$s_type'
            WHERE `p`.`id` IS NULL";

        if($user)
            $sql.= " AND `o`.`$o_f_user` = '$user'";

        $result = self::query($sql, 'read');

        return $result[0]->total ?? 0;
    }

    static function getUnpriced(string $type, object $conf, int $user=null, int $rpp=12, int $page=1): array{
        $o_model = $conf->model;
        $o_table = $o_model::getTable();
        $o_f_id  = $conf->fields->id;
        $o_f_user= $conf->fields->user;

        $p_table = self::getTable();

        $s_type  = self::escape($type);

        $sql   = "
            SELECT `o`.*
            FROM `$o_table` `o`
                LEFT JOIN `$p_table` `p`
                    ON `o`.`$o_f_id` = `p`.`object`
                        AND `p`.`type` = '$s_type'
            WHERE `p`.`id` IS NULL";

        if($user)
            $sql.= " AND `o`.`$o_f_user` = '$user'";

        $sql.= " ORDER BY `o`.`$o_f_id` DESC ";
        if ($rpp) {
            $sql.= ' LIMIT ' . $rpp;
            $offset = 0;

            $page--;
            $offset = $page * $rpp;
            if($offset)
                $sql.= ' OFFSET ' . $offset;
        }

        return self::query($sql, 'read') ?? [];
    }
}

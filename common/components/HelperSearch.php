<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Page
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;


    class HelperSearch extends Component {
        public static function listCategories($value) {
            $data = [
                'parents' => Query::queryAll("SELECT dc.* FROM `directory_categories` AS dc WHERE dc.type LIKE  '$value%' AND dc.parent = '0' ORDER BY dc.type ASC"),
                'child'   => Query::queryAll("SELECT dc.* FROM `directory_categories` AS dc WHERE dc.parent != '0' ORDER BY dc.type ASC"),
            ];
            $list = [];
            if (isset($data['parents']) && !empty($data['parents'])) {
                foreach ($data['parents'] as $parent) {
                    $list  [$parent['id']] = $parent;
                }
                foreach ($data['parents'] as $parent) {
                    foreach ($data['child'] as $child) {
                        if ($child['parent'] == $parent['id']) {
                            $list[$parent['id']]['child'][] = $child;
                        }
                    }
                }
            }
            return Misc::exists($list, FALSE);

        }

        public static function find($x) {

            $sql = "SELECT *,
                        d.id as directory_id,
                        d.name as name,
                        dp . type as parent,
                        dc . type as type
                        FROM `directory` AS d
                        LEFT JOIN `directory_categories` AS dc ON d.category_id = dc.id
                        LEFT JOIN `directory_categories` AS dp ON dc . parent = dp . id";
            $sql .= ' WHERE d.is_active = 1';
            if (isset($x['category']) && $x['category'] != '') {
                $cat = SELF::listCategories($x['category']);
                if (array_key_exists($x['category'], $cat['parent_cats'])) {
                    $ac = 0;
                    foreach ($cat['parent_cats'][$x['category']] as $subcat) {
                        if ($ac == 0) {
                            $sql .= " WHERE  d.category_id = " . $subcat;
                        }
                        else {
                            $sql .= " OR  d.category_id = " . $subcat;
                        }
                        $ac++;
                    }
                }
            }
            //            print_r($sql);
            //            print_r($cat);
            //            print_r($x); die;

            (isset($x['alphabet']) && $x['alphabet'] != '') ? $sql .= " AND  d.name LIKE  '" . $x['alphabet'] . "%'" : '';
            (isset($x['keyword']) && $x['keyword'] != '') ? $sql .= " AND  d.name LIKE  '%" . $x['keyword'] . "%' OR  d.tags LIKE  '%" . $x['keyword'] . "%'" : '';
            (isset($x['address']) && $x['address'] != '') ? $sql .= " AND  d.address LIKE  '%" . $x['address'] . "%'" : $sql .= " AND  d.address LIKE  '%'";


            $directories = Query::queryAll($sql);
            if (isset($directories) && !empty($directories)) {
                foreach ($directories as $key => $directory) {
                    if (isset($directory['phone']) && $directory['phone'] != '') {
                        $directories[$key]['phone'] = json_decode($directory['phone'], TRUE);
                    }
                    if (isset($directory['fax']) && $directory['fax'] != '') {
                        $directories[$key]['fax'] = json_decode($directory['fax'], TRUE);
                    }
                    if (isset($directory['email']) && $directory['email'] != '') {
                        $directories[$key]['email'] = json_decode($directory['email'], TRUE);
                    }
                    if (isset($directory['url']) && $directory['url'] != '') {
                        $directories[$key]['url'] = json_decode($directory['url'], TRUE);
                    }
                    if (isset($directory['tags']) && $directory['tags'] != '') {
                        $directories[$key]['tags'] = json_decode($directory['tags'], TRUE);
                    }
                }
            }


            return Misc::exists($directories) ? $directories : '';

        }

    }
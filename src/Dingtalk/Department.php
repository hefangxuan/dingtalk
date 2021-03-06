<?php
// +------------------------------------------------+
// |http://www.cjango.com                           |
// +------------------------------------------------+
// | 修复BUG不是一朝一夕的事情，等我喝醉了再说吧！  |
// +------------------------------------------------+
// | Author: 小陈叔叔 <Jason.Chen>                  |
// +------------------------------------------------+
namespace cjango\Dingtalk;

use cjango\Dingtalk;

/**
 * Department 通讯录管理
 */
class Department extends Dingtalk
{

    /**
     * 获取部门列表
     * @return array|boolean
     */
    public static function lists()
    {
        $result = Utils::get('department/list');

        if (false !== $result) {
            return $result['department'];
        } else {
            return false;
        }
    }

    /**
     * 获取部门详情
     * @param  integer $id 部门ID
     * @return array|boolean
     */
    public static function info($id)
    {
        $params = [
            'id' => $id,
        ];

        $result = Utils::get('department/get', $params);

        if (false !== $result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * 创建部门
     * @param  string|array $name
     * @param  integer      $parentid
     * @return integer|boolean
     */
    public static function create($name, $parentid = 1)
    {
        if (is_array($name)) {
            $params = $name;
        } else {
            $params = [
                'name'     => $name,
                'parentid' => $parentid,
            ];
        }

        $result = Utils::post('department/create', $params);

        if (false !== $result) {
            return $result['id'];
        } else {
            return false;
        }
    }

    /**
     * 更新部门
     * @param  string|array $name
     * @param  integer      $id
     * @return boolean
     */
    public static function update($name, $id)
    {
        if (is_array($name)) {
            $params = $name;
        } else {
            $params = [
                'id'   => $id,
                'name' => $name,
            ];
        }

        $result = Utils::post('department/update', $params);

        if (false !== $result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 删除部门
     * @param  integer      $id
     * @return boolean
     */
    public static function delete($id)
    {
        $params = [
            'id' => $id,
        ];

        $result = Utils::get('department/delete', $params);

        if (false !== $result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取部门用户USERID列表
     * @param  integer $departmentId
     * @return array|boolean
     */
    public static function users($departmentId)
    {
        $params = [
            'department_id' => $departmentId,
        ];

        $result = Utils::get('user/simplelist', $params);

        if (false !== $result) {
            return $result['userlist'];
        } else {
            return false;
        }
    }

    /**
     * 获取部门用户详情列表
     * @param  [type] $departmentId [description]
     * @return [type]               [description]
     */
    public static function usersDetail($departmentId)
    {
        $params = [
            'department_id' => $departmentId,
        ];

        $result = Utils::get('user/list', $params);

        if (false !== $result) {
            return $result['userlist'];
        } else {
            return false;
        }
    }
}

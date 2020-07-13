<?php
/**
 * 两个数组的交集 II
 */


// 解决方案一：暴力破解法
// 时间复杂度 O(m*n)
// 空间复杂度 O(1)
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        if (empty($nums2) || empty($nums1)) {
            return [];
        }

        $result = [];

        foreach ($nums1 as $item1) {
            foreach ($nums2 as $key => $item2) {
                if ($item1 == $item2) {
                    $result[] = $item1;
                    unset($nums2[$key]);
                    break;
                }
            }
        }
        return $result;
    }
}


// 解决方案二：哈希表解决方法
// 时间复杂度 O(m + n)
// 空间复杂度 O(min(m + n)) 需要比较两个数组的长度，使用较短的来进行哈说
// 注意一个调用可以让代码复杂度降低，通过固定hash nums1 和递归调用来解决重复代码的问题
class Solution2
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        if (empty($nums2) || empty($nums1)) {
            return [];
        }

        if (count($nums2) < count($nums1)) {
            return $this->intersect($nums2, $nums1);
        }

        $result = [];
        $hash = [];

        foreach ($nums1 as $item1) {
            isset($hash[$item1]) ? $hash[$item1]++ : ($hash[$item1] = 1);
        }


        foreach ($nums2 as $item2) {
            if (isset($hash[$item2]) && $hash[$item2] > 0) {
                $hash[$item2]--;
                $result[] = $item2;
            }
        }

        return $result;
    }
}
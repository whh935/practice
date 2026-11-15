/**
 * User: whh935
 * Date: 2026/11/15 20:48
 * Desc: 两数之和-https://leetcode-cn.com/problems/two-sum/
 *      给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出和为目标值 target 的那两个整数，并返回它们的数组下标。
 *      你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。
 *      示例:
 *          给定 nums = [2, 7, 11, 15], target = 9
 *          因为 nums[0] + nums[1] = 2 + 7 = 9
 *          所以返回 [0, 1]
 */

package Array

import (
	"fmt"
)

func twoSum(nums []int, target int) []int {
	idxByVal := make(map[int]int)

	for idx, val := range nums {
		if otherIdx, ok := idxByVal[target-val]; ok {
			return []int{otherIdx, idx}
		}

		idxByVal[val] = idx
	}

	return []int{}
}

func main() {
	nums := []int{2, 7, 11, 15}
	target := 9
	fmt.Println(twoSum(nums, target))
}
